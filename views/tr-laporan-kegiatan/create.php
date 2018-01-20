<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrLaporanKegiatan */

$this->title = 'Tambah Data Laporan Kegiatan';
$this->params['breadcrumbs'][] = ['label' => 'Tambah Data  Laporan Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-laporan-kegiatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'optionProposal' => $optionProposal,
        'optionUserApproval' => $optionUserApproval 
    ]) ?>

</div>
