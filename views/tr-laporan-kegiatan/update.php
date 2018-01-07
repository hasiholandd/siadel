<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrLaporanKegiatan */

$this->title = 'Update Tr Laporan Kegiatan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tr Laporan Kegiatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-laporan-kegiatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
