<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegisterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registered Detail';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('BACK',['/site/index'], ['class' => 'btn btn-primary']) ?>
        
        <?= Html::a('Create ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'id',
            'first_name',
            //'middle_name',
            'last_name',
            //'full_name',
            //'father_name',
            //'address',
            'email:email',
            //'mobile_number',
            //'gender',
            //'blood_group',
            //'date_of_birth',
            //'age',
            //'marriage_status',
            //'spouse_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
