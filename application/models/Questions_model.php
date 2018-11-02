<?php
  class Questions_model extends CI_Model{

    function get_questions()
    {
        $this->db->select('*');   
        $this->db->from('questions');
        $query = $this->db->get();
        return $query->result();
    }
  }
?>
