<?php
  class User_model extends CI_Model{

    function _insert($data)
    {
      $query = $this->db->insert('users',$data);
      return $query;
    }
  }
?>
