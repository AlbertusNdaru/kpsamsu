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
					<div>
						<?php if (isset($_SESSION['userdata'])) {?>
						<select  style="width: 25%;" name="courier" id="courier">
									<option value="">Pilih Kurir</option>
									<option value="jne">JNE</option>
									<option value="tiki">TIKI</option>
									<option value="pos">POS</option>
						</select>
						<button onclick="get_cost('501','<?= $_SESSION['userdata']->City?>',courier.value)" class="btn btn-success">
								Pilih Jasa Kirim
						</button>
						<?php }?>
						<button onclick="checkout()" style="transform: translate(0,0); float:right;"class="btn btn-success">Checkout</button>
					</div>
					<span id="totalsemuanya" class="m-text21 w-size20 w-full-sm">
						 Total : Rp <?= $total?>
				   </span>
				   <input hidden id="ongkir" value="0">
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
			<?php if (isset($_SESSION['userdata'])) {?>
				if(<?php echo $total?><=0)
				{
					alert('Harap memilih product yang akan dibeli dan  klik tombol AddtoCart');
					window.location.href = "<?php echo base_url('user/Shop')?>";
				}
				else
				{
				total = $('#ongkir').val();
				console.log('sdadad : '+total);
				$.ajax({
					url  :"<?php echo base_url('user/Penjualan/checkout');?>",
					type :"POST" ,
					data :{ Payment : <?php echo $total?>,
					 	    Ongkir : total },
					success : function(data)
					{
					alert('Terima Kasih Sudah Berbelanja DiToko Kami');
					window.location.href = "<?php echo base_url('user/Shop')?>";
					}
				});
				}
		<?php } else {?>
			window.location.href = "<?php echo base_url('user/Login/loginuser')?>";
		<?php }?>
		}

		function get_cost(city_origin, city_destination, courier) 
		{

			console.log(city_origin);
			console.log(city_destination);
			console.log(courier);
			console.log(<?php if(isset($_SESSION['cart'])) {echo count($_SESSION['cart'])*0.2;} else {echo 0;}?> );
			if(city_destination != '' && courier != '') 
			{
				console.log('here');
				$.ajax({
				url  :"<?php echo base_url('Apiongkir/cost');?>",
				type : 'POST',
				data : {
					city_origin : city_origin,
					city_destination : city_destination ,
					weight : <?php if(isset($_SESSION['cart'])) {$totalberat=count($_SESSION['cart'])*0.2; if($totalberat<1){echo 1;}else{echo $totalberat;}} else {echo 0;}?> ,
					courier : courier
				},
					success : function(data)
					{
						var cost = $.parseJSON(data);   
									if(cost['rajaongkir']['results'][0]['costs'].length > 0) {
										$.each(cost['rajaongkir']['results'][0]['costs'], function(key, value) {
											pilihongkir(value.cost[0]['value'],courier)
										});
									}
								
						
					}
				})
			}
		}

		function pilihongkir(pilih,kurir) {
			if(pilih=="")
			{
				alert('Pengiriman Tidak Terjangkau')
			}
			else
			{
				var total=0;
				total = <?php echo $total?>;
				pilih = parseInt(pilih);
				total = total+pilih ;
				$('#totalsemuanya').html('Total : Rp '+total);
				$('#ongkir').val(pilih);
			}
		
		}
</script>
</body>
</html>