<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsPengeluaran */

$this->title = 'Create Ms Pengeluaran';
$this->params['breadcrumbs'][] = ['label' => 'Ms Pengeluarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-pengeluaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
