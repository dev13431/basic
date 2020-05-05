<?php 
use yii\helpers\Html;
use \yii\grid\GridView;
use yii\bootstrap\ActiveForm;
?>
<div class="row">
    <h1>All registered member details.</h1>
</div>

<div class="row" >
        <?= Html::a('ADD MEMBER', ['/site/forms'], ['class'=>'btn btn-primary']) ?>
        <?= Html::a('WORK WITH GII', ['/register'], ['class'=>'btn btn-primary']) ?>

            <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'layout'=>"{items}\n{pager}",
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'full_name',
        'address',
        'email',
        'mobile_number',
        ['class' => 'yii\grid\ActionColumn',
        'header'=>'Action', 
            'headerOptions' => ['width' => '100'],
            'template' => '{view} {update} {delete}{link}',
        'buttons' => []
        ],
   ],
    
        ]);
 ?>
</div>
  