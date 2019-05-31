<?php
class Model_penjualan_admin extends ci_model{
   
    function cekpenjualan()
    {
        $this->db->where('Stats',0);
        $dataPenjualan = $this->db->get('transaction')->result();
        return $dataPenjualan;
    }
}
?>