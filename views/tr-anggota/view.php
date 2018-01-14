<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TrAnggota */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tr Anggotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-anggota-view">

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
            'nim',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'agama',
            'jurusan',
            'pendidikan_terakhir',
            'pekerjaan',
            'angkatan',
            'no_hp',
            'email:email',
            'alamat',
            'alamat_domisili',
            'status_kawin',
            'status_hidup',
            'url_foto:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
