<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrPengeluaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pengeluaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-pengeluaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Data Pengeluaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'id_pengeluaran',
             [ 
                  'attribute'=>'id_proposal',
                  'header' => 'Nama proposal',  
                  'value'=>    function ($model) {
                        return  \app\models\MsPengeluaran::findOne($model->id_pengeluaran)->nama_pengeluaran;
                    }
            ],
            [
                'attribute' => 'tanggal_pengeluaran',
                'format' => ['date', 'php:d/m/Y']
            ],
            [
                'label' => 'Jumlah Pengeluaran',
                'attribute' => 'jumlah_pengeluaran',
                'format'=>['decimal',2]
            ],
            'keterangan_pengeluaran:ntext',
            // 'url_bukti_pengeluaran:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
