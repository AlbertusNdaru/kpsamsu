<?php

function ceksession()
{   $CI= & get_instance();
    if (isset($_SESSION['userdata']->Username))
    {
        isLoginSessionExpired();
        return true;
    }
    else
    {
        $CI->load->view('admin/login');
        return false;
    }
}

function ceksessionuser()
{   $CI= & get_instance();
    if (isset($_SESSION['userdata']->Id))
    {
        isLoginSessionExpireduser();
        return true;
    }
    else
    {
        $CI->load->view('user/user_index');
        return false;
    }
}




function isLoginSessionExpired() {
    $CI= & get_instance();
	$login_session_duration = 300; 
    $current_time = time(); 
	if(isset($_SESSION['loggedin_time']) && isset($_SESSION['userdata'])){  
		if((abs($current_time - $_SESSION['loggedin_time']) > $login_session_duration)){ 
         
           
            session_destroy();
            redirect('admin/Login/loginadmin');
        } 
        else
        {
            $CI->session->set_userdata('loggedin_time',time());
            return;
        }
    }
   
}

function ceklastlogin($username=null)
{  $CI= & get_instance();
    $login_session_duration = 300; 
    $lastlogin = $CI->db->query("SELECT LastLogin from user where Username='".$username."'")->row() ;
    if($lastlogin){
        if (abs(time()-($lastlogin->lastlogin))>$login_session_duration)
        {
        $CI->db->query("update user set isLogin='0' where Username='".$username."'"); 
        return true;
        }
    }
    else{
        //$CI->load->view('admin/login');
        return false;
    }

}

function ceklastloginuser($email=null)
{  $CI= & get_instance();
    $login_session_duration = 300; 
    $lastlogin = $CI->db->query("SELECT lastlogin from member where email='".$email."'")->row() ;
    if($lastlogin)
    {
        if (abs(time()-($lastlogin->lastlogin))>$login_session_duration)
        {
          $CI->db->query("update member set isLogin='N' where email='".$email."'"); 
          return true;
        }
    }
    else
    {
        return false;
    }
    
}

function isLoginSessionExpireduser() {
    $CI= & get_instance();
	$login_session_duration = 300; 
    $current_time = time(); 
	if(isset($_SESSION['loggedin_time']) && isset($_SESSION['userdata'])){  
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
         
            $CI->db->query("update member set isLogin='N', gagallogin=0 where Id='".$_SESSION['userdata']->Id."'") ;
            session_destroy();
            redirect('user/Shop');
        } 
        else
        {
            $CI->session->set_userdata('loggedin_time',time());
            return;
        }
	}

}

function get_current_date()
{
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('Asia/Jakarta'));
    if(isset($format))
        return $date->format($format);
    return $date->format('Y-m-d H:i:s');
}

function get_current_date_img()
{
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('Asia/Jakarta'));
    if(isset($format))
        return $date->format($format);
    return $date->format('YmdHis');
}

function base_url_shop()
{
    return base_url('assets/shop/');
}

?>
