<?php
/**
 * Created by PhpStorm.
 * User: plasmo
 * Date: 10.10.2019
 * Time: 21:39
 */

namespace app\controllers;

use app\models\Article;
use app\models\Document;
use app\models\DocumentSearch;
use app\models\LoginForm;
use app\models\User;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\web\Controller;


class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),

                'rules' => [
                    [
                        'actions' => ['add-article','history'],
                        'allow' => true,
                        'roles' => ['admin', 'manager'],
                    ],
                    [
                        'actions' => ['debit','credit'],
                        'allow' => true,
                        'roles' => ['admin','employee','manager'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?','@'],
                    ],
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionDebit(){
        $model = new Document();
        if(\Yii::$app->request->isPost && $model->load(\Yii::$app->request->post()) ){
            $model->doc_type = 'debit';
            $model->created_at= new Expression('Now()');
            $model->author_id=\Yii::$app->user->id;
            if($model->save()){
                $this->goHome();
            }

        }
        $atricle = Article::find()->all();

        return $this->render('debit',['model'=>$model,'article'=>$atricle,'label'=>'Приход товара']);

    }
    public function actionCredit(){
        $model = new Document();
        if(\Yii::$app->request->isPost && $model->load(\Yii::$app->request->post()) ){
            $model->doc_type = 'credit';
            $model->created_at= new Expression('Now()');
            $model->author_id=\Yii::$app->user->id;
            if($model->save()){
                $this->goHome();
            }

        }
       $atricle = Article::find()->all();

        return $this->render('debit',['model'=>$model,'article'=>$atricle,'label'=>'Расход товара']);

    }

    public function actionHistory(){
        $searchModel = new DocumentSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        return $this->render('history',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'users'=>User::getUserListArray()
        ]);
    }
    public function actionAddArticle(){

      $model = new Article();
      if(\Yii::$app->request->isPost && $model->load(\Yii::$app->request->post()) && $model->save()  ){
          return $this->goHome();
      }
      return $this->render('add-article',['model'=>$model]);
    }

    public function actionLogin(){
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if(\Yii::$app->request->isPost && $model->load(\Yii::$app->request->post()) && $model->login()  ){
            return $this->goBack();
        }
        return $this->render('login',['model'=>$model]);
    }
    public function actionLogout(){
        \Yii::$app->user->logout();

        return $this->goHome();
    }



}