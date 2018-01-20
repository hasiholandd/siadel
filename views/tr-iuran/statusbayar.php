<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrIuranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tr Iurans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-iuran-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
  
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            [
                'label' => 'Nama',
                'value' => 'namaAnggota.nama',
            ],
            [
                'label' => 'Iuran',
                'value' => 'namaIuran.nama_iuran',
            ],
           
            'jumlah_bayar',
            'status_pembayaran',
            //[
                //'label' => 'Status Pembayaran',
                //'value' => ($model->status_pembayaran== 1) ? 'Disetujui' : 'Belum / Tidak Disetujui',
            //],
            
            // 'tanggal_bayar',
            // 'tanggal_konfirmasi_pembayaran',
            // 'tanggal_approval_pembayaran',
            // 'approval_by',
            // 'id_bank_pengirim',
            // 'id_bank_penerima',
            // 'status_pembayaran',
            // 'url_bukti_pembayaran:ntext',
            // 'history_pembayaran:ntext',
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                
            ],
        ],
    ]); ?>
</div>
