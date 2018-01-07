<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrIuran */

$this->title = 'Create Tr Iuran';
$this->params['breadcrumbs'][] = ['label' => 'Tr Iurans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-iuran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
