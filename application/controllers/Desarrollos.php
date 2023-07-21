<?php
class Desarrollos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inicio_model');
        $this->load->helper('json');
    }

    public function index()
    {
        //Parametros del Tempalte
        $vars['titulo']          = 'Desarrollos';
        $vars['vista_contenido'] = 'view_desarrollos';
        $this->load->view('template_white', $vars);
    }
    
    function show_propiedades(){
		$users_online=$this->inicio_model->show_desarrollos_all();

		if($users_online->num_rows()>0){
			$url = base_url();
			$useronline_html='';
			
			foreach($users_online->result() as $user_on_line){
				
				switch ($user_on_line->tipo) {
				    case 1:
				        $icono = 'preventa.svg';
				        $estatus = 'PREVENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'block';
				        break;
				    case 2:
				        $icono = 'vendido.svg';
				        $estatus = 'VENDIDO';
				        $precio = $estatus;
				        $background = 'rgb(217, 39, 65)';
				        $display = 'block';
				        break;
				    case 3:
				        $icono = 'renta.svg';
				        $estatus = 'EN RENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'none';
				        break;
				    case 4:
				        $icono = 'venta.svg';
				        $estatus = 'EN VENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'none';
				        break;
				    case 5:
				        $icono = 'renta_y_venta.svg';
				        $estatus = 'EN RENTA & VENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'none';
				        break;
				}
				
				$useronline_html.='
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 entrada">
					<div style="border:1px solid rgb(216, 221, 228);">
						<a href="'.base_url().'desarrollos/detalle_propiedad/'.$user_on_line->id.'"><img src="'.base_url().'imagenes_desarrollo/'.$user_on_line->id.'/'.$user_on_line->imagen_portada.'" class="img-responsive" style="margin-bottom: 0px;position:relative"><button class="tags" style="background:'.$background.';pointer-events:none;display:'.$display.';">'.$estatus.'</button></a>
						<div style="padding:20px;padding-bottom:0px;">
							<img src="'.base_url().'site-img/'.$icono.'" width="22">&nbsp;&nbsp;<span class="recuadroTituloPropiedad">'.$estatus.'</span><br><br>
							<p class="subtituloEntrada">'.$user_on_line->nombre_propiedad.'</p>
							<p class="preciosPropiedades" style="margin-top:12px;">'.$precio.'</p>
							<div class="descripcionIntro" style="margin-top:12px;">'.$user_on_line->descripcion_intro.'</div>
							<div class="descripcionIntro">'.$user_on_line->ubicacion.'</div>
							<div class="row" style="margin:0px;">
								<a href="#" data-toggle="modal" data-target="#modalDesarrollo" data-titulo="'.$user_on_line->nombre_propiedad.'" data-id="'.$user_on_line->id.'"><button class="meinteresa col-lg-6 col-xs-6 col-sm-6">ME INTERESA</button></a>
								<a href="'.base_url().'desarrollos/detalle_propiedad/'.$user_on_line->id.'"><button class="verPropiedad col-lg-6 col-xs-6 col-sm-6">VER PROPIEDAD&nbsp;&nbsp;<img src="'.base_url('site-img/property.svg').'" style="width:16px;position:relative;top:3px;"></button></a>
							</div>
						</div>
					</div>
				</div>';
			}
			$result=$useronline_html;
			echo $result;
		}
	}
    
    function show_propiedades_filtro(){
		$users_online=$this->inicio_model->show_desarrollos_filtro();

		if($users_online->num_rows()>0){
			$url = base_url();
			$useronline_html='';
			
			foreach($users_online->result() as $user_on_line){
				
				switch ($user_on_line->tipo) {
				    case 1:
				        $icono = 'preventa.svg';
				        $estatus = 'PREVENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'block';
				        break;
				    case 2:
				        $icono = 'vendido.svg';
				        $estatus = 'VENDIDO';
				        $precio = $estatus;
				        $background = 'rgb(217, 39, 65)';
				        $display = 'block';
				        break;
				    case 3:
				        $icono = 'renta.svg';
				        $estatus = 'EN RENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'none';
				        break;
				    case 4:
				        $icono = 'venta.svg';
				        $estatus = 'EN VENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'none';
				        break;
				    case 5:
				        $icono = 'renta_y_venta.svg';
				        $estatus = 'EN RENTA & VENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'none';
				        break;
				}
				
				$useronline_html.='
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 entrada">
					<div style="border:1px solid rgb(216, 221, 228);">
						<a href="'.base_url().'desarrollos/detalle_propiedad/'.$user_on_line->id.'"><img src="'.base_url().'imagenes_desarrollo/'.$user_on_line->id.'/'.$user_on_line->imagen_portada.'" class="img-responsive" style="margin-bottom: 0px;position:relative"><button class="tags" style="background:'.$background.';pointer-events:none;display:'.$display.';">'.$estatus.'</button></a>
						<div style="padding:20px;padding-bottom:0px;">
							<img src="'.base_url().'site-img/'.$icono.'" width="22">&nbsp;&nbsp;<span class="recuadroTituloPropiedad">'.$estatus.'</span><br><br>
							<p class="subtituloEntrada">'.$user_on_line->nombre_propiedad.'</p>
							<p class="preciosPropiedades" style="margin-top:12px;">'.$precio.'</p>
							<div class="descripcionIntro" style="margin-top:12px;">'.$user_on_line->descripcion_intro.'</div>
							<div class="descripcionIntro">'.$user_on_line->ubicacion.'</div>
							<div class="row" style="margin:0px;">
								<a href="#" data-toggle="modal" data-target="#modalDesarrollo" data-titulo="'.$user_on_line->nombre_propiedad.'" data-id="'.$user_on_line->id.'"><button class="meinteresa col-lg-6 col-xs-6 col-sm-6">ME INTERESA</button></a>
								<a href="'.base_url().'desarrollos/detalle_propiedad/'.$user_on_line->id.'"><button class="verPropiedad col-lg-6 col-xs-6 col-sm-6">VER PROPIEDAD&nbsp;&nbsp;<img src="'.base_url('site-img/property.svg').'" style="width:16px;position:relative;top:3px;"></button></a>
							</div>
						</div>
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
							Lo sentimos, no se encontraron propiedades relacionadas con los criterios de búsqueda.<br> Por favor contáctenos vía email: <a href="mailto:info@impetum.mx" style="font-weight: normal;font-size: 16px;color: black;" class="trabajaConNostros">info@impetum.mx</a> para poder asistirle de manera directa.
						</div>
						
					</div>  
					<div class="hidden-xs" style="width: 100%;height: 150px;"></div>
					<div class="visible-xs" style="width: 100%;height: 70px;"></div> ';
		}
	}
    
    function show_propiedades_filtros(){
		$users_online=$this->inicio_model->show_desarrollos_filtros();

		if($users_online->num_rows()>0){
			$url = base_url();
			$useronline_html='';
			
			foreach($users_online->result() as $user_on_line){
				
				switch ($user_on_line->tipo) {
				    case 1:
				        $icono = 'preventa.svg';
				        $estatus = 'PREVENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'block';
				        break;
				    case 2:
				        $icono = 'vendido.svg';
				        $estatus = 'VENDIDO';
				        $precio = $estatus;
				        $background = 'rgb(217, 39, 65)';
				        $display = 'block';
				        break;
				    case 3:
				        $icono = 'renta.svg';
				        $estatus = 'EN RENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'none';
				        break;
				    case 4:
				        $icono = 'venta.svg';
				        $estatus = 'EN VENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'none';
				        break;
				    case 5:
				        $icono = 'renta_y_venta.svg';
				        $estatus = 'EN RENTA & VENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'none';
				        break;
				}
				
				$useronline_html.='
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 entrada">
					<div style="border:1px solid rgb(216, 221, 228);">
						<a href="'.base_url().'desarrollos/detalle_propiedad/'.$user_on_line->id.'"><img src="'.base_url().'imagenes_desarrollo/'.$user_on_line->id.'/'.$user_on_line->imagen_portada.'" class="img-responsive" style="margin-bottom: 0px;position:relative"><button class="tags" style="background:'.$background.';pointer-events:none;display:'.$display.';">'.$estatus.'</button></a>
						<div style="padding:20px;padding-bottom:0px;">
							<img src="'.base_url().'site-img/'.$icono.'" width="22">&nbsp;&nbsp;<span class="recuadroTituloPropiedad">'.$estatus.'</span><br><br>
							<p class="subtituloEntrada">'.$user_on_line->nombre_propiedad.'</p>
							<p class="preciosPropiedades" style="margin-top:12px;">'.$precio.'</p>
							<div class="descripcionIntro" style="margin-top:12px;">'.$user_on_line->descripcion_intro.'</div>
							<div class="descripcionIntro">'.$user_on_line->ubicacion.'</div>
							<div class="row" style="margin:0px;">
								<a href="#" data-toggle="modal" data-target="#modalDesarrollo" data-titulo="'.$user_on_line->nombre_propiedad.'" data-id="'.$user_on_line->id.'"><button class="meinteresa col-lg-6 col-xs-6 col-sm-6">ME INTERESA</button></a>
								<a href="'.base_url().'desarrollos/detalle_propiedad/'.$user_on_line->id.'"><button class="verPropiedad col-lg-6 col-xs-6 col-sm-6">VER PROPIEDAD&nbsp;&nbsp;<img src="'.base_url('site-img/property.svg').'" style="width:16px;position:relative;top:3px;"></button></a>
							</div>
						</div>
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
							Lo sentimos, no se encontraron propiedades relacionadas con los criterios de búsqueda.<br> Por favor contáctenos vía email: <a href="mailto:info@impetum.mx" style="font-weight: normal;font-size: 16px;color: black;" class="trabajaConNostros">info@impetum.mx</a> para poder asistirle de manera directa.
						</div>
						
					</div>  
					<div class="hidden-xs" style="width: 100%;height: 150px;"></div>
					<div class="visible-xs" style="width: 100%;height: 70px;"></div>';
		}
	}
	
	public function detalle_propiedad() {
		$id = $this->uri->segment(3);
		if($id == ''){
            redirect(''.base_url().'propiedades', 'location');
        }
        switch ($this->get_propiedad_info($id)[0]['tipo']) {
		    case 1:
		        $icono = 'preventa.svg';
		        $estatus = 'PREVENTA';
		        $precio = $this->get_propiedad_info($id)[0]['precio'];
		        break;
		    case 2:
		        $icono = 'vendido.svg';
		        $estatus = 'VENDIDO';
		        $precio = $estatus;
		        break;
		    case 3:
		        $icono = 'renta.svg';
		        $estatus = 'EN RENTA';
		        $precio = $this->get_propiedad_info($id)[0]['precio'];
		        break;
		    case 4:
		        $icono = 'venta.svg';
		        $estatus = 'EN VENTA';
		        $precio = $this->get_propiedad_info($id)[0]['precio'];
		        break;
		    case 5:
		        $icono = 'renta_y_venta.svg';
		        $estatus = 'EN RENTA & VENTA';
		        $precio = $this->get_propiedad_info($id)[0]['precio'];
		        break;
		}
		//Parametros del Tempalte               
        $vars['titulo'] = 'Detalle de propiedad';
        $vars['vista_contenido'] = 'view_detalle_desarrollo';
        //Parametros de la vista contenida
		$vars['nombre_propiedad'] = $this->get_propiedad_info($id)[0]['nombre_propiedad'];
		$vars['ubicacion'] = $this->get_propiedad_info($id)[0]['ubicacion'];
		$vars['portada'] = $this->get_propiedad_info($id)[0]['imagen_portada'];
		$vars['informacion'] = $this->get_propiedad_info($id)[0]['informacion'];
		$vars['informacion_secundaria'] = $this->get_propiedad_info($id)[0]['informacion_secundaria'];
		$vars['url_video'] = $this->get_propiedad_info($id)[0]['url_video'];
		$vars['url_360'] = $this->get_propiedad_info($id)[0]['url_360'];
		$vars['url_pdf'] = $this->get_propiedad_info($id)[0]['url_pdf'];
		$vars['url_maps'] = $this->get_propiedad_info($id)[0]['url_maps'];
		$vars['precio'] = $precio;
		$vars['icono'] = $icono;
		$vars['estatus'] = $estatus;
		$vars['id'] = $id;
        $this->load->view('template_white', $vars);
		
	}
	
	//Trae toda la info de una propiedad
    public function get_propiedad_info($id){
        $propiedad = $this->inicio_model->get_desarrollos_info($id);
        return $propiedad;
    }
    
    //Función para obtener las propiedades
    public function get_propiedades(){
	    $id = $this->input->post('id');
        $propiedades = $this->inicio_model->get_desarrollos_images($id);
        $pro = array();
        foreach($propiedades as $p){
	        $imagedata = getimagesize(base_url('imagenes_desarrollo/'.$id.'/').$p['nombre_imagen']);
            $pro[] = array('w' => $imagedata[0], 'h' => $imagedata[1], 'src' => base_url('imagenes_desarrollo/'.$id.'/').$p['nombre_imagen']);
        }
        $respuesta = array('success' => TRUE, 'propiedades' => $pro);
        respuesta_json($respuesta);
    }
    
    //Búsqueda de desarrollos
    function busqueda_desarrollos(){
		$users_online=$this->inicio_model->busqueda_desarrollos();
		if($users_online->num_rows()>0){
			$url = base_url();
			$useronline_html='';
			
			foreach($users_online->result() as $user_on_line){
				
				switch ($user_on_line->tipo) {
				    case 1:
				        $icono = 'preventa.svg';
				        $estatus = 'PREVENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'block';
				        break;
				    case 2:
				        $icono = 'vendido.svg';
				        $estatus = 'VENDIDO';
				        $precio = $estatus;
				        $background = 'rgb(217, 39, 65)';
				        $display = 'block';
				        break;
				    case 3:
				        $icono = 'renta.svg';
				        $estatus = 'EN RENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'none';
				        break;
				    case 4:
				        $icono = 'venta.svg';
				        $estatus = 'EN VENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'none';
				        break;
				    case 5:
				        $icono = 'renta_y_venta.svg';
				        $estatus = 'EN RENTA & VENTA';
				        $precio = $user_on_line->precio;
				        $background = 'rgb(51, 136, 107)';
				        $display = 'none';
				        break;
				}
				
				$useronline_html.='
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 entrada">
					<div style="border:1px solid rgb(216, 221, 228);">
						<a href="'.base_url().'desarrollos/detalle_propiedad/'.$user_on_line->id.'"><img src="'.base_url().'imagenes_desarrollo/'.$user_on_line->id.'/'.$user_on_line->imagen_portada.'" class="img-responsive" style="margin-bottom: 0px;position:relative"><button class="tags" style="background:'.$background.';pointer-events:none;display:'.$display.';">'.$estatus.'</button></a>
						<div style="padding:20px;padding-bottom:0px;">
							<img src="'.base_url().'site-img/'.$icono.'" width="22">&nbsp;&nbsp;<span class="recuadroTituloPropiedad">'.$estatus.'</span><br><br>
							<p class="subtituloEntrada">'.$user_on_line->nombre_propiedad.'</p>
							<p class="preciosPropiedades" style="margin-top:12px;">'.$precio.'</p>
							<div class="descripcionIntro" style="margin-top:12px;">'.$user_on_line->descripcion_intro.'</div>
							<div class="descripcionIntro">'.$user_on_line->ubicacion.'</div>
							<div class="row" style="margin:0px;">
								<a href="#" data-toggle="modal" data-target="#modalDesarrollo" data-titulo="'.$user_on_line->nombre_propiedad.'" data-id="'.$user_on_line->id.'"><button class="meinteresa col-lg-6 col-xs-6 col-sm-6">ME INTERESA</button></a>
								<a href="'.base_url().'desarrollos/detalle_propiedad/'.$user_on_line->id.'"><button class="verPropiedad col-lg-6 col-xs-6 col-sm-6">VER PROPIEDAD&nbsp;&nbsp;<img src="'.base_url('site-img/property.svg').'" style="width:16px;position:relative;top:3px;"></button></a>
							</div>
						</div>
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
							Lo sentimos, no se encontraron propiedades relacionadas con los criterios de búsqueda.<br> Por favor contáctenos vía email: <a href="mailto:info@impetum.mx" style="font-weight: normal;font-size: 16px;color: black;" class="trabajaConNostros">info@impetum.mx</a> para poder asistirle de manera directa.
						</div>
						
					</div>  
					<div class="hidden-xs" style="width: 100%;height: 150px;"></div>
					<div class="visible-xs" style="width: 100%;height: 70px;"></div>';
		}
	}

	
	//Correo para informes de propiedad
	public function enquire(){
		
    	$this->load->library('email');
		$fromemail="info@impetum.mx";
		$id = $this->input->post('id');
		$toemail = $this->input->post('email');
		$name = $this->input->post('name');
		$phone = $this->input->post('phone');
		$mensaje = $this->input->post('mensaje');
		
		$titulo = $this->get_propiedad_info($id)[0]['nombre_propiedad'];
		$portada = $this->get_propiedad_info($id)[0]['imagen_portada'];
		$descripcion_intro = $this->get_propiedad_info($id)[0]['descripcion_intro'];
		$precio = $this->get_propiedad_info($id)[0]['precio'];
		$ubicacion = $this->get_propiedad_info($id)[0]['ubicacion'];
		
		$subject = 'Informes de la propiedad: '.$titulo.'';
		$list = ('info@impetum.mx');
		$url = base_url();
		$data['url'] = $url;
		$data['email'] = $toemail;
		$data['id'] = $id;
		$data['name'] = $name;
		$data['phone'] = $phone;
		$data['mensaje'] = $mensaje;
		$data['titulo'] = $titulo;
		$data['portada'] = $portada;
		$data['descripcion_intro'] = $descripcion_intro;
		$data['precio'] = $precio;
		$data['ubicacion'] = $ubicacion;
		
		$email = $this->load->view('email_desarrollo', $data, TRUE);
		
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
