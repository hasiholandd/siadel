<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MsPengeluaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Data Pengeluaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-pengeluaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Master Data Pengeluaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama_pengeluaran',
            //'created_at',
            //'updated_at',

           ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
