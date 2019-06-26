<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign Up | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('assets/')?>favicon.ico" type="image/x-icon">

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
</head>

<body class="signup-page" style="overflow-y:hidden;">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>SHOP</b></a>
            <small>Kerja Praktek</small>
        </div>
        <div class="card">
            <div class="body">
            <?php echo form_open(''); ?>
                    <div class="msg">Recovery Password</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" id="username" readonly class="form-control" name="username" value="<?= $record->Username ?>" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">vpn_key</i>
                        </span>
                        <div class="form-line">
                            <input type="text" id="pertanyaan" readonly class="form-control" name="pertanyaan" minlength="6" value="<?= $record->pertanyaan ?>" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">vpn_key</i>
                        </span>
                        <div class="form-line">
                            <input type="text" id="jawaban" class="form-control" name="jawaban" minlength="6" placeholder="Answer" required>
                        </div>
                    </div>
                    <div id="pass" hidden>
                    <div  class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    </div>
                    <div id="btncek" >
                    <button class="btn btn-block btn-lg bg-pink waves-effect" onclick="cekjawaban()">Recovery</button>
                    </div>
                    <div id="btnreset" hidden>
                    <button hidden class="btn btn-block btn-lg bg-pink waves-effect"  type="submit" onclick="resetpassword()">Reset</button>
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
    <script src="<?php echo base_url('assets/')?>js/pages/examples/sign-up.js"></script>
</body>

<script>
 function cekjawaban()
 {
    var username= $('#username').val();
    var pertanyaan= $('#pertanyaan').val();
    var jawaban= $('#jawaban').val();
    $.ajax({
        url  :"<?php echo base_url('admin/User/cekJawaban');?>",
        type : 'POST',
        data : {
            username : username,
            pertanyaan : pertanyaan,
            jawaban : jawaban
        },
            success : function(data)
            { console.log(data);
                if (data == "true")
                {
                $('#pass').removeAttr('hidden');
                $('#btncek').attr('hidden','true');
                $('#btnreset').removeAttr('hidden');
                }
                else
                {
                alert('Jawaban salah!');
                }
            }
        })
    }   

 function resetpassword()
 {
    var username= $('#username').val();
    var password= $('#password').val(); 
    if(password == "")
    {
        alert('Password Tidak Boleh Kosong');
    }
    else
    {
        $.ajax({
            url  :"<?php echo base_url('admin/User/resetpassword');?>",
            type : 'POST',
            data : {
                username : username,
                password : password,
            },
                success : function(data)
                { 
                    if(data == "true")
                    {
                      
                        window.location = "<?php echo base_url('admin/Login/loginadmin')?>";
                        alert("Password Berhasil Diganti");
                    }
                    else
                    {
                        alert('Error');
                    }
                }
            })
    }
}   
</script>

</html>