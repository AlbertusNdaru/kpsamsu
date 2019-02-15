<?php
class Model_barang extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT*FROM product";
        return $this->db->query($query)->result();
    }

    function M_addType($dataType)
    {
       $insert = $this->db->insert('product_type',$dataType);
       return $insert;
    }
 
}