<?php
class Model_supliyer extends CI_Model{
    
    
    function addSupliyer($datasupl)
    {
        return $this->db->insert('supliyer',$datasupl);
    }

    function editSupliyer($dataSupliyer,$Id)
    {
        $this->db->where('Id',$Id);
        return $this->db->update('supliyer',$dataSupliyer);
    }
    
    
    function tampildata()
    {
        return $this->db->get('supliyer')->result();
    }
    
    function getSupliyerById($Id)
    {
        $this->db->where('Id', $Id);
        return $this->db->get('supliyer')->row();
    }

    function deleteSupliyer($Id)
    {
        $this->db->where('Id', $Id);
        return $this->db->delete('supliyer');
        
    }
}