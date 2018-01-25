<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsJurusan */

$this->title = 'Update: ' . $model->nama_jurusan;
$this->params['breadcrumbs'][] = ['label' => 'Master Data Jurusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ms-jurusan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
