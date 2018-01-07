<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MsPengumuman */

$this->title = 'Update Ms Pengumuman: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ms Pengumumen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ms-pengumuman-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
