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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tr Iuran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_anggota',
            'id_pemasukan',
            'id_iuran',
            'jumlah_bayar',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
