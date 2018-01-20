<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrIuran */

$this->title = 'Approve Konfirmasi Pembayaran ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tr Iurans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-iuran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'optionBank' => $optionBank,
         'optionIuran' => $optionIuran,
    ]) ?>

</div>
