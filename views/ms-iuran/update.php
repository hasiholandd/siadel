<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsIuran */

$this->title = 'Update Ms Iuran: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Master Iuran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ms-iuran-update">

    <h1>Update Iuran</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
