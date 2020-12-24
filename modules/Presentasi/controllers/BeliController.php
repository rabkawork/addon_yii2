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

use app\modules\Presentasi\models\Beli;
use app\modules\Presentasi\models\Menu;
use app\modules\Presentasi\models\Content;
use app\modules\Presentasi\models\Images;
use NcJoes\OfficeConverter\OfficeConverter;
use Spatie\PdfToText\Pdf;


/**
 * Default controller for the `ModulSatu` module
 */
class BeliController extends Controller
{

	public function actionIndex($id = '')
	{
		if(Yii::$app->user->getIsGuest()){
            return $this->redirect(['/site/login']);		
    	}

    	$getDetail = Content::find()->where(['id' => $id])->asArray()->one();
        $getDetail['images'] = Images::find()->where(['content_id' => $getDetail['id']])->all();

    	return $this->render('index', ['data' => $getDetail]);


	}


    public function actionPaid($id = '')
    {
        $getDetail = Content::find()->where(['id' => $id])->asArray()->one();
        $getDetail['images'] = Images::find()->where(['content_id' => $getDetail['id']])->all();


        // get session from user identity
        $userId = Yii::$app->user->id;

        $beli = new Beli();
        $beli->userId = $userId;        
        $beli->contentId = $id;        
        $beli->harga = $getDetail['harga'];        
        $beli->is_paid = 1;        
        $beli->tanggal = date('Y-m-d H:i:s');        
        $beli->save();

         return $this->redirect(['/Presentasi/beli/invoice','id' => $id]);     

    }

	public function actionInvoice($id = '')
	{
		if(Yii::$app->user->getIsGuest()){
            return $this->redirect(['/site/login']);		
    	}
    	$getDetail = Content::find()->where(['id' => $id])->asArray()->one();
        $getDetail['images'] = Images::find()->where(['content_id' => $getDetail['id']])->all();
        $userId = Yii::$app->user->id;

        $invoices = Beli::find()
        ->select('beli.*,content.title')
        ->innerJoin('content', 'content.id = beli.contentId')
        ->where(['beli.userId' => $userId])
        ->asArray()->all();


    	return $this->render('invoice', ['data' => $getDetail,'invoices' => $invoices]);


	}
	
}