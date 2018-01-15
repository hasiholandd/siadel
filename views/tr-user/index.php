<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TrAnggota;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tr Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tr User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //TrAnggota::find('id' => 'id_anggota')->row(),
            'username',
            'email:email',
            //'password:ntext',
            // 'link_reset_password:ntext',
            // 'id_role',
             'last_login',
            // 'flag',
             'created_at',
            // 'updated_at',
             
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{assign}{updateAdmin}{view}{delete}',
                'buttons' => [
                    'assign' => function ($url, $model, $key) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-disk-saved"></span>',
                            $url, 
                            [
                                'title' => 'Assign',
                                'data-pjax' => '0',
                            ]
                        );
                        //return $model->status === 'editable' ? Html::a('Update', $url) : '';
                    },
                    'updateAdmin' => function ($url, $model, $key) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-edit"></span>',
                            $url, 
                            [
                                'title' => 'Update Admin',
                                'data-pjax' => '0',
                            ]
                        );
                        //return $model->status === 'editable' ? Html::a('Update', $url) : '';
                    }
                ],
            ],
        ],
    ]); ?>
</div>
