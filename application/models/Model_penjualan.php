<?php
class Model_penjualan extends ci_model{
 
   
    function addDetailFromCart($databarangtransaksi)
    {
        $Product_id    = $databarangtransaksi['Product_id'];
        $Member_id  = $_SESSION['userdata']->Id;
        $Qty            = $databarangtransaksi['Qty'];
        $Price      = $databarangtransaksi['Price'];
        $data= array('Product_id'=>$Product_id,
                     'Price'=>$Price,
                     'Qty'=>$Qty,
                     'Member_id'=>$Member_id,
                     'Status'=>0);
            $this->db->insert('details',$data);
    }

    function addDetailFromLogin($databarangtransaksi,$Product_id)
    {
        $Product_id=$databarangtransaksi[$Product_id]['Product_id'];
        $Member_id=$_SESSION['userdata']->Id;
        $Qty=$databarangtransaksi[$Product_id]['Qty'];
        $Price=$databarangtransaksi[$Product_id]['Price'];
        $data= array('Product_id'=>$Product_id,
                     'Price'=>$Price,
                     'Qty'=>$Qty,
                     'Member_id'=>$Member_id,
                     'Status'=>0);
            $this->db->insert('details',$data);
    }

    function updateDetailsFromCart($databarangtransaksi)
    {
        $Product_id = $databarangtransaksi['Product_id'];
        $Member_id  = $_SESSION['userdata']->Id;
        $this->db->where('Transaction_id',Null);
        $this->db->where('Member_id',$Member_id);
        $this->db->where('Product_id',$Product_id);
        $this->db->Update('details',$databarangtransaksi);
    }

    function emptychartfromlogin($Member_id)
    {
        $this->db->where('Transaction_id',Null);
        $this->db->where('Member_id',$Member_id);
        $this->db->delete('details');
    }

    function deleteDetailsbyId($Member_id,$Product_id)
    {
        $this->db->where('Transaction_id',Null);
        $this->db->where('Product_id',$Product_id);
        $this->db->where('Member_id',$Member_id);
        $this->db->delete('details');
    }

    function checkout($datacheckout)
    {
       return $this->db->insert('transaction',$datacheckout);
    }

    function getidtransaksibyBill($bill)
    {
      $this->db->where('Transaction_bill',$bill);
      $data = $this->db->get('transaction')->row();
      return $data->Id;
    }

    function getdatatransaksi($id)
    {
        $this->db->distinct();
        $this->db->select('b.Member_id as ID, a.*');
        $this->db->from('transaction as a');
        $this->db->join('details as b','b.Transaction_id=a.Id');
        $this->db->where('b.Member_id',$id);
        $this->db->where('a.Stats',3);
        return $this->db->get()->result();   
    }

    function updateTransaksiSukses($datatransaksi)
    {
        $Member_id=$_SESSION['userdata']->Id;
        $this->db->where('Transaction_id',Null);
        $this->db->where('Member_id',$Member_id);
        $this->db->Update('details',$datatransaksi);
    }
}
?>