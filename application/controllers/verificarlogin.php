<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Verificarlogin extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('usuario','',TRUE);
 }
 
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean');
   $this->form_validation->set_rules('senha', 'Senha', 'trim|required|xss_clean|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login_view');
   }
   else
   {
     //Go to private area
     redirect('usuarios', 'refresh');
   }
 
 }
 
 function check_database($senha)
 {
   //Field validation succeeded.  Validate against database
   $login = $this->input->post('login');
 
   //query the database
   $result = $this->usuario->login($login, $senha);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'login' => $row->login
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Usuario Inválido ou Senha');
     return false;
   }
 }
}
?>