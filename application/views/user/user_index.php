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
					<li><a href="single.html"><img style="width:100%;height:255px;" src="<?= base_url_shop()."images/".$P->Photo_name?>"></a></li>
				</ul>
				<h6>Size Charts</h6>
				<ul class="bann-btns">
				<li><select class="bann-size">
					<option value="select your location">Size</option>
					<option value="saab">Small</option>
					<option value="fiat">Medium</option>
					<option value="audi">Large</option>
				</select>
				</li>
				<li><a href="#" class="" onclick="addtocart('<?= $P->Id?>','<?php if(isset($_SESSION['userdata'])) {echo 'TRUE';} else {echo 'False';} ?>')" >Add To Cart</a></li>
        </ul>
			</div>
			<?php } ?>

		</div>
	</div>
</div>	
<!--home block end here-->
<!--footer strat here-->
<?php include('footer.php')?>
<!--footer end here-->
</body>
<script>
 <?php if(empty($_SESSION['cart'])){?>$('#totalchart').html('Rp 0');<?php } else  {?> $('#totalchart').html('Rp <?php echo $total?>');<?php }?>
	function addtocart(id,user)
		{ 
			    var qty = 1;
				if(user=='TRUE')
					{
						$.ajax({
						url  :"<?php echo base_url('user/Penjualan/post_penjualan');?>",
						type : 'POST',
						data : {
							id_barang : id,
							jml : qty
						},
						success : function(data)
						{ 
							$('#totalchart').html('Rp '+data);
							alert('Success Add to Cart');
							
						}
					});

					}
					else
					{
						$.ajax({
						url  :"<?php echo base_url('user/Penjualan/poscartpending');?>",
						type : 'POST',
						data : {
							id_barang : id,
							jml: qty
						},
						success : function(data)
						{
						 $('#totalchart').html('Rp '+data);
						alert('Success Add to Cart');
						}
					});	
					}         
		}
	function emptychart(validate)
	{
		if (validate=='TRUE')
		{
			$.ajax({
				url  :"<?php echo base_url('user/Penjualan/emptychartfromlogin');?>",
				type : 'POST',
				data : {
				},
				success : function(data)
				{
					alert('Success empty Cart From Login');
					window.location.href = "<?php echo base_url('user/Shop')?>";
				}
			});
		}
		else
		{
			$.ajax({
						url  :"<?php echo base_url('user/Penjualan/emptychart');?>",
						type : 'POST',
						data : {
						},
						success : function(data)
						{
						alert('Success empty Cart');
						window.location.href = "<?php echo base_url('user/Shop')?>";
						}
					});	
		}
	}
</script>
</html>