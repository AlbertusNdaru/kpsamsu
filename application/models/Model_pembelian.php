<?php
class Model_pembelian extends ci_model
{
    
    function getDataCategory()
    {
        //mendapatkan semua data Category dari tabel tb_Category
        $dataCategory = $this->db->get("tb_category")->result();
        return $dataCategory;
    }

    function getDataCategoryById($id)
    {
        //mendapatkan semua data Category dari tabel tb_Category
        $this->db->where('Category_id',$id);
        $dataCategory = $this->db->get('tb_category')->row();
        return $dataCategory;
    }

    function insertPembelian($dataPembelian)
    {
        //$dataCategory itu isinya data yg dikirim dari function di controller yg memanggil function ini 
        $dataPembelianInsert = $this->db->insert('pembelian',$dataPembelian);
        return $dataPembelianInsert ;
    }

    function editDataCategory($id,$dataCategory)
    {
        $this->db->where('Category_id',$id);
        $dataCategoryEdit = $this->db->update('tb_category',$dataCategory);
        return $dataCategoryEdit;
    }

    function deleteDataCategory($id)
    {
       $this->db->where('Category_id',$id);
       $deletCategory =$this->db->delete("tb_category");
       return $deletCategory;
    }

    
}