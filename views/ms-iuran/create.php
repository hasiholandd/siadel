<?php

use yii\helpers\Html;
use yii\widget\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\MsIuran */

$this->title = 'Tambah Master Iuran';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Master Iuran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-iuran-create">

    <h1><?= Html::encode($this->title) ?></h1>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
`