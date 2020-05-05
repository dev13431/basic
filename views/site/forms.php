<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\base\Widget;

?>




<div class="row">
      <div class="col-lg-12">
                 <?php $form = ActiveForm::begin([
                    'enableAjaxValidation' => true,  //responsible for ajaxvalidation if not writing this line of code controller file will work withour ajax code but if writing then we need to add the condition of checking in controller whether the code is ajax or not. 
              ]); ?>



    <div class="col-sm-12">
         <div class="col-sm-4" >
                   <?= $form->field($model, 'first_name') ?>
         </div>
         <div class="col-sm-4" >
                  <?= $form->field($model, 'middle_name') ?>
         </div>
         <div class="col-sm-4" >
                   <?= $form->field($model, 'last_name') ?>
         </div>
    </div>   
    <div class="col-sm-12">
         <div class="col-sm-8" >
                   <?= $form->field($model, 'full_name')->textInput(['readonly'=>true])?>
         </div>
         <div class="col-sm-4">
                   <?= $form->field($model, 'father_name') ?>
         </div>
    </div>
    <div class="col-sm-12">
         <div class="col-sm-8">
                   <?= $form->field($model, 'address')->textArea(['rows' => 1]) ?>
         </div>
         <div class="col-sm-4">
                   <?= $form->field($model, 'email') ?>
         </div>
    </div>
    <div class="col-sm-12">
         <div class="col-sm-4">
                   <?= $form->field($model, 'mobile_number') ?>
         </div>
         <div class="col-sm-4">
                          <?= $form->field($model, 'date_of_birth')->textInput(['readonly'=>true])?>
         </div>
         <div class="col-sm-4">
                   <?= $form->field($model, 'age')->textInput(['readonly'=>true]) ?>
         </div>
    </div>
    <div class="col-sm-12">
         <div class="col-sm-4">
                   <?= $form->field($model, 'gender')->inline(true)->radioList([
                    'Male'=>'Male', 
                    'Female' => 'Female'
                     ]); ?>
         </div>
         <div class="col-sm-4">
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
         </div>
         <div class="col-sm-4">
                   <?= $form->field($model, 'marriage_status')->dropDownList([
                    ''=>'Select',  
                    '1' => 'Married', 
                    '2' => 'Unmarried'
                  ]); ?>
         </div>
    </div>   
  
         <div class="col-sm-12" id='spouse'>
                   <?= $form->field($model, 'spouse_name') ?>
         </div>

        <div class="col-sm-12">
          <div class="form-group, col-lg-5">
                   <?= Html::a('BACK',['/site/index'], ['class' => 'btn btn-primary']) ?>
          </div>     
          <div class="form-group, col-lg-5">
                   <?= Html::a('RESET', ['/site/forms'], ['class'=>'btn btn-primary']) ?>

          </div>
          <div class="form-group, col-lg-2">
                  <?= Html::submitButton('SUBMIT',['class' => 'btn btn-primary']) ?>

          </div>
         </div>

              <?php ActiveForm::end(); ?>
      </div>
</div>

<?php
$this->registerJs(
       "$('#user-first_name,#user-middle_name,#user-last_name').keyup(function(){
         $('#user-full_name').val($('#user-first_name').val()+' '+$('#user-middle_name').val()+' '+$('#user-last_name').val());
      });



$('#spouse').hide();
     
        $('#user-marriage_status').change(function(){
          if($('#user-marriage_status').val() == 1){
            $('#spouse').show();
          }
          else{
            $('#spouse').show();
           }
        });



var age='';
  $('#user-date_of_birth').datepicker({
    onSelect: function (value, ui) {
      var today = new Date();
      age = today.getFullYear() - ui.selectedYear;
      if(age<18){
        $('#user-date_of_birth').val('');
        $('#user-age').val('');
        alert('You are not eligible your age is less than 18')
      }
      else{
        $('#user-age').val(age);
      }
    },
    changeMonth: true,
    changeYear: true
    });
  

        "

      
        
    );  
?>






