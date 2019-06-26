<?php
class Model_member extends ci_model
{
  function getDataMember()
  {
     return $this->db->get('member')->result();
  }

  function deleteMember($id)
  {
      $this->db->where('Id',$id);
      return $this->db->delete('member');
  }


}
?>