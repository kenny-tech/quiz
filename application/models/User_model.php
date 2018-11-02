<?php
  class User_model extends CI_Model{

    function _insert($data)
    {
      $query = $this->db->insert('users',$data);
      return $query;
    }

    function verify_user($email,$password)
    {
        $this->db->select('id,name,email');   
        $this->db->from('users');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query = $this->db->get();
        if($query->num_rows()==1)
            return $query->result();
        else
            return false;
    }
  }
?>
