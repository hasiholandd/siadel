<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrUser */

$this->title = 'Create Tr User';
$this->params['breadcrumbs'][] = ['label' => 'Tr Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
