<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MsIuran */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Master Iuran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-iuran-view">

    <h1>Detail Iuran <?= Html::encode($this->title) ?></h1>

    
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
