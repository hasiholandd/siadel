<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrAnggota */

$this->title = 'Create Tr Anggota';
$this->params['breadcrumbs'][] = ['label' => 'Tr Anggotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-anggota-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
