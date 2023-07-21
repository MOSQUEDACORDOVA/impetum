<?php
class Inicio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inicio_model');
    }

    public function index()
    {
        //Parametros del Tempalte
        $vars['titulo']          = 'Inicio';
        $vars['vista_contenido'] = 'view_inicio';
        $this->load->view('template', $vars);
    }
    
    function show_propiedades(){
		$users_online=$this->inicio_model->show_propiedades();

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
						<a href="'.base_url().'propiedades/detalle_propiedad/'.$user_on_line->id.'"><img src="'.base_url().'imagenes_propiedad/'.$user_on_line->id.'/'.$user_on_line->imagen_portada.'" class="img-responsive" style="margin-bottom: 0px;position:relative;"><button class="tags" style="background:'.$background.';pointer-events:none;display:'.$display.';">'.$estatus.'</button></a>
						<div style="padding:20px;padding-bottom:0px;">
							<img src="'.base_url().'site-img/'.$icono.'" width="22">&nbsp;&nbsp;<span class="recuadroTituloPropiedad">'.$estatus.'</span><br><br>
							<p class="subtituloEntrada">'.$user_on_line->nombre_propiedad.'</p>
							<p class="preciosPropiedades" style="margin-top:12px;">'.$precio.'</p>
							<div class="descripcionIntro" style="margin-top:12px;">'.$user_on_line->descripcion_intro.'</div>
							<div class="descripcionIntro">'.$user_on_line->ubicacion.'</div>
							<div class="row" style="margin:0px;">
								<a href="#" data-toggle="modal" data-target="#modalPropiedad" data-titulo="'.$user_on_line->nombre_propiedad.'" data-id="'.$user_on_line->id.'"><button class="meinteresa col-lg-6 col-xs-6 col-sm-6">ME INTERESA</button></a>
								<a href="'.base_url().'propiedades/detalle_propiedad/'.$user_on_line->id.'"><button class="verPropiedad col-lg-6 col-xs-6 col-sm-6">VER PROPIEDAD&nbsp;&nbsp;<img src="'.base_url('site-img/property.svg').'" style="width:16px;position:relative;top:3px;"></button></a>
							</div>
						</div>
					</div>
				</div>';
			}
			$result=$useronline_html;
			echo $result;
		}
	}
    
    function show_desarrollos(){
		$users_online=$this->inicio_model->show_desarrollos();

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
	
}
