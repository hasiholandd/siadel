<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TrPengumuman */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tr Pengumumen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-pengumuman-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_pengumuman',
            'tanggal_mulai',
            'tanggal_selesai',
            'judul_pengumuman:ntext',
            'keterangan_pengumuman:ntext',
            'url_dokumen_pengumuman:ntext',
            'flag',
            'id_created',
            'id_approval',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
