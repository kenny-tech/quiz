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

    function get_quiz_results()
    {
      $this->db->select('users.name,students_results.score,students_results.created');
      $this->db->from('users');
      $this->db->join('students_results','users.id = students_results.user_id');
      $this->db->order_by('students_results.id','desc');
      $query = $this->db->get();
      return $query->result();
    }
  }
?>
