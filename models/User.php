<?php
namespace app\models;
use Yii;
use yii\base\Model;
class User extends \yii\db\ActiveRecord{
       /**
    * @inheritdoc
    */
   public static function tableName()
   {
       return 'user';
   }
   /**
    * @inheritdoc
    */
   public function rules()
   {
       return [
           [['first_name','father_name','address','email','mobile_number','gender','blood_group','date_of_birth','age','marriage_status'], 'required','message' => 'Please fill respected field.'],
           
           [['first_name','middle_name','last_name','full_name','father_name'],'match', 'pattern' => '/^[a-zA-Z ]*$/', 'message' => 'Please provide correct name.'],//validation by insering pattern to match
//         [['middle_name'], 'compare', 'compareAttribute'=> 'first_name'],
                                                 // validation for inserting same inputs
           //[['middle_name'],'string', 'max' => 50],//validation for checking string length
           
           [['address'], 'string', 'max' => 255],
           ['email', 'email'],
             

       //  [['mobile_number'],'udokmeci\yii2PhoneValidator\PhoneValidator','country'=>'India','message'=>'Please provide correct number'],
           [['mobile_number'],'match', 'pattern' => '/^[0-9]/', 'message' => 'Please provide correct number.'],
           [['mobile_number'],'string', 'min'=>10,'max' => 10],
           [['date_of_birth'],'required'],
         //  [['date_of_birth'],'date', 'format' => 'yyyy-M-d'],
           [['age'], 'compare', 'compareValue' => 18, 'operator' => '>=', 'type' => 'number'],  // validation using inbuilt function

       //    [['age'],'compareDate'],         vaildation using customized validation
           [['spouse_name'],'default','value'=>null],
           [['spouse_name'],'match', 'pattern' => '/^[a-zA-Z ]*$/', 'message' => 'Please provide correct name.'],
           


          // [['spouse_name'],'required','when' => function($model) {
             //                         return $model->marriage_status==1;
//
        //                              }] 
       ];
   }
   

   
   public function compareDate($attribute,$params){
     $age = $this->age;

     if ($age<18){
      $this->addError($attribute,'You are not eligible as your age is less than 18');
    }
   }


   public function beforeSave($insert) {
    
        
           $this->date_of_birth = date("Y-m-d", strtotime($this['date_of_birth']));
        
        return parent::beforeSave($insert);

    }


   public function afterSave($insert, $changedAttributes){

       // $this->preview_input = UploadedFile::getInstance($this, 'preview_input');
        //if (!empty($this->preview_input)) {
          //  $this->preview_input->saveAs($this->preview_picture);
        //}

   // return $this->render('list', [
     //         'model' => $model,
       //   ]);
        parent::afterSave($insert, $changedAttributes);
   }


}