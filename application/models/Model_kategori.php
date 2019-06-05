<?php
class Model_kategori extends CI_Model{
    
    function M_tampil_data()
    {
        $query= "SELECT*FROM category";
        return $this->db->query($query)->result();
    }

    function M_tampil_data_by_id($id)
    {
        $this->db->where('Id',$id);
        return $this->db->get('Category')->row();
    }

    function M_addCategory($dataCategory)
    {
       $insert = $this->db->insert('Category',$dataCategory);
       return $insert;
    }

    function M_editCategory($dataEdit,$id)
    {
      $this->db->where('Id',$id);
      $edit = $this->db->update('category',$dataEdit);
      return $edit;
    }

    function M_deleteCategory($id)
    {
        $this->db->where('Id',$id);
        $delete = $this->db->delete('category');
        return $delete;
    }

    
}