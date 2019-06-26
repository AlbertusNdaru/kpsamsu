<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<?php include('head.php')?>
<body>
<!--Header-->
<?php if(isset($_SESSION['userdata'])) {include('headerlogin.php');} else {include('header.php');}?>
<!--Header end-->
<!--banner strat here-->
<!--banner end here-->
<!--block-layer2 start here-->
<div class="blc-layer2">
	<div class="container">
		<div class="blc-layer2-main">
				<div class="col-md-6 blc-layer2-left">
					<h3>WELCOME TO TOKO SAMSU</h3>
					<p>SELAMAT BERBELANJA</p>
				</div>
				<div class="col-md-6 blc-layer2-right">
				
				</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--block-layer2 end here-->
<!--home-block start here-->
<div class="home-block">
	<div class="container" style="width:100%">
		<div class="home-block-main">
			<?php foreach($all as $P) { ?>
				<div class="col-md-2 banner-right simpleCart_shelfItem" style="padding-top:0px !important;">
				<h1><?= $P->Product_name?></h1>
				<h5 class="item_price">Rp <?= $P->Price?></h5>
				<ul class="bann-small-img">
					<li style="margin-right:0px; width:100%;"> <a href="<?= base_url('user/Detailproduct/viewDetailProduct/').$P->Id ?>"><img style="width:100%;height:255px;" src="<?= base_url_shop()."images/".$P->Photo_name?>"></a></li>
				</ul>
				<ul class="bann-btns">
				<li style="display:block; margin-right:0px;"><a href="#" onclick="addtocart('<?= $P->Id?>','<?php if(isset($_SESSION['userdata'])) {echo 'TRUE';} else {echo 'False';} ?>')" >Add To Cart</a></li>
        </ul>
			</div>
			<?php } ?>

		</div>
	</div>
</div>	
<!--home block end here-->
<!--footer strat here-->
<?php  include "modal_status.php";  ?>
<?php include('footer.php')?>
<!--footer end here-->
</body>

</html>