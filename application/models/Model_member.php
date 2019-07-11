<?php
class Model_member extends ci_model
{
  function getDataMember()
  {
     return $this->db->get('member')->result();
  }

  function getDataMemberbyEmail($email)
  {
    $this->db->where('Email',$email);
     return $this->db->get('member')->row();
  }

  function deleteMember($id)
  {
      $this->db->where('Id',$id);
      return $this->db->delete('member');
  }

  function cekjawaban($filter)
  {
      return $this->db->get_where('member',$filter)->row();
  }
  function cekEmail($filter)
  {
      return $this->db->get_where('member',$filter)->row();
  }

  function updatePassword($data,$Email)
  {
      $this->db->where('Email', $Email);
      return $this->db->update('member',$data);
  }


}
?>