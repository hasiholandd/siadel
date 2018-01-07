<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TrIuran */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tr Iurans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-iuran-view">

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
            'id_anggota',
            'id_pemasukan',
            'id_iuran',
            'jumlah_bayar',
            'tanggal_bayar',
            'tanggal_konfirmasi_pembayaran',
            'tanggal_approval_pembayaran',
            'approval_by',
            'id_bank_pengirim',
            'id_bank_penerima',
            'status_pembayaran',
            'url_bukti_pembayaran:ntext',
            'history_pembayaran:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
