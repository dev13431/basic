<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title ='Post View';
?>
<h1><?=Html::encode($this->title) ?></h1>


<div class="body-content">
           <div class="panel panel-default">
            <div class="panel-heading">Complete Detail</div>
             <div class="panel-body">



  <ul class="list-group">
    <div class="col-lg-6">
    <li>  <label> ID </label>:  <?=Html::encode($post->id)?> </li>
    <li>  <label> FIRST NAME </label>:  <?=Html::encode($post->first_name) ?> </li>
    <li>  <label>MIDDLE NAME </label>:  <?=Html::encode($post->middle_name) ?> </li>
    <li>  <label>LAST NAME </label>:  <?=Html::encode($post->last_name) ?> </li>
    <li>  <label>FULL NAME </label>:  <?=Html::encode($post->full_name) ?> </li>
    <li>  <label>FATHER NAME </label>:  <?=Html::encode($post->father_name) ?> </li>
    <li>  <label>ADDRESS </label>:  <?=Html::encode($post->address) ?> </li>
    <li>  <label>E MAIL </label>:  <?=Html::encode($post->email) ?> </li>
    </div>
    <div class="col-lg-6">
    <li>  <label>MOBILE NUMBER </label>:  <?=Html::encode($post->mobile_number) ?> </li>
    <li>  <label>DATE OF BIRTH </label>:  <?=Html::encode($post->date_of_birth) ?> </li>
    <li>  <label>AGE </label>:  <?=Html::encode($post->age) ?> </li>
    <li>  <label>GENDER </label>:  <?=Html::encode($post->gender) ?> </li>
    <li>  <label>BLOOD GROUP </label>:  <?=Html::encode($post->blood_group) ?> </li>
    <li>  <label>MARRIAGE STATUS </label>:  <?=Html::encode($post->marriage_status) ?><?= '(1 FOR MARRIED & 2 FOR UNMARRIED)'?></li>
    <li>  <label>SPOUSE NAME </label>:  <?=Html::encode($post->spouse_name) ?> </li>
    </div>
   </ul>
</div>
</div>
</div>

<div class="col-lg-6">
     <?= Html::a('BACK',['/site/index'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('UPDATE',['update','id'=> $post->id], ['class'=>'btn btn-success'])?>
</div>
</div>

