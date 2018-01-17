<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrPengumuman */

$this->title = 'Update Pengumuman: ' . $model->judul_pengumuman;
$this->params['breadcrumbs'][] = ['label' => 'Pengumuman', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->judul_pengumuman, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-pengumuman-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'optionPengumuman' => $optionPengumuman,
    ]) ?>

</div>
