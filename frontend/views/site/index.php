<?php

/* @var $this yii\web\View */
$asset = frontend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl; 
$this->title = 'Kargo Darat Ritel';
?>

<div class="site-index">
    <br>
    <br>
    <div class="col-lg-4">
        <br>    
        <center><img src="image/track1.png" width="150" height="150"/><!-- <img src="<?=$baseUrl?>/images/iconcek/track1.png" class="img-responsive"> --></center>
    <br>
        <div style="text-align: justify;">
        <center><p><a class="btn btn-lg btn-primary" href="/Tarif/frontend/web/index.php?r=process%2Findex">CEK TRACKING</a></p></center>
        </div>
    <br>
    </div>

    <div class="col-lg-4">
        <br>
        <center><img src="image/lokasi.png" width="150" height="150"/><!-- <img src="<?=$baseUrl?>/images/iconcek/dual.png" class="img-responsive"> --></center>
        <br>    
        <div style="text-align: justify;">
        <center><p><a class="btn btn-lg btn-primary" href="/Tarif/frontend/web/index.php?r=kantor%2Findex">LOCATION</a></p></center>
        </div>
    </div>

    <div class="col-lg-4">
        <br>    
        <center><img src="image/tarif1.png" width="150" height="150"/><!-- <img src="<?=$baseUrl?>/images/iconcek/tarif1.png" class="img-responsive"> --></center>
        <br>
        <div style="text-align: justify;">
        <center><p><a class="btn btn-lg btn-primary" href="/Tarif/frontend/web/index.php?r=tarif-cargo%2Findex">CEK TARIF</a></p></center>
        </div>
        <br>
    </div>
    <br>
    <br>
</div>
