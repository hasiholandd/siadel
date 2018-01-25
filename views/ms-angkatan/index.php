<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MsAngkatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Data Angkatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-angkatan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Master Data Angkatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'tahun_angkatan',
            'nama_angkatan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
