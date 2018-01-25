<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsIuran */

$this->title = 'Update Iuran: ' . $model->nama_iuran;
$this->params['breadcrumbs'][] = ['label' => 'Master Data Iuran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ms-iuran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
