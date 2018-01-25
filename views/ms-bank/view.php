<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MsBank */

$this->title = "Detail " . $model->nama_bank;
$this->params['breadcrumbs'][] = ['label' => 'Master Data Bank', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-bank-view">

    <h1><?= Html::encode($this->title) ?></h1>

   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_bank',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
