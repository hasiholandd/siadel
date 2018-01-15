<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TrProposal */

$this->title = 'Form Upload Proposal';
$this->params['breadcrumbs'][] = ['label' => 'Tr Proposals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-proposal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
