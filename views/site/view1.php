<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Register */
$this->title ='Complete Details Of ID  '.$post->id;

?>

<div class="register-view">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?= DetailView::widget([
        'model' => $post,
        'attributes' => [
            'id',
            'first_name',
            'middle_name',
            'last_name',
            'full_name',
            'father_name',
            'address',
            'email:email',
            'mobile_number',
            'gender',
            'blood_group',
            'date_of_birth',
            'age',
            'marriage_status',
            'spouse_name',
        ],
    ]) ?>

    <p>
        <?= Html::a('BACK',['/site/index'], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Update', ['update', 'id' => $post->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $post->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


</div>
