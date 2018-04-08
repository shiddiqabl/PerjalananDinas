<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lupa_password extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->library('form_validation');
        $this->load->library('email');
    }
   
    function index()
    {
        //$data['title'] = 'Halaman Reset Password';
        //$this->load->view('lupa_password_view', $data);
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_database');
        
        if($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Halaman Reset Password';
            $this->load->view('lupa_password_view', $data);
        }else{ 
            $username = $this->input->post('username');
            $where = array('username' => $username);
            $data['data_user'] = $this->user->ambil_data($where, 'users')->result();
            $this->load->view('reset_pass_view', $data);
        }
        
    }
    
    function check_database($email)
    {
        $username = $this->input->post('username');
        $email2 = $this->input->post('email');
        
        $result = $this->user->cek_data($username, $email2);
        
        if($result)
        {
            return TRUE;
        }else{
            $this->form_validation->set_message('check_database', '<div class="alert alert-danger">Invalid username or email</div>');
            return false;
        }        
    }
    
    function update_pass()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $data = array(  'email' => $email,
                        'password' => MD5($password)
        );
        
        $where = array('username' => $username);
        $this->user->update_data($where, $data, 'users');
        redirect('login');        
    }   
    
}  