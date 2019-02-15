<?php
class Model_login extends CI_Model{
    
    
    
 
    function login($username,$password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('Username',$username);
        $this->db->where('password',$password);
        $chek = $this->db->get();
        $hasil=$chek->row();
        if($hasil)
        {
           if($hasil->isLogin == 1 )
            {
                return 1;
            }
            else if ($hasil->isLogin != 1)
            {
                $query = "update user set isLogin='1', lastlogin=".time()."  where Id='".$hasil->Id."'";
                $this->db->query($query);
                $this->session->set_userdata('userdata',$hasil);
                return 3;
            }
        }
        else
        {
            return 0;
        }
    
    }

    function selectusergrup()
    {
        $usergroup=$this->db->get('usergrup')->result();
        return $usergroup;
    }

    function inputadmin($datauser)
    {
        $this->db->insert('user',$datauser);
    }

    function loginuser($email,$password)
    {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $chek = $this->db->get();
        $hasil=$chek->row();
        if($hasil)
        {
            if ($hasil->gagallogin >=3 ) 
            {
             
                return 2;
            }
            else if($hasil->isLogin == 'Y' )
            {
                return 1;
            }
            else if ($hasil->isLogin != 'Y' && $hasil->gagallogin<3)
            {
                $query = "update member set gagallogin=0, isLogin='Y', lastlogin=".time()."  where email='".$email."'";
                $this->db->query($query);
                $this->session->set_userdata('userdata',$hasil);
                $this->session->set_userdata('loggedin_time',time());
                return 3;
            }
        }
        else
        {
            $query = "update member set gagallogin=gagallogin+1 where email='".$email."'";
            $this->db->query($query);
            return 0;
        }
    
    }

    function post()
    {
       
            $nama       =  $this->input->post('nama',true);
            $alamat   =  $this->input->post('alamat',true);
            $bagian   =  $this->input->post('bagian',true);
            $jeniskel   =  $this->input->post('jk',true);
            $notelp   =  $this->input->post('nomertelp',true);
            $level   =  $this->input->post('level',true);
            $datakar       =  array(   'id_karyawan'=>$newID,
                                    'nama'=>$nama,
                                    'alamat'=>$alamat,
                                    'bagian'=>$bagian,
                                    'jenis_kelamin'=>$jeniskel,
                                    'nomor_telp'=>$notelp,
                                    'level'=>$level );
            $this->db->insert('karyawan',$datakar);
    }

    function edit()
    {
            // proses kategori
            $id =  $this->input->post('id',true);
            $nama       =  $this->input->post('nama',true);
            $alamat   =  $this->input->post('alamat',true);
            $bagian   =  $this->input->post('bagian',true);
            $jeniskel   =  $this->input->post('jk',true);
            $notelp   =  $this->input->post('nomertelp',true);
            $level   =  $this->input->post('level',true);
            $datakar       =  array(   'id_karyawan'=>$id,
                                    'nama'=>$nama,
                                    'alamat'=>$alamat,
                                    'bagian'=>$bagian,
                                    'jenis_kelamin'=>$jeniskel,
                                    'nomor_telp'=>$notelp,
                                    'level'=>$level );
             $this->db->where('id_karyawan',$id);
             $this->db->update('karyawan',$datakar);
    }
    
    
    function tampildata()
    {
        return $this->db->get('karyawan');
    }
    
    function get_one_user($email)
    {
       
        return $this->db->Query("SELECT * from member where email='".$email."'")->row();
    }

    function get_one_user_admin($email)
    {
       
        return $this->db->Query("SELECT * from user where email='".$email."'")->row();
    }
    
    function get_one_user_byid($id)
    {
       
        return $this->db->Query("SELECT * from member where id_member='".$id."'")->row();
    }
    
    function get_one_admin_byid($id)
    {
       
        return $this->db->Query("SELECT * from user where id_user='".$id."'")->row();
    }

    function cekjawabanuser($email,$pertanyaan,$jawaban)
    {
        $param  =   array('email'=>$email,
                          'pertanyaan'=>$pertanyaan,
                          'jawaban'=>$jawaban);
        return $this->db->get_where('member',$param);
    }

    function cekjawabanuseradmin($email,$pertanyaan,$jawaban)
    {
        $param  =   array('email'=>$email,
                          'pertanyaannya'=>$pertanyaan,
                          'jawabannya'=>$jawaban);
        return $this->db->get_where('user',$param);
    }
    
    
    function resetpassworduser($email,$password)
    {
        return $this->db->query("UPDATE member set password='".$password."',  gagallogin=0 where email = '".$email."'");
    }

     function resetpasswordadmin($email,$password)
    {
        return $this->db->query("UPDATE user set password='".$password."',  gagallogin=0 where email = '".$email."'");
    }
}