<?php
class Model_pembelian extends ci_model
{
    
    function getDataPembelian()
    {
        //mendapatkan semua data Category dari tabel tb_Category
        $this->db->select('a.*,b.Product_name');
        $this->db->from('pembelian as a');
        $this->db->join('product as b', 'b.Id = a.id_product');
        return $this->db->get()->result();
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