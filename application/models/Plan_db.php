<?php
class Plan_db extends My_Model{
    public function __construct(){
        parent::__construct();
    }

    public function get_plans(){
        $query          =$this->db->get('plan');
        if($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }
}