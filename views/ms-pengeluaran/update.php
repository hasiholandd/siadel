<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsPengeluaran */

$this->title = 'Update: ' . $model->nama_pengeluaran;
$this->params['breadcrumbs'][] = ['label' => 'Ms Pengeluarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'UPDATE';
?>
<div class="ms-pengeluaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
