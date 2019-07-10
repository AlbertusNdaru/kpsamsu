<?php
class Model_penjualan_admin extends ci_model{
   
    function cekpenjualan()
    {
        $this->db->where('Stats',1);
        $dataPenjualan = $this->db->get('transaction')->result();
        return $dataPenjualan;
    }

    function getDataPenjualan()
    {
      $this->db->where("(Stats=2 OR Stats=3)");
        return $this->db->get('transaction')->result();
    }

    
    function getDataLaporanPenjualan()
    {
      $this->db->where("(Stats=3)");
        return $this->db->get('transaction')->result();
    }

    function getDataLaporanPenjualanBydate($tgl1,$tgl2)
    {
      $this->db->where("(Stats=3)");
      $this->db->where("(Date BETWEEN '$tgl1' AND '$tgl2')");
        return $this->db->get('transaction')->result();
    }

    function getDataPenjualanKirim()
    {
        $this->db->where("(Stats=2 OR Stats=3)");
        $this->db->where('Bukti_transaksi is NOT NULL');
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

    function getBarang10Baranglaris()
    {
      $query = "SELECT a.Product_id, SUM(Qty) as jmljual , b.Product_name , c.Type_name FROM details as a inner join product as b on b.Id = a.Product_id inner join product_type as c on c.Id = b.Product_type_id GROUP BY a.Product_id ASC LIMIT 0,10";
      return $this->db->query($query)->result();
    }

    function getbukti($bill)
    {
        $this->db->where('Transaction_bill',$bill);
        return $this->db->get('transaction')->row();
    }
}
?>