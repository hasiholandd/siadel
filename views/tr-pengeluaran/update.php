<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrPengeluaran */

$this->title = 'Update Data Pengeluaran: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pengeluaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-pengeluaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'optionPengeluaran' => $optionPengeluaran,
    ]) ?>

</div>
