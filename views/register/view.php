<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Register */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Registers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="register-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('BACK',['/register'], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
       <?= Html::a('Generate Pdf', ['genpdf', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

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
