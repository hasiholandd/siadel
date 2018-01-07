<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsBank */

$this->title = 'Update Ms Bank: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ms Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ms-bank-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>