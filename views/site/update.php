<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Register */

$this->title = 'Update Form : ' . $model->id;
?>
<div class="register-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('forms', [
        'model' => $model,
    ]) ?>

</div>
