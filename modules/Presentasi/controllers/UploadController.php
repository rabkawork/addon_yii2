<?php

namespace app\modules\Presentasi\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use yii\data\Pagination;
use yii\base\Widget;
use yii\web\UploadedFile;


use app\modules\Presentasi\models\Publish;
use app\modules\Presentasi\models\UploadForm;
use app\modules\Presentasi\models\UploadAudio;
use app\modules\Presentasi\models\Menu;
use app\modules\Presentasi\models\Content;
use app\modules\Presentasi\models\Images;
use NcJoes\OfficeConverter\OfficeConverter;
use Spatie\PdfToText\Pdf;

/**
 * Default controller for the `ModulSatu` module
 */
class UploadController extends Controller
{


	public function actionUpload()
	{


		if(Yii::$app->user->getIsGuest()){
            return $this->redirect(['/site/login']);		
    	}


    	$model = new UploadForm();
    	$menuData = Menu::find()->asArray()->all();


    	$dropdownMenu = [];
    	foreach ($menuData as $key => $value) {
    		$dropdownMenu[$value['id']] = $value['title'];
    	}

		if (Yii::$app->request->isPost) {
		    $model->file = UploadedFile::getInstance($model, 'file');
		    $post = Yii::$app->request->post();

		    if ($model->file && $model->validate()) {   


		        $namaFile = $model->file->baseName . '.' . $model->file->extension;
		        $model->file->saveAs('dummy/' . $namaFile);
		        $BASE_PATH = \Yii::$app->basePath."/web/dummy/";


		    	$content = new Content();
		        $content->title = "";
                $content->description = "";
	            $content->menu_id = $post['UploadForm']['menu_id'];
	            $content->default_images = 0;
                $content->status = 0;
                $content->harga = 0;
                $content->file_ppt = $namaFile;
                $content->file_audio = "-";
                $content->is_published = 0;
                $content->save(false);
                $contentId = $content->id;

		        $converter = new OfficeConverter($BASE_PATH.$namaFile,$BASE_PATH);
		        $converter->convertTo('output-file.pdf');

		        $pdfFile = $BASE_PATH."output-file.pdf";

		        //get total number of pages in pdf file
		        $pdf = new \Spatie\PdfToImage\Pdf($pdfFile);
		        $pdf->setCompressionQuality(80);
		        $pages = $pdf->getNumberOfPages();

		        for($i=1;$i<=$pages;$i++){

		        	$namaFileGambar = "/image_".$contentId."_".$i.".jpg";
		            $pdf->setPage($i)->saveImage($BASE_PATH.$namaFileGambar);
		        	$images = new Images();
		            $images->content_id = $contentId;
		            $images->name = $namaFileGambar;
		            $images->save();
		        }


		         return $this->redirect(['/Presentasi/upload/index','id' => $contentId]);     
		    }
		    
		}

		return $this->render('upload', ['model' => $model,'dropdownList' => $dropdownMenu]);

	}


	public function actionIndex($id = '')
	{
		if(Yii::$app->user->getIsGuest()){
            return $this->redirect(['/site/login']);		
    	}

    	$model = new UploadAudio();

    	if (Yii::$app->request->isPost) {
		    $model->file = UploadedFile::getInstance($model, 'file');
		    $post = Yii::$app->request->post();

		    if ($model->file && $model->validate()) {   
		    	$namaFile = time() . '.' . $model->file->extension;
		        $model->file->saveAs('dummy/' . $namaFile);
		        $BASE_PATH = \Yii::$app->basePath."/web/dummy/";

		        $customer = Content::findOne($id);
				$customer->file_audio = $namaFile;
				$customer->save(false);
		    }
		}


    	$getDetail = Content::find()->where(['id' => $id])->asArray()->one();
        $getDetail['images'] = Images::find()->where(['content_id' => $getDetail['id']])->all();

    	return $this->render('index', ['data' => $getDetail,'model' => $model]);

	}


	public function actionPublish($id = '')
	{
		if(Yii::$app->user->getIsGuest()){
            return $this->redirect(['/site/login']);		
    	}

    	$dropdownList = ['0' => 'Gratis', '1' => 'Berbayar'];

    	$model = new Publish();

    	if (Yii::$app->request->isPost) {


    		$getDetail = Content::find()->where(['id' => $id])->asArray()->one();
        	$getDetail['images'] = Images::find()->where(['content_id' => $getDetail['id']])->all();


			$model->load(\Yii::$app->request->post());		    
		    if ($model->validate()) {   
		  		$content = Content::findOne($id);
				$content->status = $model->status;
				$content->harga = $model->harga;
				$content->is_published = 1;
				$content->save(false);

				return $this->redirect(['/Presentasi/default/index','id' => $getDetail['menu_id']]);   

		    }
		}

    	return $this->render('publish', ['model' => $model,'dropdownList' => $dropdownList]);

	}





}