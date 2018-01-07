<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
               [
                'label' => 'Master Data',
                'items' => [
                     ['label' => 'Master Angkatan', 'url' => '/index.php?r=ms-angkatan'],
                     '<li class="divider"></li>',
                     ['label' => 'Master Bank', 'url' => '/index.php?r=ms-bank'],
                     '<li class="divider"></li>',
                     ['label' => 'Master Iuran', 'url' => '/index.php?r=ms-iuran'],
                     '<li class="divider"></li>',
                     ['label' => 'Master Jurusan', 'url' => '/index.php?r=ms-jurusan'],
                     '<li class="divider"></li>',
                      ['label' => 'Master Pekerjaan', 'url' => '/index.php?r=ms-pekerjaan'],
                     '<li class="divider"></li>',
                     ['label' => 'Master Pemasukan', 'url' => '/index.php?r=ms-pemasukan'],
                     '<li class="divider"></li>',
                     ['label' => 'Master Pendidikan', 'url' => '/index.php?r=ms-pendidikan'],
                     '<li class="divider"></li>',
                     ['label' => 'Master Pengeluaran', 'url' => '/index.php?r=ms-pengeluaran'],
                     '<li class="divider"></li>',
                     ['label' => 'Master Pengumuman', 'url' => '/index.php?r=ms-pengumuman'],
                ],
            ],
            //['label' => 'About', 'url' => ['/site/about']],
            //['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Anggota', 'url' => ['/tr-anggota']],
            ['label' => 'Iuran', 'url' => ['/tr-iuran']],
            ['label' => 'Laporan Kegiatan', 'url' => ['/tr-laporan-kegiatan']],
            ['label' => 'Pemasukan', 'url' => ['/tr-pemasukan']],
            ['label' => 'Pengeluaran', 'url' => ['/tr-pengeluaran']],
            ['label' => 'Pengumuman', 'url' => ['/tr-pengumuman']],
            ['label' => 'Proposal', 'url' => ['/tr-proposal']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
