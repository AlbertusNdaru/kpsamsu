<?php
class Model_login extends CI_Model{
    
    
    
 
    function M_login($username,$password)
    {
        $this->db->select('a.*,b.Name');
        $this->db->from('user as a');
        $this->db->join('usergrup as b','b.Id = a.Usergrup_id');
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

    function M_selectusergrup()
    {
        $usergroup=$this->db->get('usergrup')->result();
        return $usergroup;
    }

    function M_inputadmin($datauser)
    {
        $this->db->insert('user',$datauser);
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