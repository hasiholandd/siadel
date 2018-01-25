<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MsPemasukan */

$this->title = "Detail ".$model->nama_pemasukan;
$this->params['breadcrumbs'][] = ['label' => 'Master Data Pemasukan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-pemasukan-view">

    <h1><?= Html::encode($this->title) ?></h1>

   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_pemasukan',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
