<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsIuran */

$this->title = 'Create Ms Iuran';
$this->params['breadcrumbs'][] = ['label' => 'Ms Iurans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-iuran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
