<!DOCTYPE HTML>
<html>
<?php include('head.php')?>
<body>
<!--Header-->
<?php if(isset($_SESSION['userdata'])) {include('headerlogin.php');} else {include('header.php');}?>
<!--Header end-->
<!--banner strat here-->
<!--banner end here-->
<div class="ckeckout">
		<div class="container">
			<div class="ckeckout-top">
			<div class=" cart-items heading">
				<h1>My Shopping Bag (<?php if(isset($_SESSION['cart'])){ echo count($_SESSION['cart']);} else {echo '0';}?>)</h1>
				<div class="in-check" >
					<ul class="unit">
						<li style="text-align: left; width:25%"><span>Product Name</span></li>		
						<li style="text-align: center; width:25%"><span>Unit Price</span></li>
						<li style="text-align: center; width:25%"><span>Qty</span></li>
						<li style="text-align: center; width:25%"><span>Delete</span></li>
						<div class="clearfix"></div>
					</ul>
					
					<ul class="cart-header simpleCart_shelfItem">
					<?php if(isset($_SESSION['cart'])){ foreach ($_SESSION['cart'] as $data) {?>   
						<li style=" width:25%"><span style="margin-top:20px; text-align: left;"><?= $data['Product_name']?></span></li>
						<li style=" width:25%"><span style="margin-top:20px; text-align: center; " class="item_price">Rp <?= $data['Price']?></span></li>
						<li style=" width:25%"><span style="margin-top:20px;text-align: center;"><?= $data['Qty']?></span></li>
						<li style="text-align: center; width:25%"><a  style="margin-top:20px;" class="btn btn-danger" href="<?= base_url('user/Penjualan/deleteDetailsbyId').'?Product_id='.$data['Product_id'];?>">Delete</a></li>	
					<div class="clearfix"></div>
					<?php } } ?>
					</ul>
					<div align="right""><button onclick="checkout()" style="transform: translate(-130%,0);"class="btn btn-success">Checkout</button></div>
				</div>
			</div>  
		 </div>
		</div>
	</div>
<!--footer strat here-->
<?php include('footer.php')?>
<!--footer end here-->
<script>
	 <?php if(empty($_SESSION['cart'])){?>$('#totalchart').html('Rp 0');<?php } else  {?> $('#totalchart').html('Rp <?php echo $total?>');<?php }?>
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
						alert('Success empty Cart');
						window.location.href = "<?php echo base_url('user/Shop/cheeckout')?>";
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
							window.location.href = "<?php echo base_url('user/Shop/cheeckout')?>";
							}
						});	
			}
		}

		function checkout()
		{
			$.ajax({
				url  :"<?php echo base_url('user/Penjualan/checkout');?>",
				type :"POST" ,
				data :{ Payment : <?php echo $total?>},
				success : function(data)
				{
                   alert('Terima Kasih Sudah Berbelanja DiToko Kami');
				}
			});
		}
</script>
</body>
</html>