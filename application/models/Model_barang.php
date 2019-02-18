<?php
class Model_barang extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT a.* ,b.Category_name, c.Type_name FROM product as a inner join category as b on b.Id=a.Category_id inner join product_type as c on c.Id=a.Product_type_id ";
        return $this->db->query($query)->result();
    }

    function tampil_data_type()
    {
        $query= "SELECT*FROM product_type";
        return $this->db->query($query)->result();
    }

    function tampil_data_type_byId($id)
    {
        $query= "SELECT*FROM product_type where Id='".$id."'";
        return $this->db->query($query)->row();
    }

    function M_addType($dataType)
    {
       $insert = $this->db->insert('product_type',$dataType);
       return $insert;
    }

    function M_addProduct($dataProduct,$stok)
    {
        $insertProduct = $this->db->insert('Product',$dataProduct);
        $Id=$this->db->insert_id();
        foreach($stok as $s)
        {
             $insertDataStok=$this->M_addArrayInsert($Id,$s,0);
             $this->db->insert('Product_stok',$insertDataStok);
        }
    }

    function M_addArrayInsert($idProduct,$size,$stok)
    {
        $addArray= array('Product_id'=>$idProduct,
                         'Size'=>$size,
                         'Stok'=>$stok);
       return $addArray;
    }
 
}