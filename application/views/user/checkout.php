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
					
					<div class="wrap-input100 validate-input" style="height: 30px;">
						<input style="width: 25%;" id="alamat"  class="selection-2" name="alamat" value="<?php if(isset($_SESSION['userdata'])) echo $_SESSION['userdata']->Address; else echo 'Input Alamat' ?>"/>
					</div>
					<div class="wrap-input100 validate-input" style="height: 30px;">
						<select style="width: 25%;" id="province_destination"  class="selection-2" name="province_destination" onchange="get_city_destination(this);">	
						</select>
					</div>
                    <div class="wrap-input100 validate-input" style="height: 30px;">
						<select style="width: 25%;" id="city_destination"  class="selection-2" name="city_destination">
							<option value=''>Pilih Kota</option>
						</select>
                    </div>
						<?php if (isset($_SESSION['userdata'])) {?>
						<select  style="width: 25%;" name="courier" id="courier">
									<option value="">Pilih Kurir</option>
									<option value="jne">JNE</option>
									<option value="tiki">TIKI</option>
									<option value="pos">POS</option>
						</select>
						<button onclick="get_cost('501',city_destination.value,courier.value)" class="btn btn-success">
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
get_city();
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
					data :{ 
							Payment       : <?php echo $total?>,
							Ongkir        : total,
							Kurir         : courier.value,
							Alamat_kirim  : alamat.value,
							Kota          : city_destination.value,
							Provinsi       : province_destination.value
						},
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

		function get_city()
		{
			var session = <?php if(isset($_SESSION['userdata'])) echo 1; else echo 0;?>;
			$.ajax({
					url  :"<?php echo base_url('Apiongkir/province');?>",
					type : 'POST',
					success : function(data)
					{

					var all_province = $.parseJSON(data);
					$("#province_destination").html("<option value=''>Pilih Provinsi</option>");
							$.each(all_province['rajaongkir']['results'], function (key, value) {
								$("#province_destination").append(
									"<option value='" + value.province_id + "'>" + value.province + "</option>"
								);
							});
                            if (session == 1 )
							{
						    var prov = <?php if(isset($_SESSION['userdata'])) echo $_SESSION['userdata']->Province; else echo 0;?>;
							$("#province_destination").val(prov);
							get_city_destination(prov);
							}
				
					}
			});
		
		}




		function get_city_destination(sel)
		{
			var session = <?php if(isset($_SESSION['userdata'])) echo 1; else echo 0;?>;
			$.ajax({
					url  :"<?php echo base_url('Apiongkir/city');?>",
					type : 'POST',
					data : {id: sel.value},
					success : function(data)
					{
					var get_city = $.parseJSON(data);
					$("#city_destination").html("<option value=''>Pilih Kota</option>");
							$.each(get_city['rajaongkir']['results'], function (key, value) {
								$("#city_destination").append(
									"<option value='" + value.city_id + "'>" + value.type + " - " + value.city_name + "</option>"
								);
							});
							if (session == 1 )
							{
						    var prov = <?php if(isset($_SESSION['userdata'])) echo $_SESSION["userdata"]->City; else echo 0;?>;
							$("#city_destination").val(prov);
							}
				}
		})
		}
</script>
</body>
</html>