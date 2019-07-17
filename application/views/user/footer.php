<div class="footer">
	<div class="container">
		<div class="footer-main">
			<div class="ftr-grids-block">
		    <div class="clearfix"> </div>
		  </div>
		  <div class="copy-rights">
		     <p>© 2016 Shoplist. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
		   </div>
		</div>
	</div>
</div>

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

	function status()
	{
		if ('<?php if(isset($_SESSION["userdata"])) {echo true;} else {echo false;}?>')
		{
			$.ajax({
				url:"<?php echo base_url('user/Penjualan/getdatatransaksi');?>",
				type : "POST",
				data : {id : '<?php if(isset($_SESSION["userdata"])) {echo $_SESSION['userdata']->Id;} else{echo null;}?>'},
				success : function(data)
				{
				var result = $.parseJSON(data);
				console.log(result);
				$("#modalstatusdetail").empty();
				for(var i=0; i<result.length; i++)
				{
					var link="";
					var kurir="";
					if(result[i]['Kurir']=='jne')
						{
						link='https://track.aftership.com/jne/'+result[i]['Resi']+'?'; kurir='JNE';
						}
					else if(result[i]['Kurir']=='tiki')
						{
						link='https://track.aftership.com/tiki/'+result[i]['Resi']+'?'; kurir='TIKI';
						}else if(result[i]['Kurir']=='pos')
							{
								link='https://track.aftership.com/pos-indonesia-int/'+result[i]['Resi']+'?'; kurir="POS";
							}
					
					$("#modalstatusdetail").append(
								"<tr >"+
									"<td>"+result[i]['Transaction_bill']+"</td>"+
									"<td>"+result[i]['Date']+"</td>"+
									"<td>Rp "+result[i]['Payment']+"</td>"+
									"<td>Rp "+result[i]['Ongkir']+"</td>"+
									"<td>"+result[i]['Stats']+"</td>"+
									"<td>"+result[i]['Resi']+"</td>"+
									"<td  style='text-align:center'>"+
										"<a type='button' class='btn btn-danger' target='_blank' style='height: 22px;font-size: 12px;padding-top: 2px;' href="+link+">"+kurir+"</a>"+
									"</td>"+
								"</tr>"
						);
					}
				}
			});
    	}
	}

	function bukti()
	{
		if ('<?php if(isset($_SESSION["userdata"])) {echo true;} else {echo false;}?>')
		{
			$.ajax({
				url:"<?php echo base_url('user/Penjualan/getdatatransaksiVerified');?>",
				type : "POST",
				data : {id : '<?php if(isset($_SESSION["userdata"])) {echo $_SESSION['userdata']->Id;} else{echo null;}?>'},
				success : function(data)
				{
				var result = $.parseJSON(data);
				console.log(result);
				$("#modalstatusbukti").empty();
				for(var i=0; i<result.length; i++)	
				{   var Payment = parseInt(result[i]['Payment']);	
					var Ongkir 	= parseInt(result[i]['Ongkir']);
					var total 	= Payment + Ongkir;
					$("#modalstatusbukti").append(
								"<tr >"+
									"<td>"+result[i]['Transaction_bill']+"</td>"+
									"<td>"+result[i]['Date']+"</td>"+
									"<td>Rp "+result[i]['Payment']+"</td>"+
									"<td>Rp "+result[i]['Ongkir']+"</td>"+
									"<td>Rp "+total+"</td>"+
									"<td  style='text-align:center'>"+
										"<form action='http://localhost/kpsamsu/user/Penjualan/addBukti' enctype='multipart/form-data' method='post' accept-charset='utf-8'>"+
										" <input hidden name='bill' type='text' value='"+result[i]['Transaction_bill']+"'>"+
										"<input required  id='inputBukti' accept='image/x-png,image/gif,image/jpeg' type='file' class='form-control' name='berkas' placeholder='upload'>"+
										"<button type='submit' class='btn btn-success''>Upload Bukti</button>"+
										"</form>"+
									"</td>"+
								"</tr>"
						);
					}
				}
			});
    	}
	}

	function Pembayaran()
	{
		if ('<?php if(isset($_SESSION["userdata"])) {echo true;} else {echo false;}?>')
		{
			$.ajax({
				url:"<?php echo base_url('user/Penjualan/getdatatransaksi');?>",
				type : "POST",
				data : {id : '<?php if(isset($_SESSION["userdata"])) {echo $_SESSION['userdata']->Id;} else{echo null;}?>'},
				success : function(data)
				{
				var result = $.parseJSON(data);
				console.log(result);
				$("#modalstatusdetail").empty();
				for(var i=0; i<result.length; i++)
				{
					var link="";
					var kurir="";
					if(result[i]['Kurir']=='jne')
						{
						link='https://track.aftership.com/jne/'+result[i]['Resi']+'?'; kurir='JNE';
						}
					else if(result[i]['Kurir']=='tiki')
						{
						link='https://track.aftership.com/tiki/'+result[i]['Resi']+'?'; kurir='TIKI';
						}else if(result[i]['Kurir']=='pos')
							{
								link='https://track.aftership.com/pos-indonesia-int/'+result[i]['Resi']+'?'; kurir="POS";
							}
					
					$("#modalstatusdetail").append(
								"<tr >"+
									"<td>"+result[i]['Transaction_bill']+"</td>"+
									"<td>"+result[i]['Date']+"</td>"+
									"<td>Rp "+result[i]['Payment']+"</td>"+
									"<td>Rp "+result[i]['Ongkir']+"</td>"+
									"<td>"+result[i]['Stats']+"</td>"+
									"<td>"+result[i]['Resi']+"</td>"+
									"<td  style='text-align:center'>"+
										"<a type='button' class='btn btn-danger' target='_blank' style='height: 22px;font-size: 12px;padding-top: 2px;' href="+link+">"+kurir+"</button>"+
									"</td>"+
								"</tr>"
						);
					}
				}
			});
    	}
	}
</script>