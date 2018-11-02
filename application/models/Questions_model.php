<?php
  class Questions_model extends CI_Model{

    function get_questions()
    {
        $this->db->select('*');
        $this->db->from('questions');
        $query = $this->db->get();
        return $query->result();
    }

    function getquestions()
    {
        $this->db->select('*');
        $this->db->from('questions');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_valid_answers($question,$answer)
    {
      $this->db->select('id');
      $this->db->from('questions');
      $this->db->where('id',$question);
      $this->db->where('valid_ans',$answer);
      $query = $this->db->get();
      if($query->num_rows()>0)
        return true;
      else
        return false;
    }

    function store_result($data)
    {
      $query = $this->db->insert('students_results',$data);
      return $query;
    }
  }
?>
