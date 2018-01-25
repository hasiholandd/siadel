<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsPemasukan */

$this->title = 'Update: ' . $model->nama_pemasukan;
$this->params['breadcrumbs'][] = ['label' => 'Master Data Pemasukan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ms-pemasukan-update">

    <h1>Update Pemasukan </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
