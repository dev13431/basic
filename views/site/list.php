<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Entered Details';
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="row">
   <div class="col-lg-12">
       <div class="panel panel-default">
            <div class="panel-heading">DATA SAVED</div>
            <div class="panel-body">
               <div class="col-lg-6">
               <p><b>First Name:</b> <?=$model->first_name?> </p>
               <p><b>Middle Name:</b> <?=$model->middle_name?> </p>
               <p><b>Last Name:</b> <?=$model->last_name?> </p>
               <p><b>Full Name:</b> <?=$model->full_name?> </p>
               <p><b>Father Name:</b> <?=$model->father_name?> </p>
               <p><b>Address:</b> <?=$model->address?> </p>
               <p><b>E mail:</b> <?=$model->email?> </p>
               </div>
               <div class="col-lg-6">
               <p><b>Mobile Number:</b> <?=$model->mobile_number?> </p>
               <p><b>Date Of Birth:</b> <?=$model->date_of_birth?> </p>
               <p><b>Age:</b> <?=$model->age?> </p>
               <p><b>Gender:</b> <?=$model->gender?> </p>
               <p><b>Blood Group:</b> <?=$model->blood_group?> </p>
               <p><b>Marriage Status:</b> <?=$model->marriage_status?> </p>
               <p><b>Spouse Name:</b> <?=$model->spouse_name?> </p>
               </div>               
            </div>
       </div>
       <div class="alert alert-success">
           Thank you for getting registered. 
       </div>
   </div>
 </div>
 <div class="row" align="center" class="col-lg-12">
    <span><?= Html::a('OK', ['/site/index'], ['class'=>'btn btn-success']) ?></span>
    <span><?= Html::a('Edit',['update','id'=> $model->id], ['class'=>'btn btn-success'])?></span></td>

</div>
      
   
