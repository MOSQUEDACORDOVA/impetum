<?php
class Privacidad extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //Parametros del Tempalte
        $vars['titulo']          = 'Aviso de Privacidad';
        $vars['vista_contenido'] = 'view_privacidad';
        $this->load->view('template_white', $vars);
    }
    
}