<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrPemasukan */

$this->title = 'Tambah Data Pemasukan';
$this->params['breadcrumbs'][] = ['label' => 'Data Pemasukan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-pemasukan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'optionPemasukan' => $optionPemasukan,
    ]) ?>

</div>
