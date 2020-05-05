<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use yii\base\widgets;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Register */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="register-form">

    <?php $form = ActiveForm::begin([
      'options' => ['enctype'=>'multipart/form-data']  //this get included so that insertion of image can take place
    ]); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_name')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'upload_image')->fileInput() ?>

    <?= $form->field($model, 'father_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->inline(true)->radioList([
                    'Male'=>'Male', 
                    'Female' => 'Female'
                     ]); ?>

    <?= $form->field($model, 'blood_group')->dropDownList([
                     ''=>'Select',
                     'A+' => 'A+',
                     'B+' => 'B+', 
                     'O+' => 'O+', 
                     'AB+' => 'AB+', 
                     'A-' => 'A-', 
                     'B-' => 'B-', 
                     'O-' => 'O-', 
                     'AB-' => 'AB-'
                   ]); ?>

     <?= $form->field($model,'date_of_birth')->widget(DatePicker::classname(),
      ['readonly'=>true,
       'pluginOptions' =>
           ['autoclose' => true 
            ]]);
 ?>


    

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'marriage_status')->dropDownList([
                    ''=>'Select',  
                    '1' => 'Married', 
                    '2' => 'Unmarried'
                  ]); ?>
<div id='spouse'>
    <?= $form->field($model, 'spouse_name')->textInput(['maxlength' => true]) ?>
</div>
    <div class="form-group">
        <?= Html::a('BACK',['/register'], ['class' => 'btn btn-primary']) ?>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJs(
       "$('#register-first_name,#register-middle_name,#register-last_name').keyup(function(){
         $('#register-full_name').val($('#register-first_name').val()+' '+$('#register-middle_name').val()+' '+$('#register-last_name').val());
      });"

      
        
    );  
?>



<?php 
$this->registerJs(
"$('#spouse').hide();
     
        $('#register-marriage_status').change(function(){
          if($('#register-marriage_status').val() == 1){
            $('#spouse').show();
          }
          else{
            $('#spouse').hide();
           }
        });"

);
?>
