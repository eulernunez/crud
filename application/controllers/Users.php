<?php
class Users extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('roles_model');
        $this->load->helper('url_helper');
    }
 
    public function index()
    {
        $data['users'] = $this->users_model->get_users();
        $data['title'] = 'Usuarios';
 
        $this->load->view('templates/header', $data);
        $this->load->view('users/index', $data);
        $this->load->view('templates/footer');
    }
 
   
    
    public function create()
    {
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Alta usuario';
        $data['roles'] = $this->roles_model->get_roles();
        
        $this->form_validation->set_rules('name', 'Nombre', 'trim|min_length[2]|required|max_length[60]');
        $this->form_validation->set_rules('email', 'Email', 'trim|min_length[4]|required|max_length[100]|valid_email');
        $this->form_validation->set_rules('phone', 'Telefono', 'required');
        $this->form_validation->set_rules('age', 'Edad', 'required');
        #$this->form_validation->set_rules('roles', 'Roles', 'required');
        
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('users/create',$data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->users_model->set_users();
            redirect( base_url() . 'index.php/users');
        }

    }
    
    public function edit()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Edición de Usuario';        
        $data['user_item'] = $this->users_model->get_user_by_id($id);
        #die('<pre>' . print_r($data, true) . '</pre>');
        $data['roles'] = $this->roles_model->get_roles();
        
        $this->form_validation->set_rules('name', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Correo', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('users/edit', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->users_model->set_users($id);
            redirect( base_url() . 'index.php/users');
        }
    }
    
    public function delete()
    {
        
        if($this->input->is_ajax_request() && $this->input->post('id'))
        {
            $id = $this->input->post('id');
            $this->users_model->delete_user($id);
        }

    }
    
    
}
