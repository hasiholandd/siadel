<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrAnggotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tr Anggotas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-anggota-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tr Anggota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'agama',
            // 'jurusan',
            // 'pendidikan_terakhir',
            // 'pekerjaan',
            // 'angkatan',
            // 'no_hp',
            // 'email:email',
            // 'alamat',
            // 'alamat_domisili',
            // 'status_kawin',
            // 'status_hidup',
            // 'url_foto:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
