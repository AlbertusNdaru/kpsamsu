<?php
class Model_user extends ci_model
{

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
            if ($hasil->FailedLogin >=3 ) 
            {
                return 2;
            }
            else if($hasil->isLogin == 'Y' )
            {
                return 1;
            }
            else if ($hasil->isLogin != 'Y' && $hasil->FailedLogin<3)
            {
                $query = "update member set FailedLogin=0, isLogin='Y', lastlogin=".time()."  where Email='".$email."'";
                $this->db->query($query);
                $this->session->set_userdata('userdata',$hasil);
                $this->session->set_userdata('loggedin_time',time());
                return 3;
            }
        }
        else
        {
            $query = "update member set FailedLogin=FailedLogin+1 where Email='".$email."'";
            $this->db->query($query);
            return 0;
        }
    
    }

    function register($datauser)
    {
        $this->db->select('email');
        $this->db->from('user');
        $this->db->where('email',$datauser['email']);
        $chek = $this->db->get();
        $data=$chek->row();
        if ($data)
        {
            return 1;
        }
        else
        {
            $query = "SELECT max(id_user) as maxKode from user";
            $check = $this->db->query($query);
            $data = $check->row();
            $id_user = $data->maxKode;
            $noUrut = (int) substr($id_user,3,3);
            $noUrut++;
            $char = "USR";
            $newID = $char. sprintf("%03s",$noUrut);
            $datauser['id_user']=$newID;
            $this->db->insert('user',$datauser);
            return 0;
        }
    }

    function cekEmail($email)
    {
        $this->db->select('email');
        $this->db->from('member');
        $this->db->where('email',$email);
        $chek = $this->db->get();
        $data=$chek->row();
        if ($data)
        {
            return 1;
        }
        else{
            return 0;}
    }

    function registeruser($datauser)
    {
        $this->db->select('Email');
        $this->db->from('member');
        $this->db->where('Email',$datauser['Email']);
        $chek = $this->db->get();
        $data=$chek->row();
        if ($data)
        {
            return 1;
        }
        else
        {
            $this->db->insert('member',$datauser);
            return 0;
        }
    }

    function getKaryawan()
    {
        $this->db->select('id_karyawan,nama');
        $this->db->from('karyawan');
        $chek = $this->db->get();
        return $chek->result();
    }

    function getAllUser()
    {
        $this->db->select('a.*, b.Name as HakAkses');
        $this->db->from('user as a');
        $this->db->join('usergrup as b','b.Id = a.Usergrup_id');
        return $this->db->get()->result();
    }

    function getUserByUsername($username)
    {
        $this->db->where('Username',$username);
        return $this->db->get('user')->row();
    }
    
    function getUserById($Id)
    {
        $this->db->where('Karyawan_id',$Id);
        return $this->db->get('user')->row();
    }

    function cekjawaban($filter)
    {
        return $this->db->get_where('user',$filter)->row();
    }

    function cekUser($filter)
    {
        return $this->db->get_where('user',$filter)->row();
    }

    function updatePassword($data,$Username)
    {
        $this->db->where('Username', $Username);
        return $this->db->update('user',$data);
    }


}
?>