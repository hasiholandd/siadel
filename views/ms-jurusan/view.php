<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MsJurusan */

$this->title ="Detail " .$model->nama_jurusan;
$this->params['breadcrumbs'][] = ['label' => 'Master Data Jurusan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-jurusan-view">

    <h1><?= Html::encode($this->title) ?></h1>

   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_jurusan',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
