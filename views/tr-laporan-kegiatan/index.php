<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrLaporanKegiatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Kegiatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-laporan-kegiatan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(' Tambah Data Laporan Kegiatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [ 
                  'attribute'=>'id_proposal',
                  'header' => 'Nama proposal',  
                  'value'=>    function ($model) {
                        return  \app\models\TrProposal::findOne($model->id_proposal)->tujuan_proposal;
                    }
            ],
            //'approval_by',
            //'tujuan_proposal',
            'keterangan_approval:ntext',
            'keterangan_kegiatan:ntext',
            [
                'attribute' => 'tanggal_pengajuan',
                'format' => ['date', 'php:d/m/Y']
            ],
            // 'tanggal_approval',
            //'url_dokumen_laporan_kegiatan:ntext',
            // 'history_laporan:ntext',
            // 'created_at',
            // 'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
            // [
            //     'class' => 'yii\grid\ActionColumn',
            //     'template' => '{update}{delete}',
            //     'buttons' => [
            //         'update' => function ($url, $model, $key) {
            //             return Html::a(
            //                 '<span class="glyphicon glyphicon-eye-open"></span>',
            //                 $url, 
            //                 [
            //                     'title' => 'View',
            //                     'data-pjax' => '0',
            //                 ]
            //             );
            //             //return $model->status === 'editable' ? Html::a('Update', $url) : '';
            //         },                ],
            // ],
        ],
    ]); ?>
</div>
