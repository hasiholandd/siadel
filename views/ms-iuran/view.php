<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MsIuran */

$this->title = "Detail Iuran ".$model->nama_iuran;
$this->params['breadcrumbs'][] = ['label' => 'Master Data Iuran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-iuran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_iuran',
            'tanggal_mulai',
            'tanggal_selesai',
            'jumlah',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
