<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrAnggota */

$this->title = 'Update Data Anggota: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Anggota', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-anggota-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'optionPengumuman' => $optionPengumuman,
        'optionPekerjaan' => $optionPekerjaan,
        'optionPendidikan' => $optionPendidikan,
        'optionJurusan' => $optionJurusan,
        'optionAngkatan' => $optionAngkatan,
    ]) ?>

</div>
