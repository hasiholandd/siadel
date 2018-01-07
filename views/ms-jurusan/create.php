<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsJurusan */

$this->title = 'Create Ms Jurusan';
$this->params['breadcrumbs'][] = ['label' => 'Ms Jurusans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-jurusan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
