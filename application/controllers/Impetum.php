<?php
class Impetum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //Parametros del Tempalte
        $vars['titulo']          = 'Nosotros';
        $vars['vista_contenido'] = 'view_impetum';
        $this->load->view('template_white', $vars);
    }
    
}
