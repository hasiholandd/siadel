<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrPengumuman */

$this->title = 'Tambah Data Pengumuman';
$this->params['breadcrumbs'][] = ['label' => 'Pengumuman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-pengumuman-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'optionPengumuman' => $optionPengumuman,
    ]) ?>

</div>
