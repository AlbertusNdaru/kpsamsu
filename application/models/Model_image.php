<?php
class Model_image extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT a.* ,b.Category_name, c.Type_name FROM product as a inner join category as b on b.Id=a.Category_id inner join product_type as c on c.Id=a.Product_type_id where a.Photo_name is null";
        return $this->db->query($query)->result();
    }

    function M_Update_image($Id,$PhotoName)
    {
       $query="UPDATE product set Photo_name='".$PhotoName."', Update_at = now() where Id='".$Id."'";
       $this->db->query($query);
    }

    function M_addProductImage($id,$nama)
    {
        $data       = array('Product_id'=>$id,
                            'Photo_name'=> $nama);
        $this->db->insert('imageproduct',$data);
    }
    

    function M_addArrayInsert($idProduct,$size,$stok)
    {
        $addArray= array('Product_id'=>$idProduct,
                         'Size'=>$size,
                         'Stok'=>$stok);
       return $addArray;
    }

   
 
}