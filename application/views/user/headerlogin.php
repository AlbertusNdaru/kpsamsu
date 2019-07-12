<!--header strat here-->
<div class="header">
	<div class="container" style="width : 100% !important;">
		<div class="header-main">
			<div class="top-nav">
				<div class="content white">
					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="navbar-brand logo">
								<a href="<?= base_url('user/Shop')?>"><img src="<?php echo base_url_shop()?>images/logo1.png" alt=""></a>
							</div>
						</div>
						<!--/.navbar-header-->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><a href="<?= base_url('user/Shop')?>">Home</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</div>
						<!--/.navbar-collapse-->
					</nav>
					<!--/.navbar-->
				</div>
			</div>
			<div class="header-right" style="width : 50%;">
				<div class="search">
					<div class="search-text">
					<button  style="margin-top: 6px; margin-right:5px;"  class='btn btn-primary' data-toggle="modal" data-target="#modalstatus" onclick="status()">Cek Status Pesanan</button>
					</div>
					<div class="search-text">
					<button  style="margin-top: 6px; margin-right:5px;"  class='btn btn-primary' data-toggle="modal" data-target="#modalbukti" onclick="bukti()">Transaksi Pembayaran</button>
					</div>
					<div class="cart box_1">
						<a href="<?= base_url('user/Shop/cheeckout')?>">
						<h3>
							<img src="<?php echo base_url_shop()?>images/cart.png" alt=""/>
							<div class="total">
				<span hidden class="simpleCart_total"></span>
				<span id="totalchart"></span>
				</div>
							</h3>
						</a>
						<p><a href="javascript:;" class="simpleCart_empty" onclick="emptychart('TRUE')">Empty Cart</a></p>
					</div>    
					<div class="head-signin">
						<h5><a href="<?=base_url("user/Login/logout")?>"><i class="hd-logout"></i>Logout</a></h5>
					</div>      
					<div class="head-signin">
						<h5><a><i class="hd-dign"></i><?= $_SESSION['userdata']->Member_name?></a></h5>
					</div>          
					<div class="clearfix"> </div>					
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<script>
</script>
<!--header end here-->