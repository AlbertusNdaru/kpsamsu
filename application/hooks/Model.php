
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLoader {
    private $CI;
    function __construct()
    {
        
        //parent::__construct();
        $this->CI =& get_instance();

        if(!isset($this->CI->session)){  //Check if session lib is loaded or not
              $this->CI->load->library('session');  //If not loaded, then load it here
        }
    }

    function Initialize() {
        $CI =& get_instance();
        //$usersetting = $this->CI->session->userdata('usersettings');
        $CI->load->helper(array('model'));
        $CI->load->model(array('member','err_msg','info_msg'), !empty($_SESSION['languages']['Name']) ? $_SESSION['languages']['Name'] : $this->CI->config->item('language'));
    }
}