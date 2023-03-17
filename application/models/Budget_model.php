<?php

class Budget_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    public function get_expense_type() {
        $query = $this->db->get('CLS_BUDGET_TYPE');
        return $query->result();
    }
}
  