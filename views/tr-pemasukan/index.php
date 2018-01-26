<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrPemasukanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pemasukan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-pemasukan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Data Pemasukan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            
            [
                'label' => 'Pemasukan',
                'value' => 'namaPemasukan.nama_pemasukan',
            ],
            
             [
                'label' => 'User',
                'value' => 'namaAnggota.nama',
            ],
            [
                'label' => 'Jumlah Pemasukan',
                'attribute' => 'jumlah_pemasukan',
                'format'=>['decimal',2]
            ],
            [
                'attribute' => 'tanggal_pemasukan',
                'format' => ['date', 'php:d/m/Y']
            ],
            'keterangan_pemasukan',
            // 'url_bukti_pemasukan:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
