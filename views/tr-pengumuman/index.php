<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrPengumumanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tr Pengumumen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-pengumuman-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tr Pengumuman', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_pengumuman',
            'tanggal_mulai',
            'tanggal_selesai',
            'keterangan_pengumuman:ntext',
            // 'url_dokumen_pengumuman:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
