<?php
class Model_karyawan extends CI_Model{

    function get_karyawan()
    {
        $dataKaryawan = $this->db->get('karyawan')->result();
        return $dataKaryawan;
    }

    function get_karyawan_by_status()
    {
        $this->db->where("Status",'Aktif');
        $getKaryawanByStatus = $this->db->get('karyawan')->result();
        return $getKaryawanByStatus;
    }
      
    function get_karyawan_by_id($id_karyawan)
    {   
        $this->db->where("Id",$id_karyawan);
        $getKaryawanById = $this->db->get('karyawan')->row();
        return $getKaryawanById;
    }

    function get_karyawan_by_nik($nik)
    {   
        $this->db->where("NIK",$nik);
        $getKaryawanById = $this->db->get('karyawan')->row();
        return $getKaryawanById;
    }

    function get_karyawan_by_email($email)
    {   
        $this->db->where("email_karyawan",$email);
        $getKaryawanByEmail = $this->db->get('karyawan')->row();
        return $getKaryawanByEmail;
    }

    function add_karyawan($dataKaryawan)
    {
        $addkaryawan=$this->db->insert("karyawan",$dataKaryawan);
        return $addkaryawan;
    }

    function update_karyawan($id_karyawan,$dataKaryawan)
    {
        $this->db->where('Id',$id_karyawan);
        $updatekaryawan=$this->db->update("karyawan",$dataKaryawan);
        return $updatekaryawan;
    }

    function delete_karyawan($id_karyawan)
    {
        $this->db->where('Id',$id_karyawan);
        $deletekaryawan=$this->db->delete("karyawan");
        return $deletekaryawan;
    }
}
?>