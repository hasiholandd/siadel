<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrUser */

$this->title = 'Update Tr User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tr Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'username' => $model->username, 'email' => $model->email]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
