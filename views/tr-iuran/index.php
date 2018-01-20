<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrIuranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Monitoring Transaksi Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-iuran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  
    <?= GridView::widget(['dataProvider' => $dataProvider,
       
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
            
            'tanggal_bayar',
            'tanggal_konfirmasi_pembayaran',
            'status_pembayaran',
            'tanggal_approval_pembayaran',
           
            [
                'label' => 'Approve By',
                'value' => 'namaApproved.nama',
            ],
            // 'id_bank_pengirim',
            // 'id_bank_penerima',
            // 'status_pembayaran',
            // 'url_bukti_pembayaran:ntext',
            // 'history_pembayaran:ntext',
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{approve}{view}',
                'buttons' => [
                    'approve' => function ($url, $model, $key) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-ok"></span>',
                            $url, 
                            [
                                'title' => 'Approve Pembayaran',
                                'data-pjax' => '0',
                                'data' => [
                                    'confirm' => 'Apakah anda yakin setujui Pembayaran ini?',
                                    'method' => 'post',
                                ],
                            ]
                        );
                        //return $model->status === 'editable' ? Html::a('Update', $url) : '';
                    },
                ],
            ],
        ],
    ]); ?>
</div>
