<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsPemasukan */

$this->title = 'Create Ms Pemasukan';
$this->params['breadcrumbs'][] = ['label' => 'Ms Pemasukans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-pemasukan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
