<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\widgets\ActiveForm;


use app\models\User;


class UserController extends \yii\web\Controller
{
  public $enableCsrfValidation=false;
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionCreateUser()
    {
    

       \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
       $user = new User();
       $user->scenario = User:: SCENARIO_CREATE;
       $user->attributes = \yii::$app->request->post();
       if($user->validate())
       {   
        $user1 = User::find()->all();
          foreach($user1 as $data){
            if($data['first_name']==$user['first_name'] ){
                 return array('status' => false, 'data'=> 'This name member already exist');
           }
        }
       $user->save();
       return array('status' => true, 'data'=> 'New record is successfully updated');
       
      }
      else
      {
       return array('status'=>false,'data'=>$user->getErrors());    
      }
    }



    public function actionGetUser()
	{
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		$user = User::find()->all();
		if(count($user) > 0 )
		{
		return array('status' => true, 'data'=> $user);
		}
		else
		{
		return array('status'=>false,'data'=> 'No Record Found');
		}
	}


    public function actionUpdateUser()
    {
         \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;     
         $attributes = \yii::$app->request->post();
       
           $user = User::find()->where(['ID' => $attributes['id'] ])->one();
     //    $user = User::find()->where(['id'=>'62' ])->one();
        
         if(count($user) > 0 )
         {
          $user->attributes = \yii::$app->request->post();
          $user->save();
          return array('status' => true, 'data'=> 'User record is updated successfully');
          
         }
         else
         {
          return array('status'=>false,'data'=> 'No Record Found');
         }
    }

	public function actionDeleteUser()
	{

		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		 $attributes = \yii::$app->request->post();
	     $user = User::find()->where(['ID' => $attributes['id'] ])->one();  
	     if(count($user) > 0 )
	     {
		    $user->delete();
		    return array('status' => true, 'data'=> 'User record is successfully deleted'); 
	     }
	     else
		 {
		    return array('status'=>false,'data'=> 'No Record Found');
		 }
    }



        
    }





