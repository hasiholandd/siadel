<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrLaporanKegiatan */

$this->title = 'Create Tr Laporan Kegiatan';
$this->params['breadcrumbs'][] = ['label' => 'Tr Laporan Kegiatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-laporan-kegiatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
