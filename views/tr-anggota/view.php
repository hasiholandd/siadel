<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\models\MsJurusan;
use app\models\MsPendidikan;
use app\models\MsPekerjaan;
use app\models\MsAngkatan;

/* @var $this yii\web\View */
/* @var $model app\models\TrAnggota */

$this->title = "Lihat Data diri " . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Data diri', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-anggota-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nim',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'agama',
            [
                'label' => 'Jurusan',
                'value' => MsJurusan::findOne($model->jurusan)->nama_jurusan,
            ],
            [
                'label' => 'Pendidikan',
                'value' => MsPendidikan::findOne($model->pendidikan_terakhir)->nama_pendidikan,
            ],
            [
                'label' => 'Pekerjaan',
                'value' => MsPekerjaan::findOne($model->pekerjaan)->nama_pekerjaan,
            ],
            [
                'label' => 'Angkatan',
                'value' => MsAngkatan::findOne($model->angkatan)->tahun_angkatan,
            ],
            'no_hp',
            'email:email',
            'alamat',
            'alamat_domisili',
            [
                'label' => 'Status Kawin',
                'value' => ($model->status_kawin == 1) ? 'Menikah' : 'Belum Menikah',
            ],
            [
                'label' => 'Status Hidup',
                'value' => ($model->status_hidup == 1) ? 'Hidup' : 'Meninggal',
            ]
        ],
    ]) ?>

</div>
