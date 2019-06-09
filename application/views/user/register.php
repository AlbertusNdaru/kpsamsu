<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V18</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url('assets/loginshop/')?>images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginshop/')?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginshop/')?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginshop/')?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginshop/')?>vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginshop/')?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginshop/')?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginshop/')?>vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginshop/')?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginshop/')?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/loginshop/')?>css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666; overflow-y: hidden;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" style="padding-top:41px;" action="<?= base_url('user/Login/register')?>" method="POST">
					<span class="login100-form-title p-b-43">
						Register Member
                    </span>
                    
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="name_member">
						<span class="focus-input100"></span>
						<span class="label-input100">Nama</span>
                    </div>
                    
                    
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="alamat">
						<span class="focus-input100"></span>
						<span class="label-input100">Alamat</span>
                    </div>
                    
					<div class="wrap-input100 validate-input" style="height: 30px;">
						<select style="width: 100%;" id="province_destination"  class="selection-2" name="province_destination" onchange="get_city_destination(this);">	
						</select>
					</div>
                    
                    <div class="wrap-input100 validate-input" style="height: 30px;">
						<select style="width: 100%;" id="city_destination"  class="selection-2" name="city_destination">
							<option value=''>Pilih Kota</option>
						</select>
                    </div>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
                    </div>
                    
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="pertanyaan">
						<span class="focus-input100"></span>
						<span class="label-input100">Pertanyaan</span>
                    </div>
                    
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="jawaban">
						<span class="focus-input100"></span>
						<span class="label-input100">Jawaban</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Register
						</button>
					</div>

				</form>

				<div class="login100-more" style="background-image: url('<?= base_url('assets/loginshop/')?>images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="<?= base_url('assets/loginshop/')?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/loginshop/')?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/loginshop/')?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url('assets/loginshop/')?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="<?= base_url('assets/loginshop/')?>vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url('assets/')?>js/bootstrap-notify.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/loginshop/')?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url('assets/loginshop/')?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url('assets/loginshop/')?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="<?= base_url('assets/loginshop/')?>js/main.js"></script>
    
    <script>
  <?php if (!empty($this->session->flashdata('Status'))){?>
    setnotifstatus('<?php echo $this->session->flashdata('Status')?>');
<?php }?>

get_city();


 function setnotifstatus(err)
{ 
if(err== "Email Sudah Terdaftar")
    {
    ttp='danger';
    }

  $.notify({
	// options
	message: err,
  },{
    // settings
    element: 'body',
    position: null,
    type: ttp,
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: false,
    placement: {
      from: "bottom",
      align: "right"
    },
    offset: 20,
    spacing: 10,
    z_index: 1031,
    delay: 5000,
    timer: 1000,
    url_target: '_blank',
    mouse_over: null,
    animate: {
      enter: 'animated fadeInRight',
      exit: 'animated fadeOutRight'
    },
    onShow: null,
    onShown: null,
    onClose: null,
    onClosed: null,
    icon_type: 'class',
    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
      '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
      '<span data-notify="icon"></span> ' +
      '<span data-notify="title">{1}</span> ' +
      '<span data-notify="message">{2}</span>' +
      '<div class="progress" data-notify="progressbar">' +
        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
      '</div>' +
      '<a href="{3}" target="{4}" data-notify="url"></a>' +
    '</div>' 
  });

}

	function get_city()
		{
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
					}
			})
		}

		function get_city_destination(sel)
		{
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
				}
		})
		}
  </script>


</body>
</html>