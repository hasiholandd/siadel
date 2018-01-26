<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TrPemasukan */

$this->title = "Detail Pemasukan ";
$this->params['breadcrumbs'][] = ['label' => 'Data Pemasukan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-pemasukan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
           
            [
                'label' => 'Pemasukan',
                'value' => $model->namaPemasukan->nama_pemasukan,
            ],
           
            [
                'label' => 'User',
                'value' => $model->namaAnggota->nama,
            ],
            'jumlah_pemasukan',
            'tanggal_pemasukan',
            'keterangan_pemasukan',
            'url_bukti_pemasukan:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
