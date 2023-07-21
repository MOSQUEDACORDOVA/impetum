<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Admin_model', 'mAdmin');
        $this->load->helper('json');
    }

    public function index(){
	    if (!$this->session->userdata('logged_in')) {
            redirect(base_url('login'));
        }
        $this->load->view('admin_view');
    }

    public function insertar_propiedad(){
        $respuesta = $this->mAdmin->insertar_propiedad();
        $this->output->set_content_type('application/json')->set_output(json_encode($respuesta));
    }
    
    public function insertar_desarrollo(){
        $respuesta = $this->mAdmin->insertar_desarrollo();
        $this->output->set_content_type('application/json')->set_output(json_encode($respuesta));
    }

    public function actualizar_propiedad(){
        $respuesta = $this->mAdmin->actualizar_propiedad();
        $this->output->set_content_type('application/json')->set_output(json_encode($respuesta));
    }
    
    public function actualizar_desarrollo(){
        $respuesta = $this->mAdmin->actualizar_desarrollo();
        $this->output->set_content_type('application/json')->set_output(json_encode($respuesta));
    }

    public function subir_galeria(){
        $respuesta = $this->mAdmin->subir_galeria();
        $this->output->set_content_type('application/json')->set_output(json_encode($respuesta));
    }
    
    public function subir_galeria_desarrollo(){
        $respuesta = $this->mAdmin->subir_galeria_desarrollo();
        $this->output->set_content_type('application/json')->set_output(json_encode($respuesta));
    }

    public function propiedades(){
		$data = array();
		        
        //$data['marcas'] = '';
        $data['propiedades'] = '';
       
        
        if($propiedades = $this->get_catalogo_propiedades()){
            $data['propiedades'] = $propiedades;
        }
        $this->load->view('propiedades_view', $data);
    }
    
    public function desarrollos(){
		$data = array();
		        
        //$data['marcas'] = '';
        $data['desarrollos'] = '';
       
        
        if($desarrollos = $this->get_catalogo_desarrollos()){
            $data['desarrollos'] = $desarrollos;
        }
        $this->load->view('desarrollos_view', $data);
    }

    public function get_catalogo_propiedades($json=0){
        if( $propiedades = $this->mAdmin->get_catalogo_propiedades() ){
            $html = $this->lista_propiedades_html($propiedades);
        }else{
            return FALSE;
        }
        if($json){
            $array_respuesta = array('html' => $html);
            $this->output->set_content_type('application/json')->set_output(json_encode($array_respuesta));
            return TRUE;
        }
        return $html;
    }
    
    public function get_catalogo_desarrollos($json=0){
        if( $propiedades = $this->mAdmin->get_catalogo_desarrollos() ){
            $html = $this->lista_desarrollos_html($propiedades);
        }else{
            return FALSE;
        }
        if($json){
            $array_respuesta = array('html' => $html);
            $this->output->set_content_type('application/json')->set_output(json_encode($array_respuesta));
            return TRUE;
        }
        return $html;
    }

    public function busqueda_propiedades(){
        $array_respuesta = array('success' => FALSE, 'msg' => 'No se encontraron registros');
        if( $propiedades = $this->mAdmin->busqueda_propiedades() ){
            $html = $this->lista_propiedades_html($propiedades);
            $array_respuesta = array('success' => TRUE, 'html' => $html);
            $this->output->set_content_type('application/json')->set_output(json_encode($array_respuesta));
        }else{
            $this->output->set_content_type('application/json')->set_output(json_encode($array_respuesta));
        }
    }
    
    public function busqueda_desarrollos(){
        $array_respuesta = array('success' => FALSE, 'msg' => 'No se encontraron registros');
        if( $propiedades = $this->mAdmin->busqueda_desarrollos() ){
            $html = $this->lista_desarrollos_html($propiedades);
            $array_respuesta = array('success' => TRUE, 'html' => $html);
            $this->output->set_content_type('application/json')->set_output(json_encode($array_respuesta));
        }else{
            $this->output->set_content_type('application/json')->set_output(json_encode($array_respuesta));
        }
    }

    public function get_propiedad(){
        $array_respuesta = array('success' => FALSE, 'msg' => 'No se encontró información de esta propiedad');
        if( $propiedad = $this->mAdmin->get_propiedad() ){
            $array_respuesta = array('success' => TRUE, 'propiedad' => $propiedad);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($array_respuesta));
    }
    
    public function get_desarrollo(){
        $array_respuesta = array('success' => FALSE, 'msg' => 'No se encontró información de este desarrollo');
        if( $propiedad = $this->mAdmin->get_desarrollo() ){
            $array_respuesta = array('success' => TRUE, 'propiedad' => $propiedad);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($array_respuesta));
    }

    public function get_galeria_propiedad(){
        $respuesta = array();
        if($imagenes = $this->mAdmin->get_galeria_propiedad()){
            $html = $this->galeria_html($imagenes);
            $respuesta['html'] = $html;
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($respuesta));
    }
    
    public function get_galeria_desarrollo(){
        $respuesta = array();
        if($imagenes = $this->mAdmin->get_galeria_desarrollo()){
            $html = $this->galeria_html_d($imagenes);
            $respuesta['html'] = $html;
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($respuesta));
    }

    public function lista_propiedades_html($arreglo_autos){
        $collection_html = '';
        $html = "<li class='collection-item custom-item' data-id='%s' data-id_propiedad='%s'>
            <div class='row'>
                <div class='col s2'>
                    <img src='imagenes_propiedad/%s/%s'>
                </div>
                <div class='col s7'>
                    <span style='font-family:\"Montserrat\";font-size:18px;color:rgb(0,0,0);'>%s %s</span><br>
                    <p style=\"line-height:22px;font-family:'Maven Pro';font-size:16px;color:rgb(0,0,0);\">
                        %s<span style=\"color:rgb(169, 169, 169);\">|&nbsp;&nbsp; %s</span>
                    </p>
                </div>
                <div class=\"col s3\">
                    <a onClick=\"editarPropiedad(%s)\" class=\"waves-effect waves-light btn\"><i class=\"material-icons center-align\">mode_edit</i></a>
                    <a onClick=\"subirGaleria(%s)\" class=\"waves-effect waves-light btn orange\"><i class=\"material-icons center-align\">add_a_photo</i></a>
                    <a onClick=\"eliminarPropiedad(%s)\"class=\"waves-effect waves-light btn red\"><i class=\"material-icons center-align\">delete_forever</i></a>
                </div>
        </li>";
        foreach($arreglo_autos as $a){
	        if($a['precio'] == 'VENDIDO'){
	            $precio = '<b style="color:red;">VENDIDO</b> &nbsp;&nbsp;';
            }else{
	            $precio = 'Precio: '.$a['precio'].' &nbsp;&nbsp;';
            }
            $collection_html.=sprintf($html,$a['id'],$a['id'],$a['id'],$a['imagen_portada'],
                                    $a['nombre_propiedad'], $a['ubicacion'],$precio, $a['estado'],
                                    $a['id'],$a['id'],$a['id']);
        }

        return $collection_html;
    }
    
    public function lista_desarrollos_html($arreglo_autos){
        $collection_html = '';
        $html = "<li class='collection-item custom-item' data-id='%s' data-id_propiedad='%s'>
            <div class='row'>
                <div class='col s2'>
                    <img src='imagenes_desarrollo/%s/%s'>
                </div>
                <div class='col s7'>
                    <span style='font-family:\"Montserrat\";font-size:18px;color:rgb(0,0,0);'>%s %s</span><br>
                    <p style=\"line-height:22px;font-family:'Maven Pro';font-size:16px;color:rgb(0,0,0);\">
                        %s<span style=\"color:rgb(169, 169, 169);\">|&nbsp;&nbsp; %s</span>
                    </p>
                </div>
                <div class=\"col s3\">
                    <a onClick=\"editarPropiedad(%s)\" class=\"waves-effect waves-light btn\"><i class=\"material-icons center-align\">mode_edit</i></a>
                    <a onClick=\"subirGaleria(%s)\" class=\"waves-effect waves-light btn orange\"><i class=\"material-icons center-align\">add_a_photo</i></a>
                    <a onClick=\"eliminarPropiedad(%s)\"class=\"waves-effect waves-light btn red\"><i class=\"material-icons center-align\">delete_forever</i></a>
                </div>
        </li>";
        foreach($arreglo_autos as $a){
	        if($a['precio'] == 'VENDIDO'){
	            $precio = '<b style="color:red;">VENDIDO</b> &nbsp;&nbsp;';
            }else{
	            $precio = 'Precio: '.$a['precio'].' &nbsp;&nbsp;';
            }
            $collection_html.=sprintf($html,$a['id'],$a['id'],$a['id'],$a['imagen_portada'],
                                    $a['nombre_propiedad'], $a['ubicacion'],$precio, $a['estado'],
                                    $a['id'],$a['id'],$a['id']);
        }

        return $collection_html;
    }
    
    public function galeria_html($arreglo_imagenes){
        $imagenes_hmtl = '';
        $html = '<li data-id="%s" data-id_imagen="%s" class="item"><div class="col s10">
                    <img src="%s" /></div>
                <div class="col s2"><i class="js-remove material-icons">close</i></div>
        </li>';
        foreach($arreglo_imagenes as $i){
            $id_propiedad = $i['id_propiedad'];
            $nombre_imagen = $i['nombre_imagen'];
            $path = "imagenes_propiedad/$id_propiedad/$nombre_imagen";
            $imagenes_hmtl.=sprintf($html, $i['id'], $i['id'], $path);
        }
        return $imagenes_hmtl;
    }
    
    public function galeria_html_d($arreglo_imagenes){
        $imagenes_hmtl = '';
        $html = '<li data-id="%s" data-id_imagen="%s" class="item"><div class="col s10">
                    <img src="%s" /></div>
                <div class="col s2"><i class="js-remove material-icons">close</i></div>
        </li>';
        foreach($arreglo_imagenes as $i){
            $id_propiedad = $i['id_desarrollo'];
            $nombre_imagen = $i['nombre_imagen'];
            $path = "imagenes_desarrollo/$id_propiedad/$nombre_imagen";
            $imagenes_hmtl.=sprintf($html, $i['id'], $i['id'], $path);
        }
        return $imagenes_hmtl;
    }
    
    public function eliminar_foto(){
        $respuesta = $this->mAdmin->eliminar_foto();
        $resp = array('success' => $respuesta);
        $this->output->set_content_type('application/json')->set_output(json_encode($resp));
    }
    
    public function eliminar_foto_desarrollo(){
        $respuesta = $this->mAdmin->eliminar_foto_desarrollo();
        $resp = array('success' => $respuesta);
        $this->output->set_content_type('application/json')->set_output(json_encode($resp));
    }
    
    public function actualizar_prioridad_imagen(){
        $orden = $this->input->post('posiciones');
        $orden = $this->security->xss_clean($orden);
        $orden = json_decode($orden, TRUE);
        $respuesta = array('success' => FALSE, 'msg' => 'Ocurrio un error, intente de nuevo');
        $arreglo_prioridades = array();
        //Le enviamos el orden
        $prioridad = 1;
        if($orden){
            foreach($orden as $o){
                $arreglo_prioridades[] = array('id' => $o, 'prioridad' => $prioridad);
                $prioridad++;
            }
            $respuesta = $this->mAdmin->actualizar_prioridad_imagen($arreglo_prioridades);
        }

        respuesta_json($respuesta);
    }
    
    public function actualizar_prioridad_imagen_desarrollo(){
        $orden = $this->input->post('posiciones');
        $orden = $this->security->xss_clean($orden);
        $orden = json_decode($orden, TRUE);
        $respuesta = array('success' => FALSE, 'msg' => 'Ocurrio un error, intente de nuevo');
        $arreglo_prioridades = array();
        //Le enviamos el orden
        $prioridad = 1;
        if($orden){
            foreach($orden as $o){
                $arreglo_prioridades[] = array('id' => $o, 'prioridad' => $prioridad);
                $prioridad++;
            }
            $respuesta = $this->mAdmin->actualizar_prioridad_imagen_desarrollo($arreglo_prioridades);
        }

        respuesta_json($respuesta);
    }

    //Función para actualizar la prioridad de las propiedades
    public function actualizar_prioridad_propiedad(){
        $orden = $this->input->post('posiciones');
        $orden = $this->security->xss_clean($orden);
        $orden = json_decode($orden, TRUE);
        $respuesta = array('success' => FALSE, 'msg' => 'Ocurrio un error, intente de nuevo');
        $arreglo_prioridades = array();
        //Le enviamos el orden
        $prioridad = 1;
        if($orden){
            foreach($orden as $o){
                $arreglo_prioridades[] = array('id' => $o, 'prioridad' => $prioridad);
                $prioridad++;
            }
            $respuesta = $this->mAdmin->actualizar_prioridad_propiedad($arreglo_prioridades);
        }

        respuesta_json($respuesta);
    }
    
    //Función para actualizar la prioridad de los desarrollos
    public function actualizar_prioridad_desarrollo(){
        $orden = $this->input->post('posiciones');
        $orden = $this->security->xss_clean($orden);
        $orden = json_decode($orden, TRUE);
        $respuesta = array('success' => FALSE, 'msg' => 'Ocurrio un error, intente de nuevo');
        $arreglo_prioridades = array();
        //Le enviamos el orden
        $prioridad = 1;
        if($orden){
            foreach($orden as $o){
                $arreglo_prioridades[] = array('id' => $o, 'prioridad' => $prioridad);
                $prioridad++;
            }
            $respuesta = $this->mAdmin->actualizar_prioridad_desarrollo($arreglo_prioridades);
        }

        respuesta_json($respuesta);
    }

    public function eliminar_propiedad(){
        $respuesta = $this->mAdmin->eliminar_propiedad();
        $this->output->set_content_type('application/json')->set_output(json_encode($respuesta));
    }
    
    public function eliminar_desarrollo(){
        $respuesta = $this->mAdmin->eliminar_desarrollo();
        $this->output->set_content_type('application/json')->set_output(json_encode($respuesta));
    }

    /* MODULO DE AGENTES */

    public function agentes(){
        $data['agentes'] = '';
        if($agentes = $this->mAdmin->get_agentes()){
            $html = $this->html_agentes($agentes);
            $data['agentes'] = $html;
        }
        $this->load->view('agentes_view',$data);
    }

    public function get_agentes($json=0){
        if( $agentes = $this->mAdmin->get_agentes() ){
            $html = $this->html_agentes($agentes);
        }else{
            return FALSE;
        }
        if($json){
            $array_respuesta = array('html' => $html);
            $this->output->set_content_type('application/json')->set_output(json_encode($array_respuesta));
            return TRUE;
        }
        return $html;
    }

    public function html_agentes($array_noticias){
        $agentes_html = '';
        $html_card = '<div class="col s12 m4" data-id="%s">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="imagenes_agente/%s">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">%s<i class="material-icons right">more_vert</i></span>
                </div>
                <div class="card-action">
                    <a class="blue-text" href="#" onClick="modificarAgente(%s)">Modificar</a>
                    <a class="red-text" href="#" onClick="eliminarAgente(%s)">Eliminar</a>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>%s</span>
                    <p>%s <br />%s</p>
                </div>
            </div>
        </div>';
        foreach($array_noticias as $n){
            extract($n);
            $agentes_html.=sprintf($html_card,$id,$imagen_portada,substr($nombre,0,10)."...",$id,$id,$nombre,$email,$telefono);
        }
        return $agentes_html;
    }

    public function insertar_agente(){
        $respuesta = $this->mAdmin->insertar_agente();
        $this->output->set_content_type('application/json')->set_output(json_encode($respuesta));
    }

    public function modificar_agente(){
        $respuesta = $this->mAdmin->modificar_agente();
        $this->output->set_content_type('application/json')->set_output(json_encode($respuesta));
    }

    public function eliminar_agente(){
        $respuesta = $this->mAdmin->eliminar_agente();
        $this->output->set_content_type('application/json')->set_output(json_encode($respuesta));
    }

    public function get_agente(){
        $array_respuesta = array('success' => FALSE, 'msg' => 'No se encontró información');
        if( $agente = $this->mAdmin->get_agente() ){
            $array_respuesta = array('success' => TRUE, 'agente' => $agente);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($array_respuesta));
    }


}
