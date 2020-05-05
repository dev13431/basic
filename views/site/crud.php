df
<?php
use yii\helpers\Html;
use yii\grid\GridView;

?>
<div class="container">
  <h2>DAYAL REGISTERED MEMBERS</h2>
    <?= Html::a('ADD MEMBER', ['/site/forms'], ['class'=>'btn btn-primary']) ?>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>Email</th>
        <th>MOBILE</th>
        <th>ACTIONS</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach($detail as $data){ ?>
      <tr>
        <td><?= $data->id ?> </td>
        <td><?= $data->full_name ?> </td>
        <td><?= $data->email ?> </td>
        <td><?= $data->mobile_number ?> </td>
    <td><span><?= Html::a('VIEW',['view','id'=> $data->id], ['class'=>'btn btn-primary'])
               ?></span>
        <span><?= Html::a('DELETE',['delete','id'=> $data->id], ['class'=>'btn btn-danger'
                 ,'data' => [
                     'confirm' => 'Are you sure you want to delete this item?',
                     'method' => 'post',
                          ],])
              ?></span>
        <span><?= Html::a('UPDATE',['update','id'=> $data->id], ['class'=>'btn btn-success
                 '])
              ?></span>
      </tr>
  <?php } ?>
    </tbody>
  </table>
</div>

