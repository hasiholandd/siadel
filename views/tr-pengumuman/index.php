<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrPengumumanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Data Pengumuman';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-pengumuman-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [   
                'label' => 'Jenis Pengumuman',
                'value' => 'jenisPengumuman.nama_pengumuman',
            ],
            [
                'attribute' => 'tanggal_mulai',
                'format' => ['date', 'php:d/m/Y']
            ],
            [
                'attribute' => 'tanggal_selesai',
                'format' => ['date', 'php:d/m/Y']
            ],
            'judul_pengumuman:ntext',
            //'keterangan_pengumuman:ntext',
            [ 
                  'attribute'=>'flag',
                  'header' => 'Status',  
                  'value'=>    function ($model) {
                    if($model->flag == 1){
                        return 'Disetujui';
                    }else{
                        return 'Belum / Tidak Disetujui';
                    }

                  }
            ],
            // 'id_created',
            // 'id_approval',
            // 'created_at',
            // 'updated_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{publish}{update}{view}{delete}',
                'buttons' => [
                    'publish' => function ($url, $model, $key) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-bookmark"></span>',
                            $url, 
                            [
                                'title' => 'Publish',
                                'data-pjax' => '0',
                            ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>
</div>
