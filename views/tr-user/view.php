<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\TrUser */

$this->title = 'View Data User '.$model->username;
$this->params['breadcrumbs'][] = ['label' => 'Tr Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'username' => $model->username, 'email' => $model->email], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'username' => $model->username, 'email' => $model->email], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                 'attribute' => 'nama',
                 'value' => $modelAnggota->nama,
            ],
            'username',
            'email:email',
            [
                 'attribute' => 'nama_role',
                 'value' => $modelRole->nama_role,
            ],
            'last_login',
            'created_at'
        ],
    ]) ?>

</div>
