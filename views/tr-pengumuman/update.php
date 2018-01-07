<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrPengumuman */

$this->title = 'Update Tr Pengumuman: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tr Pengumumen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-pengumuman-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
