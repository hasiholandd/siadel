<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TrPengeluaran */

$this->title = "Detail Pengeluaran ";
$this->params['breadcrumbs'][] = ['label' => 'Data Pengeluaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-pengeluaran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'id_pengeluaran',
            [
                'label' => 'Pemasukan',
                'value' => \app\models\MsPengeluaran::findOne($model->id_pengeluaran)->nama_pengeluaran ,// $model->namaPemasukan->nama_pemasukan,
            ],
            [
                'label' => 'Jumlah Pengeluaran',
                'attribute' => 'jumlah_pengeluaran',
                'format'=>['decimal',2]
            ],
            [
                'attribute' => 'tanggal_pengeluaran',
                'format' => ['date', 'php:d/m/Y']
            ],
            //'jumlah_pengeluaran',
            //'tanggal_pengeluaran',
            'keterangan_pengeluaran:ntext',
            'url_bukti_pengeluaran:ntext',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>
