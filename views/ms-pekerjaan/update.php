<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsPekerjaan */

$this->title = 'Update Ms Pekerjaan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ms Pekerjaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ms-pekerjaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
