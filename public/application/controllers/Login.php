<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Personas_model', 'dbPer', TRUE);
    }

    public function index(){
        //Parametros del Tempalte
        $vars['titulo']          = 'Inicia Sesión o Regístrate';
        $vars['vista_contenido'] = 'view_login';
        //Parametros de la vista contenida
        $vars['data']            = "";
        $vars['settings']        = '';
        $this->load->view('template_login', $vars);
    }

    function login_check(){
        $correo   = $this->input->post('email');
        $password = $this->input->post('password');
        $user_id = $this->dbPer->check_login($correo, $password);
        if (!$user_id) {
            echo "1";
        }else {
            $this->session->set_userdata(array(
                'logged_in' => TRUE,
                'user_id' => $user_id
            ));
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}