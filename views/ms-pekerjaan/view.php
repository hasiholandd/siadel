<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MsPekerjaan */

$this->title = "Detail " .$model->nama_pekerjaan;
$this->params['breadcrumbs'][] = ['label' => 'Master Data Pekerjaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-pekerjaan-view">

    <h1><?= Html::encode($this->title) ?></h1>

  
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_pekerjaan',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
