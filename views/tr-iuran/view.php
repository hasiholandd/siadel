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

    <h1>View Konfirmasi Pembayaran <?= Html::encode($this->title) ?></h1>

   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            [
                'label' => 'Nama',
                'value' => $model->namaAnggota->nama,
            ],
            [
                'label' => 'Iuran',
                'value' => $model->namaIuran->nama_iuran,
            ],
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
