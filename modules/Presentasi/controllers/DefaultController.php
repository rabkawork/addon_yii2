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
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($id = '')
    {

            $query = Content::find()
            ->where(['menu_id' => $id])
            ->andWhere(['is_published' => 1]);
            $countQuery = clone $query;
            $pages = new Pagination(['totalCount' => $countQuery->count()]);
            $models = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();
            foreach($models as $key => $data){
                $models[$key]['images'] = Images::find()->where(['content_id' => $data['id']])->all();
            }
            
            $request = Yii::$app->request->get('page');
            return $this->render('index', ['models' => $models,'pages' => $pages,'page' => $request]);
            
    }
    


    public function actionDetail($id = ''){

        $getDetail = Content::find()->where(['id' => $id])->asArray()->one();
        $getDetail['images'] = Images::find()->where(['content_id' => $getDetail['id']])->all();

        $query = Content::find()
        ->where(['<>','id', $id])
        ->andWhere(['menu_id' => $getDetail['menu_id']])
        ->andWhere(['is_published' => 1]);
        
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        foreach($models as $key => $data){
            $models[$key]['images'] = Images::find()->where(['content_id' => $data['id']])->all();
        }
        $request = Yii::$app->request->get('page');
                
        return $this->render('detail', ['data' => $getDetail, 'models' => $models,'pages' => $pages,'page' => $request]);
    }
}
