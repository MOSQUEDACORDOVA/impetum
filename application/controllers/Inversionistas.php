<?php
class Inversionistas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //Parametros del Tempalte
        $vars['titulo']          = 'Inversionistas';
        $vars['vista_contenido'] = 'view_inversionistas';
        $this->load->view('template_white', $vars);
    }
    
}
