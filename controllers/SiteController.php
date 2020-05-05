<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
//use app\models\LoginForm;
//use app\models\ContactForm;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\widgets\ActiveForm;



class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actionForms()
   {
    
       $model = new User();
       if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {                                     //for validating after submit 
                                                  //  button clicked
          Yii::$app->response->format = 'json';
          return ActiveForm::validate($model);
        }
       if ($model->load(Yii::$app->request->post())){
        //   $model->date_of_birth = date("Y-m-d", strtotime($model['date_of_birth']));     used this part of code in beforesave() inbuilt function inside model

       
       if ($model->save()) {
            return $this->render('list', [
               'model' => $model,
          ]);
       }
      }
      else {
           return $this->render('create', [
               'model' => $model,
           ]);
       }
       print('error');
   }


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

    public function actionIndex(){
     
    //  $model = new User();
    //  $data = $model::find()
           // ->where(['id' > 0])
          //->orderBy('age')
    //     ->all();
    //   return $this->render('crud', array(
    //          'model' => $model,
    //           'detail' => $data,
    //));
    
    $dataProvider = new ActiveDataProvider(['query'=>User::find()->orderBy('id'),
        'pagination' => [
            'pageSize' => 10,
        ],
        ]);

    return $this->render('crudindex',[
        'dataProvider'=>$dataProvider]);
    }

  //      return $this->render('index');
    //}


    public function actionView($id){
       $post = User::findOne($id);
       $post->date_of_birth = date('d-M-Y',strtotime($post['date_of_birth']));
       return $this->render('view1', ['post'=>$post]);
    }

    public function actionUpdate($id){
       $model = User::findOne($id);
       if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {                                     //for validating after submit 
                                                  //  button clicked
          Yii::$app->response->format = 'json';  // converting inserted values into json file
          return ActiveForm::validate($model);
       }
       if ($model->load(Yii::$app->request->post())){
          //  $model->date_of_birth = date("Y-m-d", strtotime($model['date_of_birth']));  //working in beforesave function in model file 

        // if ($model->update()) {  //this update() function will not save the data untill any change is made for an update
         if ($model->save()) {   //this save() function will save the data whether any change made or not
           return $this->render('list', [
               'model' => $model,
           ]);      
       }}

       return $this->render('update',['model'=>$model]);
    }
    
    public function actionDelete($id){
           $post = User::findOne($id)->delete();
           return $this->redirect('index');
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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

   
    public function actionGetuser(){

  $modelUser  = User::find()->asArray()->all();
  echo "<pre>";print_r($modelUser);
    //return $modelUser;
    }
}
