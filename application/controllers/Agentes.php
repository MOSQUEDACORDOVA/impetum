<?php
class Agentes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inicio_model');
    }

    public function index()
    {
        //Parametros del Tempalte
        $vars['titulo']          = 'Agentes';
        $vars['vista_contenido'] = 'view_agentes';
        $this->load->view('template_white', $vars);
    }
    
    
    function show_agentes(){
		$users_online=$this->inicio_model->show_agentes();

		if($users_online->num_rows()>0){
			$url = base_url();
			$useronline_html='';	
			foreach($users_online->result() as $user_on_line){
				$ubicacion = $user_on_line->ubicacion;
				$telefono = $user_on_line->telefono;
				$email = $user_on_line->email;
				
				$ver_ubicacion = ($ubicacion == '') ? 'style="display:none;"' : '';
				$ver_telefono = ($telefono == '') ? 'style="display:none;"' : '';
				$ver_email = ($email == '') ? 'style="display:none;"' : '';
				
				$useronline_html.='
			
				<div class="agente-card">
				   <div class="agente-img-div">
				   <img src="'.base_url().'imagenes_agente/'.$user_on_line->imagen_portada.'" style="width:100%;">
				   </div>
				   <div class="div-agente-text">
				      <p class="agente-text">
					  <img src="'.base_url().'site-img/card.svg" style="width:18px;position:relative;top:3px;">&nbsp;&nbsp;&nbsp;&nbsp;'.$user_on_line->nombre.'<br>
					  <span '.$ver_ubicacion.'><img src="'.base_url().'site-img/map-location.svg" style="width:21px;position:relative;top:3px;">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:rgb(94, 94, 94);">Ubicación: '.$user_on_line->ubicacion.'</span><br></span>
					  <span '.$ver_email.'><img src="'.base_url().'site-img/mail-2.svg" style="width:18px;position:relative;top:3px;">&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:'.$user_on_line->email.'" style="color:rgb(94, 94, 94);">'.$user_on_line->email.'</a><br></span>
					  <span '.$ver_telefono.'><img src="'.base_url().'site-img/contact-2.svg" style="width:18px;position:relative;top:3px;">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:rgb(94, 94, 94);">'.$user_on_line->telefono.'</span></span>
				      </p>
				   </div>
				</div>';
				
			}
			$result=$useronline_html;
			echo $result;
		}
	}
	
	function busqueda_agentes(){
		$users_online=$this->inicio_model->busqueda_agentes();

		if($users_online->num_rows()>0){
			$url = base_url();
			$useronline_html='';	
			foreach($users_online->result() as $user_on_line){
				$useronline_html.='
				
				<div class="agente-card">
				   <div class="agente-img-div">
				   <img src="'.base_url().'imagenes_agente/'.$user_on_line->imagen_portada.'" style="width:100%;">
				   </div>
				   <div class="div-agente-text">
				      <p class="agente-text">
					  <img src="'.base_url().'site-img/card.svg" style="width:18px;position:relative;top:3px;">&nbsp;&nbsp;&nbsp;&nbsp;'.$user_on_line->nombre.'<br>
					  <img src="'.base_url().'site-img/map-location.svg" style="width:21px;position:relative;top:3px;">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:rgb(94, 94, 94);">Ubicación: '.$user_on_line->ubicacion.'</span><br>
					  <img src="'.base_url().'site-img/mail-2.svg" style="width:18px;position:relative;top:3px;">&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:'.$user_on_line->email.'" style="color:rgb(94, 94, 94);">'.$user_on_line->email.'</a><br>
					  <img src="'.base_url().'site-img/contact-2.svg" style="width:18px;position:relative;top:3px;">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:rgb(94, 94, 94);">'.$user_on_line->telefono.'</span>
				      </p>
				   </div>
				</div>';
				
			}
			$result=$useronline_html;
			echo $result;
		}else{
			echo '<div class="hidden-xs" style="width: 100%;height: 150px;"></div>
					<div class="visible-xs" style="width: 100%;height: 70px;"></div>   
					<div style="width:100%;text-align:center;padding-left: 20px;padding-right: 20px;">
						<span class="trabajaConNostros" style="color:red;">Sin resultados</span>
						<div style="width: 100%;height: 30px;"></div>
						<div class="trabajaTexto">
							Lo sentimos, no se encontraron agentes relacionadas con los criterios de búsqueda.<br> Por favor contáctenos vía email: <a href="mailto:info@impetum.mx" style="font-weight: normal;font-size: 16px;color: black;" class="trabajaConNostros">info@impetum.mx</a> para poder asistirle de manera directa.
						</div>
						
					</div>  
					<div class="hidden-xs" style="width: 100%;height: 150px;"></div>
					<div class="visible-xs" style="width: 100%;height: 70px;"></div>';
		}
	}
}
