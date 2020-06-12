<?php

/* @var $this yii\web\View */

$this->title = 'Sistem CCRU';
?>

<div class="site-index">

    <div class="jumbotron">
    <!-- <img src="images/Logo_Bank.png" width="360px" height="180px"/> -->
    <br>
    <br>
    <br>
    <br>
    <div class="w3-content w3-display-container">
  <img class="mySlides" src="images/Logo_Bank.png" style="width:100%">
 <!--  <img class="mySlides" src="images/bg6.jpg" style="width:100%">
  <img class="mySlides" src="images/bg8.jpg" style="width:100%">
  <img class="mySlides" src="images/bg6.jpg" style="width:100%">
  <img class="mySlides" src="images/bg4.jpg" style="width:100%">
  <img class="mySlides" src="images/bg6.jpg" style="width:100%">
  <img class="mySlides" src="images/bg8.jpg" style="width:100%"> -->

</div>

<style type="text/css">
body {
background: #f0f0f0;
40
}
.content {
margin-bottom: 30px;
width: 100%;
background: #fbfbfb;
border-radius: 5px;
padding: 10px;
}
.content:hover {
background: #f5f5f5;
}
.content-title a {
font-size: 18px;
font-color: #333;
width: 100%;
border-bottom:1px dotted #ccc;
}
.content-detail {
font-size: 10px;
width: 100%;
color: blue;
margin-bottom: 10px;
}
.content-fill {
width: 100%;
font-size: 12px;
}
</style>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 1000); // Change image every 2 seconds
}
</script>
    </div>
    


    <!-- <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <center><h2>TAGIH</h2>
                <div class="w3-container">
                <img src="foto/bank.jpg" class="w3-circle w3-hover-opacity" alt="Junior Suite" style="width:100%">
                </div>
                
                <br>
                <br>
                </center>
            </div>
            <div class="col-lg-4">
                <center><h2>RESTRUCK</h2>
                <div class="w3-container">
                <img src="foto/ccru_family.jpg" class="w3-circle w3-hover-opacity" alt="Superior Room" style="width:100%">
                </div>
                
                <br>
                <br>
              </center>
            </div>
            <div class="col-lg-4">
                <center><h2>LELANG</h2>
                <div class="w3-container">
                <img src="foto/bank.jpg" class="w3-circle w3-hover-opacity" alt="Presidential Suite" style="width:100%">
                </div>
                
                <br>
                <br>
               </center>
            </div>
        </div>

    </div>
 --></div>
