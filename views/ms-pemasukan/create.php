<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsPemasukan */

$this->title = 'Tambah Master Data Pemasukan';
$this->params['breadcrumbs'][] = ['label' => 'Master Data Pemasukan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-pemasukan-create">

    <h1>Tambah Master Pemasukan</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
