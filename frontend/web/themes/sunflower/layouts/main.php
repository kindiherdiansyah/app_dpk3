<?php
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use yii\debug\Toolbar;

// You can use the registerAssetBundle function if you'd like
//$this->registerAssetBundle('app');
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title><?php echo Html::encode($this->title); ?></title>
<meta property='og:site_name' content='<?php echo Html::encode($this->title); ?>' />
<meta property='og:title' content='<?php echo Html::encode($this->title); ?>' />
<meta property='og:description' content='<?php echo Html::encode($this->title); ?>' />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<link rel='stylesheet' type='text/css' href='<?php echo $this->theme->baseUrl; ?>/files/main_style.css' title='wsite-theme-css' />
<?php $this->head(); ?>
</head>
<body class='wsite-theme-light tall-header-page wsite-page-index weeblypage-index'>
<?php $this->beginBody(); ?>
<div class="header-wrapper">
  <div class="wrapper">
    <div class="title">
      <div id="header-right-wrapper-l">
        <div id="header-right-wrapper-r">
          <table id="header-right">
            <tr>
              <td>
                <div class="search"></div>
                <table>
                  <tr>
                    <td class="phone-number"></td>
                    <td class="social"></td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <span class="titletext">
        <span class='wsite-logo'><a href='/'><span id="wsite-title">Pelayanan Hotel</span></a></span>
      </span>
      <div class="clear"></div>
    </div>
    <div id="navigation">
      <?php echo Menu::widget(array(
        'options' => array('class' => 'nav'),
        'items' => array(
          array('label' => 'Home', 'url' => array('/site/index')),
          array('label' => 'Kamar', 'url' => array('/kamar/index')),
          array('label' => 'Layanan', 'url' => array('/layanan/index')),
          array('label' => 'Tambah Layanan', 'url' => array('/transaksi-layanan/index')),
          array('label' => 'Tentang', 'url' => array('/site/about')),
          array('label' => 'Hubungi Kami', 'url' => array('/site/contact')),
          Yii::$app->user->isGuest ?
            array('label' => 'Masuk', 'url' => array('/site/login')) :
            array('label' => 'Keluar (' . Yii::$app->user->identity->username .')' , 'url' => array('/site/logout')),
      ))); ?></div>
  </div>
</div>
<div class="outer-wrapper">
  <div class="wrapper">
    <div id="banner">
      <div class="wsite-header"></div>
    </div>
    <div id="content"><div id='wsite-content' class='wsite-not-footer'>
      <?php echo $content; ?>
</div>
</div>
    <div id="footer">Dibuat Oleh Gilang R.T. & Suriadi Z
</div>
  </div>
</div>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>