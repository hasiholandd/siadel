<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsAngkatan */

$this->title = 'Update Ms Angkatan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ms Angkatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ms-angkatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
