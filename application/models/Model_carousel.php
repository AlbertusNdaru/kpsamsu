<?php
class Model_carousel extends ci_model{
    
    
    function M_tampil_data()
    {
        $query= "SELECT * FROM carousel";
        return $this->db->query($query)->result();
    }

    function M_tampil_data_by_id($id)
    {
        $query="SELECT*FROM carousel where Id=".$id."";
        return $this->db->query($query)->row();
    }

    function M_addCarousel($dataCarousel)
    {
        $insertCarousel = $this->db->insert('carousel',$dataCarousel);
        return $insertCarousel;
    }

    function M_addArrayInsert($idProduct,$size,$stok)
    {
        $addArray= array('Product_id'=>$idProduct,
                         'Size'=>$size,
                         'Stok'=>$stok);
       return $addArray;
    }

    function M_editCarousel($dataEdit,$Id)
    {
       $this->db->where('Id',$Id);
       $edit= $this->db->update('carousel',$dataEdit);
       return $edit;
    }


    function M_deleteCarousel($Id)
    {
       $this->M_deleteimg($Id);
       $this->db->where('Id',$Id);
       $delete= $this->db->delete('carousel');
       return $delete;
    }

    function M_deleteimg($id)
    {   
        $detail= $this->Model_carousel->M_tampil_data_by_id($id);
        unlink('assets/img_slide/'.$detail->Image);
    }
}
