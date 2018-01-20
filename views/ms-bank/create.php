<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsBank */

$this->title = 'Tambah Master Data Bank';
$this->params['breadcrumbs'][] = ['label' => 'Master Data Bank', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-bank-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
