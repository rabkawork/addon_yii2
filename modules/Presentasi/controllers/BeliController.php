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

	public function actionInvoice($id = '')
	{
		if(Yii::$app->user->getIsGuest()){
            return $this->redirect(['/site/login']);		
    	}




    	$getDetail = Content::find()->where(['id' => $id])->asArray()->one();
        $getDetail['images'] = Images::find()->where(['content_id' => $getDetail['id']])->all();

    	return $this->render('invoice', ['data' => $getDetail]);


	}
	
}