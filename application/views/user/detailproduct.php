<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<?php include('head.php')?>
<body>
<!--header strat here-->
<?php if(isset($_SESSION['userdata'])) {include('headerlogin.php');} else {include('header.php');}?>
<!--header end here-->
<!--single start here-->
<div class="single">
<div class="container">
    <div class="single-main">
        <div class="single-top-main">
            <div class="col-md-5 single-top">	
            <div class="flexslider">
                <ul class="slides">
                    <li data-thumb="<?= base_url_shop()."images/".$record->Photo_name?>">
                        <div class="thumb-image"> <img src="<?= base_url_shop()."images/".$record->Photo_name?>" data-imagezoom="true" class="img-responsive"> </div>
                    </li>
                </ul>
            </div>
            </div>
            <div class="col-md-7 single-top-left simpleCart_shelfItem">
                <h2><?= $record->Type_name ?></h2>
                <h1><?= $record->Product_name ?></h1>
                <h6 class="item_price">Rp <?= $record->Price ?></h6>			
                <p><?= $record->Description ?></p>
                <ul class="bann-btns">
                    <li><a href="#"  onclick="addtocart('<?= $record->Id?>','<?php if(isset($_SESSION['userdata'])) {echo 'TRUE';} else {echo 'False';} ?>')" >Add To Cart</a></li>					
                </ul>
            </div>
        <div class="clearfix"> </div>
    </div>
    </div>
</div>
</div>
<!--single end here-->
<!--footer strat here-->
<?php include('footer.php')?>
<!--footer end here-->
<!--footer end here-->
</body>
</html>


