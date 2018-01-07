<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsPemasukan */

$this->title = 'Update Ms Pemasukan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ms Pemasukans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ms-pemasukan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
