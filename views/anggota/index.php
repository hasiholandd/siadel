<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\AnggotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Anggotas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Anggota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',
            'email:email',
            'tempat',
            'tanggal_lahir',
            // 'agama',
            // 'pekerjaan',
            // 'alamat',
            // 'angkatan',
            // 'no_hp',
            // 'updated_at',
            // 'created_at',
            // 'prodi',
            // 'lulusan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
