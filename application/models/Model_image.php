<?php
class Model_image extends ci_model{
    
    function M_tampil_data()
    {
        $this->db->select('a.* ,b.Category_name, c.Type_name');
        $this->db->from('product as a');
        $this->db->join('category as b ','b.Id=a.Category_id');
        $this->db->join('product_type as c','c.Id=a.Product_type_id');
        return $this->db->get()->result();
    }

    function getImgbyId($Id)
    {
        $this->db->where('Product_id',$Id);
        return $this->db->get('imageproduct')->row();
    }

    function M_Update_image($Id,$PhotoName)
    {
       $query="UPDATE product set Photo_name='".$PhotoName."', Update_at = now() where Id='".$Id."'";
       $this->db->query($query);
    }

    function M_addProductImage($id,$nama)
    {
        $data = array('Product_id'=>$id,
                      'Photo_name'=> $nama);
        $insertimg=$this->db->insert('imageproduct',$data);
        return $insertimg;
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

}