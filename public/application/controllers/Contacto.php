<?php
class Contacto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('json');
    }

    public function index()
    {
        //Parametros del Tempalte
        $vars['titulo']          = 'Contacto';
        $vars['vista_contenido'] = 'view_contacto';
        $this->load->view('template_white', $vars);
    }
    
    public function mail(){
		
    	$this->load->library('email');
		$fromemail="info@impetum.mx";
		$id = $this->input->post('id');
		$toemail = $this->input->post('email');
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$mensaje = $this->input->post('mensaje');
		
		$subject = 'Hola, hemos recibido tu mensaje';
		$list = ('info@impetum.mx');
		$url = base_url();
		$data['url'] = $url;
		$data['email'] = $toemail;
		$data['name'] = $name;
		$data['phone'] = $phone;
		$data['mensaje'] = $mensaje;
		
		$email = $this->load->view('email_contacto', $data, TRUE);
		
		$this->load->library('email');
		
		$config=array(
		'charset'=>'utf-8',
		'wordwrap'=> TRUE,
		'mailtype' => 'html'
		);
		
		$this->email->initialize($config);
		
		$this->email->to($toemail);
		$this->email->bcc($list);
		$this->email->from($fromemail, "IMPETUM Inmobiliaria");
		$this->email->subject($subject);
		$this->email->message($email);

		if($this->email->send()){
			$respuesta = array('success'=>TRUE,'error'=>FALSE);
			respuesta_json($respuesta);
	    }else{
			$response = array('success'=>FALSE,'error'=> show_error($this->email->print_debugger()));
			respuesta_json($respuesta);
	    	
	    }
    
    }
    
}