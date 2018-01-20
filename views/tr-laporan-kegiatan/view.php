<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TrLaporanKegiatan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tr Laporan Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-laporan-kegiatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'id_proposal',
            'approval_by',
            'keterangan_approval:ntext',
            'keterangan_kegiatan:ntext',
            'tanggal_pengajuan',
            'tanggal_approval',
            'url_dokumen_laporan_kegiatan:ntext',
            'history_laporan:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
