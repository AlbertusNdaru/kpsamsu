<?php
class Model_barang extends ci_model{
    
    
    function M_tampil_data()
    {
        // $query= "SELECT a.* ,b.Category_name, c.Type_name, d.Photo_name FROM product as a inner join category as b on b.Id=a.Category_id inner join product_type as c on c.Id=a.Product_type_id inner join imageproduct as d on d.Product_id = a.Id";
        // return $this->db->query($query)->result();
        $this->db->select('a.* ,b.Category_name, c.Type_name, d.Photo_name ');
        $this->db->from('product as a');
        $this->db->join('category as b ','b.Id=a.Category_id');
        $this->db->join('product_type as c','c.Id=a.Product_type_id');
        $this->db->join('imageproduct as d','d.Product_id = a.Id');
        $this->db->where('a.Photo_name is NOT NULL', NULL, FALSE);
        $this->db->where('a.Stok>','0');
        return $this->db->get()->result();
    }

    function M_tampil_data_by_id($id)
    {
        //$query= "SELECT a.* ,b.Category_name, c.Type_name FROM product as a inner join category as b on b.Id=a.Category_id inner join product_type as c on c.Id=a.Product_type_id where a.Id=".$id." ";
        $this->db->select('a.* ,b.Category_name, c.Type_name');
        $this->db->from('product as a');
        $this->db->join('category as b ','b.Id=a.Category_id');
        $this->db->join('product_type as c','c.Id=a.Product_type_id');
        $this->db->where('a.Id',$id);
        return $this->db->get()->row();
    }

    function M_tampil_data_type()
    {
        $query= "SELECT*FROM product_type";
        return $this->db->query($query)->result();
    }

    function M_tampil_data_type_byId($id)
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
        return $insertProduct;
    }

    function M_addArrayInsert($idProduct,$size,$stok)
    {
        $addArray= array('Product_id'=>$idProduct,
                         'Size'=>$size,
                         'Stok'=>$stok);
       return $addArray;
    }

    function M_editProduct($dataEdit,$Id)
    {
       $this->db->where('Id',$Id);
       $edit= $this->db->update('product',$dataEdit);
       return $edit;
    }

    function M_editType($dataEdit,$Id)
    {
       $this->db->where('Id',$Id);
       $edit= $this->db->update('product_type',$dataEdit);
       return $edit;
    }

    function M_deleteProduct($Id)
    {
       $this->M_deleteImage($Id);
       $this->db->where('Id',$Id);
       $delete= $this->db->delete('product');
       return $delete;
    }

    function M_deleteImage($id)
    {   
       
        $query="SELECT*FROM imageproduct where Product_id='".$id."'";
        $img=$this->db->query($query)->result();
        foreach($img as $r)
        {
            unlink('assets/shop/images/'.$r->Photo_name);
        }
        $this->db->where('Product_id',$id);
        $this->db->delete('imageproduct');
    }


    function M_deleteType($id)
    {
        $this->db->where('Id',$id);
        $delete = $this->db->delete('product_type');
        return $delete;
    }

   
    function M_productFeatured_Man()
    {
       $this->db->where('Category_id',1);
       $man   = $this->db->get('product')->result();
       return $man;
    }

    function M_productFeatured_Woman()
    {
       $this->db->where('Category_id',2);
       $woman   = $this->db->get('product')->result();
       return $woman;
    }
}