<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrPengeluaran */

$this->title = 'Tambah Data Pengeluaran';
$this->params['breadcrumbs'][] = ['label' => 'Pengeluaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-pengeluaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'optionPengeluaran' => $optionPengeluaran,
    ]) ?>

</div>
