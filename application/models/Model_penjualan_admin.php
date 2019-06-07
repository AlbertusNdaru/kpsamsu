<?php
class Model_penjualan_admin extends ci_model{
   
    function cekpenjualan()
    {
        $this->db->where('Stats',0);
        $dataPenjualan = $this->db->get('transaction')->result();
        return $dataPenjualan;
    }

    function getDataPenjualan()
    {
        $this->db->where('Stats',1);
        return $this->db->get('transaction')->result();
    }

    function updateStatusTransaksi($dataTransaksi,$Id)
    {
      $this->db->where('Id',$Id);
      return $this->db->update('transaction',$dataTransaksi);
    }

    function getDetailPenjualanById($Id)
    {
      // $query= "SELECT a.*,b.Product_name, c.Transaction_bill from details as a inner join product as b on b.Id=a.Product_id inner join transaction as c on a.Transaction_id=c.Id where a.Transaction_id = ".$Id." ";
       $this->db->select('a.*,b.Product_name, c.Transaction_bill');
       $this->db->from('details as a');
       $this->db->join('product as b','b.Id=a.Product_id');
       $this->db->join('transaction as c','a.Transaction_id=c.Id');
       $this->db->where('a.Transaction_id',$Id);
       return $this->db->get()->result();
    }
}
?>