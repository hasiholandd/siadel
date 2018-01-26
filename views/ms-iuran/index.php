<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MsIuranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Data Iuran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-iuran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php echo "<font color=\"red\"> Blast informasi tagihan iuran terkirim sebanyak : ". isset($counter) ? $counter : '' ;?>
    <p>
        <?= Html::a('Tambah Master Data Iuran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'nama_iuran',
            [
                'attribute' => 'tanggal_mulai',
                'format' => ['date', 'php:d/m/Y']
            ],
            [
                'attribute' => 'tanggal_selesai',
                'format' => ['date', 'php:d/m/Y']
            ],
            'jumlah',
            [
                'label' =>      'Jumlah',
                'attribute' =>  'jumlah',
                'format'=>      ['decimal',2]
            ],

            // 'created_at',
            // 'updated_at',

           // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{blast}{update}{view}{delete}',
                'buttons' => [
                    'blast' => function ($url, $model, $key) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-send"></span>',
                            $url, 
                            [
                                'title' => 'Blast Informasi',
                                'data-pjax' => '0',
                            ]
                        );
                        //return $model->status === 'editable' ? Html::a('Update', $url) : '';
                    },                ],
            ],
        ],
    ]); ?>
</div>
