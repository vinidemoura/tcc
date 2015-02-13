<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    
        function __construct()
        {
            parent::__construct();
 
            $this->load->database();
            $this->load->helper('url');
 
            $this->load->library('grocery_CRUD');
            
            if($this->session->userdata('logged_in'))
            {
                $session_data = $this->session->userdata('logged_in');
                $data['login'] = $session_data['login'];
                $this->criar_crud();
            }
            else
            {
            //If no session, redirect to login page
                redirect('login', 'refresh');
            }
 
        }
	
	public function index()
	{
		//$this->load->view('welcome_message');
                
	}
        
        public function criar_crud()
        {
                $crud = new grocery_CRUD();
 
                $crud->set_table('usuarios');
                $crud->columns('nome','email','tipo');
                $crud->fields('nome','login','senha','email','tipo');

                $output = $crud->render();
                
                $this->_example_output($output);
		}
		function _example_output($output = null)
		{
				$this->load->view('example.php',$output);  
		}                
        
        
}

