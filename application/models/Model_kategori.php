<?php
class Model_kategori extends CI_Model{
    
    function tampil_data()
    {
        $query= "SELECT*FROM product";
        return $this->db->query($query)->result();
    }

    function M_addCategory($dataCategory)
    {
       $insert = $this->db->insert('Category',$dataCategory);
       return $insert;
    }
}