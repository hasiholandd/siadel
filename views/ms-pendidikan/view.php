<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MsPendidikan */

$this->title ="Detail " .$model->nama_pendidikan;
$this->params['breadcrumbs'][] = ['label' => 'Master Data Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-pendidikan-view">

    <h1><?= Html::encode($this->title) ?></h1>

   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_pendidikan',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
