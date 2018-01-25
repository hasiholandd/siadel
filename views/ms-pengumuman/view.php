<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MsPengumuman */

$this->title ="Detail " .$model->nama_pengumuman;
$this->params['breadcrumbs'][] = ['label' => 'Master Data Pengumuman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-pengumuman-view">

    <h1><?= Html::encode($this->title) ?></h1>

   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_pengumuman',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
