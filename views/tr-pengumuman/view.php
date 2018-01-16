<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TrPengumuman */

$this->title = "Data Pengumuman #". $model->judul_pengumuman;
$this->params['breadcrumbs'][] = ['label' => 'View Pengumuman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-pengumuman-view">

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
            [
                'label' => 'Dibuat oleh',
                'value' => (isset($modelMsCreator->username) ? $modelMsCreator->username : "-"). "/" . (isset($modelMsCreator->email) ? $modelMsCreator->email : "-"),
            ],
            [
                'label' => 'Disetujui oleh',
                'value' => (isset($modelMsApproval->username) ? $modelMsApproval->username : "-" ). "/" . (isset($modelMsApproval->email) ? $modelMsApproval->email : "-"),
            ],
            [
                'label' => 'StatusPengumuman',
                'value' => ($model->flag == 1) ? 'Disetujui' : 'Belum / Tidak Disetujui',
            ],
            [
                'label' => 'Jenis Pengumuman',
                'value' => $modelMsPengumuman->nama_pengumuman,
            ],
            'tanggal_mulai',
            'tanggal_selesai',
            'judul_pengumuman:ntext',
            'keterangan_pengumuman:ntext',
            'url_dokumen_pengumuman:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
