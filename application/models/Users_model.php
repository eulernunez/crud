<?php
class Users_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function get_users()
    {
        
        $query = $this->db->get('users');
        return $query->result_array();
 
    }
    
    public function get_user_by_id($id = 0)
    {
        
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('users.id = ' . $id);
        $this->db->join('user_role', 'user_role.user_id = users.id');
          
        return $this->db->get()->result_array();  
        
    }
    
    public function set_users($id = 0)
    {

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'age' => $this->input->post('age'));
        
        $roles = $this->input->post('roles');

        if ($id == 0) {
            try {
                $result = $this->db->insert('users', $data);
                if(!$result) {
                    return false;
                }
                $last_id = $this->db->insert_id();
                return $this->insert_roles_user($roles, $last_id);
            } catch (Exception $e) {
                echo $e->errorMessage();
            } 
            
        } else {
            try {
                $this->db->where('id', $id);
                $result = $this->db->update('users', $data);
                if(!$result) {
                    return false;
                }
                $this->delete_roles_user($id);
                return $this->insert_roles_user($roles, $id);
            } catch (Exception $e) {
                echo $e->errorMessage();
            }
        }

    }
    
    
    
    public function delete_user($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('users');
        $this->delete_roles_user($id);
        
        return true;

    }
    
    public function delete_roles_user($id)
    {

        $this->db->where('user_id', $id);
        return $this->db->delete('user_role');
        
    }        
    
    
    public function insert_roles_user($roles, $id)
    {

        foreach($roles as $role) {
            $data = array(
                'user_id' => $id,
                'role_id' => $role
            );
            $this->db->insert('user_role', $data);
        }

        return true;

    }        
    
}
