<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrPemasukanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tr Pemasukans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-pemasukan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tr Pemasukan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_pemasukan',
            'id_user',
            'sumber_pemasukan',
            'tanggal_pemasukan',
            // 'url_bukti_pemasukan:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
