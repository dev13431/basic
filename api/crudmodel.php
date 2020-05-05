<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $full_name
 * @property string $father_name
 * @property string $address
 * @property string $email
 * @property string $mobile_number
 * @property string $gender
 * @property string $blood_group
 * @property string $date_of_birth
 * @property int $age
 * @property int $marriage_status
 * @property string $spouse_name
 */
class User extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name','father_name','address','email','mobile_number','gender','blood_group','date_of_birth','age','marriage_status'], 'required','message' => 'Please fill respected field.'],
           
           [['first_name','middle_name','last_name','full_name','father_name'],'match', 'pattern' => '/^[a-zA-Z ]*$/', 'message' => 'Please provide correct name.'],
           
           [['address'], 'string', 'max' => 255],
           ['email', 'email'],
           [['mobile_number'],'match', 'pattern' => '/^[0-9]/', 'message' => 'Please provide correct number.'],
           [['mobile_number'],'string', 'min'=>10,'max' => 10],
           [['date_of_birth'],'required'],
           [['age'], 'compare', 'compareValue' => 18, 'operator' => '>=', 'type' => 'number'],  
           [['spouse_name'],'default','value'=>null],
           [['spouse_name'],'match', 'pattern' => '/^[a-zA-Z ]*$/', 'message' => 'Please provide correct name.']         
                  ];
    }

    public function scenarios()
     {
            $scenarios = parent::scenarios();
            $scenarios['create'] = ['first_name','full_name','father_name','address','email','mobile_number','gender','blood_group','date_of_birth','age','marriage_status']; 
            return $scenarios; 
    }


   public function beforesave($insert){
    
   }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'full_name' => 'Full Name',
            'father_name' => 'Father Name',
            'address' => 'Address',
            'email' => 'Email',
            'mobile_number' => 'Mobile Number',
            'gender' => 'Gender',
            'blood_group' => 'Blood Group',
            'date_of_birth' => 'Date Of Birth',
            'age' => 'Age',
            'marriage_status' => 'Marriage Status',
            'spouse_name' => 'Spouse Name',
        ];
    }
}
