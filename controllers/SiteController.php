<?php

namespace app\controllers;

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

use app\models\UploadForm;
use app\models\Menu;
use app\models\Content;
use app\models\Images;
use NcJoes\OfficeConverter\OfficeConverter;



class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($id = '')
    {
            $query = Content::find()->where(['menu_id' => $id]);
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

        $query = Content::find()->where(['menu_id' => $getDetail['menu_id']]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        foreach($models as $key => $data){
            $models[$key]['images'] = Images::find()->where(['content_id' => $data['id']])->all();
        }
        $request = Yii::$app->request->get('page');
                
        return $this->render('detail', ['data' => $getDetail, 'models' => $models,'pages' => $pages,'page' => $request]);
    }


    public function actionModulDua()
    {
        $model = new UploadForm();
    }


    public function actionUpload(){

    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
