<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

$asset = frontend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl; 
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<style>
/*p.serif {
    font-family: "Times New Roman", Times, serif;
}*/

p.sansserif {
    font-family: Arial, Helvetica, sans-serif;
}
</style>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="homepage">
<?php $this->beginBody() ?>
    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="item active" style="background-image: url(image/bg4.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
<!--                                 <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
                                    <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>
                                    <a class="btn-slide animation animated-item-3" href="#">Read More</a>
                                </div> -->
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="<?=$baseUrl?>/images/slider/img3.png" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(image/bg10.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
<!--                                 <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
                                    <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>
                                    <a class="btn-slide animation animated-item-3" href="#">Read More</a>
                                </div> -->
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="<?=$baseUrl?>/images/slider/img2.png" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url(image/bg6.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
<!--                                     <h1 class="animation animated-item-1">Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
                                    <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>
                                    <a class="btn-slide animation animated-item-3" href="#">Read More</a> -->
                                </div>
                            </div>
                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="<?=$baseUrl?>/images/slider/img1.png" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->

<div class="wrap">
    <?php
     NavBar::begin([
        'brandLabel' => "<strong><img src='image/favicon.png' width='60' height='50' class='pull-left'/> KDR </strong>",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
   //  NavBar::begin([
   //      'brandLabel' => 'KDR - Kargo Darat Ritel',
   //      'brandUrl' => Yii::$app->homeUrl,
   //      'options' => [
   //          'class' => ' w3-aqua navbar-fixed-top',
			// 'role' => 'navigation',
   //      ],
   //  ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Track', 'url' => ['/process/index']],
        ['label' => 'Tariff', 'url' => ['/tarif-cargo/index']],
        ['label' => 'Location', 'url' => ['/kantor/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Masuk', 'url' => ['/site/login']];
    } else {
        $menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
    ['label' => 'Tariff', 'url' => ['/tarif-cargo/index']],
	
    // [
    //         'label' => 'Informasi',
    //         'items' => [
    //              ['label' => 'Kamar', 'url' => ['/kamar/index']],
    //              ['label' => 'Layanan', 'url' => ['/layanan/index']],
    //              ['label' => 'Pesan Layanan', 'url' => ['/transaksi-layanan/index']],
    //         ],
    //     ],
    //  ['label' => 'Tambah Tamu', 'url' => ['/tamu/index']],

    // [
    //         'label' => 'Room Service',
    //         'items' => [
    //              ['label' => 'Transaksi', 'url' => ['/transaksi-kamar/index']],
    //              ['label' => 'Check Out', 'url' => ['/transaksi-kamar-out/index']],
    //         ],
    //     ],
	
    // [
    //         'label' => 'Cetak',
    //         'items' => [
    //              ['label' => 'Cetak Transaksi Tamu', 'url' => ['/transaksi-kamar-cetak/index']],
    //              //['label' => 'Cetak Pesan Layanan', 'url' => ['/transaksi-layanan-cetak/index']],
    //         ],
    //     ],
	
    ];
        $menuItems[] = [
            'label' => 'Keluar (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];  
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer id="footer" class="midnight-blue" class="midnight-blue">
        <div class="container">
            <div class="row">
                <p  class="pull-left"><center>&copy; <!-- <?= date('Y') ?> --> 2019 Pos Logistics Indonesia. All Rights Reserved </center></p>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
