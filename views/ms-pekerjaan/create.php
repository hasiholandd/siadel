<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsPekerjaan */

$this->title = 'Tambah Master Pekerjaan';
$this->params['breadcrumbs'][] = ['label' => 'Master Data Pekerjaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-pekerjaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
