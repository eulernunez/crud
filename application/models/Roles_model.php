<?php
class Roles_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_roles()
    {
        
        $query = $this->db->get('roles');
        return $query->result_array();
 
    }
    
}
