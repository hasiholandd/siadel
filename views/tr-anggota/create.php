<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrAnggota */

$this->title = 'Tambah Data Anggota';
$this->params['breadcrumbs'][] = ['label' => 'Anggota', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-anggota-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'optionPekerjaan' => $optionPekerjaan,
        'optionPendidikan' => $optionPendidikan,
        'optionJurusan' => $optionJurusan,
        'optionAngkatan' => $optionAngkatan,
    ]) ?>

</div>
