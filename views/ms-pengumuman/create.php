<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsPengumuman */

$this->title = 'Create Ms Pengumuman';
$this->params['breadcrumbs'][] = ['label' => 'Ms Pengumumen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-pengumuman-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
