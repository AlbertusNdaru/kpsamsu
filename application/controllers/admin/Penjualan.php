<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan  extends CI_Controller {
	function __construct() {
		parent::__construct();
        $this->load->model('Model_pembelian');
        $this->load->model('Model_barang');
        isLoginSessionExpired();
    }

    function getdataPenjualan()
    {
        
    }

}
?>