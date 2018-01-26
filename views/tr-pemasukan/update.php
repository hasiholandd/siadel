<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrPemasukan */

$this->title = 'Update Pemasukan';
$this->params['breadcrumbs'][] = ['label' => 'Data Pemasukan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-pemasukan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'optionPemasukan' => $optionPemasukan,
    ]) ?>

</div>
