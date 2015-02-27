<?php

class Profit_target_model extends CI_Model {  
    
    public function createCoaching($data)
    {
         // Inserting in Table(coaching)
        $query = $this->db->insert('coaching', $data);
        return $query;       
    }
    public function getStafffTarget($staff_id)
    {
        $query = $this->db->get_where('profit_targets', array('staff_id' => $staff_id));
        return $query->row(); 
    }
    public function createStaffTarget($data)
    {
         // Inserting in Table(coaching)
        $query = $this->db->insert('profit_targets', $data);
        return $query;       
    }
    public function updateProfitTarget($data,$staff_id)
    { 
        $this->db->where('staff_id', $staff_id);
        $query = $this->db->update('profit_targets', $data); 
        return $query;
    }
}