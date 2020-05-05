<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Register */

$this->title = 'Details of '. $model->full_name ;

\yii\web\YiiAsset::register($this);
?>
<div class="register-view">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?= DetailView::widget([
        'model' => $model,

        'attributes' => [
            'id',
            'first_name',
            'middle_name',
            'last_name',
            'full_name',
            'upload_image:image',
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

</div>
