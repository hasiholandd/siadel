<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrAnggotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Anggota';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-anggota-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'angkatan',
            [ 
                  'attribute'=>'angkatan',
                  'header' => 'Angkatan',  
                  'value'=>    function ($model) {
                        return  isset(\app\models\MsAngkatan::find()->where(['id' => $model->angkatan])->one()->tahun_angkatan) ? \app\models\MsAngkatan::find()->where(['id' => $model->angkatan])->one()->tahun_angkatan : "-";
                    }
            ],
            'nim',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            // 'agama',
            // 'jurusan',
            // 'pendidikan_terakhir',
            [ 
                  'attribute'=>'pekerjaan',
                  'header' => 'pekerjaan',  
                  'value'=>    function ($model) {
                        return  isset(\app\models\MsPekerjaan::find()->where(['id' => $model->pekerjaan])->one()->nama_pekerjaan) ? \app\models\MsPekerjaan::find()->where(['id' => $model->pekerjaan])->one()->nama_pekerjaan : "-";
                    }
            ],
            
            'no_hp',
            // 'email:email',
            // 'alamat',
            // 'alamat_domisili',
            // 'status_kawin',
            // 'status_hidup',
            // 'url_foto:ntext',
            // 'created_at',
            // 'updated_at',
        ],
    ]); ?>
</div>
