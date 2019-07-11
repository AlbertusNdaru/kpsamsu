<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | T-Shirt Shop</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets/')?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets/')?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets/')?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets/')?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('').'assets/'?>css/animate.css">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>SHOP</b></a>
            <small>Kerja Praktek</small>
        </div>
        <div class="card">
            <div class="body">
            <?php echo form_open('admin/Login/login'); ?>
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" id="username" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row" style="display:grid;">
                        <div class="col-xs-4" style=" margin: auto; margin-bottom: 10px;"> 
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?php echo base_url('admin/Login/viewregister')?>">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="#" onclick="forget()" >Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets/')?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('assets/')?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('assets/')?>plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url('assets/')?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url('assets/')?>js/admin.js"></script>
    <script src="<?php echo base_url('assets/')?>js/bootstrap-notify.js"></script>
    <script src="<?php echo base_url('assets/')?>js/pages/examples/sign-in.js"></script>
</body>

<script>
<?php if (!empty($this->session->flashdata('Error'))){?>
    setnotif('<?php echo $this->session->flashdata('Error')?>');
<?php }?>


 function setnotif(err)
{ 


  $.notify({
	// options
	icon: 'glyphicon glyphicon-warning-sign',
	title: 'Error',
	message: err,
  },{
    // settings
    element: 'body',
    position: null,
    type: "danger",
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: false,
    placement: {
      from: "top",
      align: "center"
    },
    offset: 20,
    spacing: 10,
    z_index: 1031,
    delay: 5000,
    timer: 1000,
    url_target: '_blank',
    mouse_over: null,
    animate: {
      enter: 'animated fadeInDown',
      exit: 'animated fadeOutUp'
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

function forget()
{
    var username= $('#username').val();
  
    if(username=="")
    {
        alert('Username Tidak Boleh Kosong');
    }
    else
    {
        $.ajax({
        url  :"<?php echo base_url('admin/User/cekUser');?>",
        type : 'POST',
        data : {
            username : username
        },
            success : function(data)
            { 
                if(data=='true')
                {
                    window.location = "<?php echo base_url('admin/Login/viewForegetPassword/')?>"+username;
                }
                else
                {
                    alert('Username Tidak Terdaftar');
                }
            }
        })
      
    }
}
</script>

</html>