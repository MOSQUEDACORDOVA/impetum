<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function insertar_propiedad(){
        $this->load->helper('validacion');
        $datos = $this->input->post();
        //print_r($datos);
        extract($datos);
        if(empty($_FILES)) {
            return array('success' => FALSE, 'msg' => 'Debes de seleccionar una imágen de portada para esta propiedad');
        }
        if( !isset($estado) || !isset($ubicacion) || !isset($tipo)){
            return array('success' => FALSE, 'msg' => 'Los datos marcados con * son obligatorios');
        }
        if(validar_vacios($nombre_propiedad) === FALSE){
            return array('success' => FALSE, 'msg' => 'Los datos marcados con * son obligatorios');
        }
        $old_name = $_FILES['imagen']['name'];
        $ext = pathinfo($old_name, PATHINFO_EXTENSION);
        $new_name = uniqid().".$ext";
        //Aqui van validaciones de los campos requeridos
        $this->db->select('IFNULL( MAX(prioridad),0)+1 AS p', FALSE)->from('propiedades');
        $result = $this->db->get();
        $prioridad = $result->first_row('array');
        $datos['prioridad'] = $prioridad['p'];
        $datos['imagen_portada'] = $new_name;
        unset($datos['id_propiedad']);
        $this->db->trans_begin();

            $this->db->insert('propiedades', $datos);
            $id_propiedad = $this->db->insert_id();
            $subir_imagen = $this->subir_imagen_propiedad('imagen', $id_propiedad, $new_name);
            if($subir_imagen === FALSE){
                $this->db->trans_rollback();
                return array('success' => FALSE, 'msg' => 'La imagen que seleccionaste debe de ser jpg/bmp/png y no pesar más de 5MB');
            }
          
        if( $this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return array('success' => FALSE, 'msg' => 'Ocurrió un error en la base de datos');
        }else{
            $this->db->trans_commit();
            return array('success' => TRUE, 'msg' => 'Todo bien');
        }
    }
    
    public function insertar_desarrollo(){
        $this->load->helper('validacion');
        $datos = $this->input->post();
        //print_r($datos);
        extract($datos);
        if(empty($_FILES)) {
            return array('success' => FALSE, 'msg' => 'Debes de seleccionar una imágen de portada para este desarrollo');
        }
        if( !isset($estado) || !isset($ubicacion) || !isset($tipo)){
            return array('success' => FALSE, 'msg' => 'Los datos marcados con * son obligatorios');
        }
        if(validar_vacios($nombre_propiedad) === FALSE){
            return array('success' => FALSE, 'msg' => 'Los datos marcados con * son obligatorios');
        }
        $old_name = $_FILES['imagen']['name'];
        $ext = pathinfo($old_name, PATHINFO_EXTENSION);
        $new_name = uniqid().".$ext";
        //Aqui van validaciones de los campos requeridos
        $this->db->select('IFNULL( MAX(prioridad),0)+1 AS p', FALSE)->from('desarrollos');
        $result = $this->db->get();
        $prioridad = $result->first_row('array');
        $datos['prioridad'] = $prioridad['p'];
        $datos['imagen_portada'] = $new_name;
        unset($datos['id_propiedad']);
        $this->db->trans_begin();

            $this->db->insert('desarrollos', $datos);
            $id_propiedad = $this->db->insert_id();
            $subir_imagen = $this->subir_imagen_desarrollo('imagen', $id_propiedad, $new_name);
            if($subir_imagen === FALSE){
                $this->db->trans_rollback();
                return array('success' => FALSE, 'msg' => 'La imagen que seleccionaste debe de ser jpg/bmp/png y no pesar más de 5MB');
            }
          
        if( $this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return array('success' => FALSE, 'msg' => 'Ocurrió un error en la base de datos');
        }else{
            $this->db->trans_commit();
            return array('success' => TRUE, 'msg' => 'Todo bien');
        }
    }

    public function get_marcas(){
        $this->db->select('id_marca,nombre')->from('catalogo_marcas')->order_by('nombre', 'asc');
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }

    public function get_estados(){
        $this->db->select('id_estado,estado')->from('catalogo_estados')->order_by('id_estado', 'asc');
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }

    public function get_tipos(){
        $this->db->select('id_tipo,tipo')->from('catalogo_tipos')->order_by('id_tipo', 'asc');
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }

    public function get_catalogo_propiedades(){
        $this->db->select('p.id,p.nombre_propiedad,IF(p.tipo = 2, "VENDIDO", p.precio) AS precio,p.ubicacion,p.descripcion_intro,p.tipo,p.prioridad, p.imagen_portada,p.estado')->from('propiedades p');
        $this->db->group_by('p.id');
        $this->db->order_by('p.prioridad', 'asc');
        $result = $this->db->get();

        return ($result->num_rows() > 0 ? $result->result_array() : FALSE);
    }
    
    public function get_catalogo_desarrollos(){
        $this->db->select('p.id,p.nombre_propiedad,IF(p.tipo = 2, "VENDIDO", p.precio) AS precio,p.ubicacion,p.descripcion_intro,p.tipo,p.prioridad, p.imagen_portada,p.estado')->from('desarrollos p');
        $this->db->group_by('p.id');
        $this->db->order_by('p.prioridad', 'asc');
        $result = $this->db->get();

        return ($result->num_rows() > 0 ? $result->result_array() : FALSE);
    }

    public function busqueda_propiedades(){
        $busqueda = $this->input->post('search');
        $this->db->select('p.id,p.nombre_propiedad,IF(p.tipo = 2, "VENDIDO", p.precio) AS precio,p.ubicacion,p.descripcion_intro,p.tipo,p.prioridad, p.imagen_portada,p.estado');
        $this->db->from('propiedades p');
        $this->db->group_by('p.id');
        $this->db->having('nombre_propiedad LIKE', "%$busqueda%");
        $result = $this->db->get();
        return ($result->num_rows() > 0 ? $result->result_array() : FALSE);

    }
    
    public function busqueda_desarrollos(){
        $busqueda = $this->input->post('search');
        $this->db->select('p.id,p.nombre_propiedad,IF(p.tipo = 2, "VENDIDO", p.precio) AS precio,p.ubicacion,p.descripcion_intro,p.tipo,p.prioridad, p.imagen_portada,p.estado');
        $this->db->from('desarrollos p');
        $this->db->group_by('p.id');
        $this->db->having('nombre_propiedad LIKE', "%$busqueda%");
        $result = $this->db->get();
        return ($result->num_rows() > 0 ? $result->result_array() : FALSE);

    }

    //AÑO DESCENDENTE, MAYOR MENOR PRECIO, KMS ASC, MARCA ALFABETICO, BANDERAS DE TIPO
    public function get_catalogo_filtros(){
        $filtro = $this->input->post('filtro');
        $seccion = $this->input->post('seccion');
        $tipos = array('SPORT','SEDAN','SUV', 'COUPE', 'CABRIO', 'HIBRIDO', 'ELECTRICO');
        $estados = array('', 'NUEVO', 'PREOWNED', 'BLINDADO');
        //Consulta
        $this->db->select('a.id_auto,a.modelo,IF(a.disponibilidad = 2, "VENDIDO", a.precio) AS precio,a.kms,a.anio,a.disponibilidad,a.prioridad,
        a.descripcion,cm.id_marca,cm.nombre AS marca,GROUP_CONCAT(DISTINCT ce.estado SEPARATOR "  |  ") AS estados,
        GROUP_CONCAT(DISTINCT ct.tipo) AS tipos, a.imagen_portada, IF(a.precio like "%USD%", STRIP_NON_DIGIT(a.precio)*20, STRIP_NON_DIGIT(a.precio)) AS precio_ajustado', FALSE);
        $this->db->from('autos a');
        $this->db->join('auto_estados ae', 'ae.id_auto = a.id_auto');
        $this->db->join('auto_tipos at', 'at.id_auto = a.id_auto');
        $this->db->join('catalogo_marcas cm', 'a.id_marca = cm.id_marca');
        $this->db->join('catalogo_estados ce', 'ce.id_estado = ae.id_estado');
        $this->db->join('catalogo_tipos ct', 'ct.id_tipo = at.id_tipo');
        $this->db->where('a.disponibilidad <>', 0);
        $this->db->group_by('a.id_auto');
        if( in_array(strtoupper($filtro), $estados) ){
            $filtro = "%$filtro%";
            $this->db->having('estados LIKE', strtoupper($filtro) );
        }
        if($seccion){
            $filtro_estado = $estados[$seccion];
            $this->db->having('estados LIKE', "%$filtro_estado%");
        }
        if( in_array(strtoupper($filtro), $tipos) ){
            $filtro = "%$filtro%";
            $this->db->having('tipos LIKE', strtoupper($filtro) );
        }

        switch($filtro){
            case 'año':
                $this->db->order_by('a.anio', 'desc');
                break;
            case 'mayor':
                $this->db->order_by('a.disponibilidad', 'asc');
                $this->db->order_by('CAST(precio_ajustado AS SIGNED)', 'desc');
                break;
            case 'menor':
                $this->db->order_by('a.disponibilidad', 'asc');
                $this->db->order_by('CAST(precio_ajustado AS SIGNED)', 'asc');
                break;
            case 'kms':
                $this->db->order_by('a.kms', 'asc');
                break;
            case 'marca':
                $this->db->order_by('cm.nombre', 'asc');
                break;
            case 'fecha':
                $this->db->order_by('a.fecha', 'desc');
                break;
            case 'id':
                $this->db->order_by('a.id_auto', 'desc');
                break;
            default:
                $this->db->order_by('a.prioridad', 'asc');

        }
        $result = $this->db->get();
        return ($result->num_rows() > 0 ? $result->result_array() : FALSE);
    }

    public function get_propiedad(){
        $id_propiedad = $this->input->post('id_propiedad');
        $this->db->select('*');
        $this->db->from('propiedades p');
        $this->db->where('p.id', $id_propiedad);
        $this->db->group_by('p.id');
        $this->db->limit(1);

        $result = $this->db->get();
        return ($result->num_rows() > 0 ) ? $result->first_row('array') : FALSE;
    }

	public function get_desarrollo(){
        $id_propiedad = $this->input->post('id_propiedad');
        $this->db->select('*');
        $this->db->from('desarrollos p');
        $this->db->where('p.id', $id_propiedad);
        $this->db->group_by('p.id');
        $this->db->limit(1);

        $result = $this->db->get();
        return ($result->num_rows() > 0 ) ? $result->first_row('array') : FALSE;
    }

    public function actualizar_prioridad_imagen($arreglo_prioridades){
        $update = $this->db->update_batch('propiedades_imagenes', $arreglo_prioridades, 'id');
        $success = ($update) ? TRUE : FALSE;
        $msg = ($success) ? 'Actualizado con exito' : 'Error al actualizar orden de propiedades';
        return array('success' => $success, 'msg' => $msg);
    }
    
    public function actualizar_prioridad_imagen_desarrollo($arreglo_prioridades){
        $update = $this->db->update_batch('desarrollos_imagenes', $arreglo_prioridades, 'id');
        $success = ($update) ? TRUE : FALSE;
        $msg = ($success) ? 'Actualizado con exito' : 'Error al actualizar orden de propiedades';
        return array('success' => $success, 'msg' => $msg);
    }

    public function actualizar_prioridad_propiedad($arreglo_prioridades){
        $update = $this->db->update_batch('propiedades', $arreglo_prioridades, 'id');
        $success = ($update) ? TRUE : FALSE;
        $msg = ($success) ? 'Actualizado con exito' : 'Error al actualizar orden de propiedades';
        return array('success' => $success, 'msg' => $msg);
    }
    
    public function actualizar_prioridad_desarrollo($arreglo_prioridades){
        $update = $this->db->update_batch('desarrollos', $arreglo_prioridades, 'id');
        $success = ($update) ? TRUE : FALSE;
        $msg = ($success) ? 'Actualizado con exito' : 'Error al actualizar orden de propiedades';
        return array('success' => $success, 'msg' => $msg);
    }

    public function subir_imagen_propiedad($campo, $id_auto, $file_name){
        $config['upload_path'] = "imagenes_propiedad/$id_auto";
        if(!is_dir('imagenes_propiedad/'.$id_auto))
		{
		   mkdir('imagenes_propiedad/'.$id_auto,0777);
		}
        $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
        $config['max_size'] = 5198;
        $config['file_name'] = $file_name;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload($campo)){
            $error = array('error' => $this->upload->display_errors());
            echo $this->upload->display_errors();
            //$this->load->view('upload_form', $error);
            return FALSE;
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            //$this->load->view('upload_success', $data);
            return array(TRUE, $this->upload->data('file_name'));
        }
    }
    
    public function subir_imagen_desarrollo($campo, $id_auto, $file_name){
        $config['upload_path'] = "imagenes_desarrollo/$id_auto";
        if(!is_dir('imagenes_desarrollo/'.$id_auto))
		{
		   mkdir('imagenes_desarrollo/'.$id_auto,0777);
		}
        $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
        $config['max_size'] = 5198;
        $config['file_name'] = $file_name;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload($campo)){
            $error = array('error' => $this->upload->display_errors());
            echo $this->upload->display_errors();
            //$this->load->view('upload_form', $error);
            return FALSE;
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            //$this->load->view('upload_success', $data);
            return array(TRUE, $this->upload->data('file_name'));
        }
    }

    public function eliminar_propiedad(){
        $this->load->helper('file');
        $id_propiedad = $this->input->post('id_propiedad');
        $this->db->trans_start();
            $this->db->delete('propiedades', array('id' => $id_propiedad));
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE){
            return array('success' => FALSE, 'msg' => 'Ocurrió un error al eliminar');
        }else{
            $path = "imagenes_propiedad/$id_propiedad";
            try{
                delete_files($path);
                rmdir($path);
            }catch(Exception $e){
                return array('success' => TRUE, 'msg' => 'Se eliminó correctamente, pero no se eliminaron las imagenes');
            }
            return array('success' => TRUE, 'msg' => 'Se eliminó correctamente');
        }

    }
    
    public function eliminar_desarrollo(){
        $this->load->helper('file');
        $id_propiedad = $this->input->post('id_desarrollo');
        $this->db->trans_start();
            $this->db->delete('desarrollos', array('id' => $id_propiedad));
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE){
            return array('success' => FALSE, 'msg' => 'Ocurrió un error al eliminar');
        }else{
            $path = "imagenes_desarrollo/$id_propiedad";
            try{
                delete_files($path);
                rmdir($path);
            }catch(Exception $e){
                return array('success' => TRUE, 'msg' => 'Se eliminó correctamente, pero no se eliminaron las imagenes');
            }
            return array('success' => TRUE, 'msg' => 'Se eliminó correctamente');
        }

    }

    public function actualizar_propiedad(){
        $this->load->helper('validacion');
        $datos = $this->input->post();
        //$datos = array_filter($datos);
        $id_propiedad = $datos['id'];
        if(!empty($_FILES)) {
            $this->db->select('imagen_portada')->from('propiedades')->where('id', $id_propiedad)->limit(1);
            $result = $this->db->get();
            $imagen = ($result->num_rows() > 0 ) ? $result->first_row('array') : FALSE;
            $imagen_portada = $imagen['imagen_portada'];
            $path_anterior = "imagenes_propiedad/$id_propiedad/$imagen_portada";
            @unlink($path_anterior);
            $old_name = $_FILES['imagen']['name'];
            $ext = pathinfo($old_name, PATHINFO_EXTENSION);
            $new_name = uniqid().".$ext";
            $datos['imagen_portada'] = $new_name;
            $subir_imagen = $this->subir_imagen_propiedad('imagen', $id_propiedad, $new_name);
            if($subir_imagen === FALSE){
                return array('success' => FALSE, 'msg' => 'La imagen que seleccionaste debe de ser jpg/bmp/png y no pesar más de 5MB');
            }
        }
        unset($datos['imagen']);
        //Aqui van validaciones de los campos requeridos
        extract($datos);

        if( !isset($estado) || !isset($ubicacion) || !isset($tipo)){
            return array('success' => FALSE, 'msg' => 'Los datos marcados con * son obligatorios');
        }
        if(validar_vacios($nombre_propiedad) === FALSE){
            return array('success' => FALSE, 'msg' => 'Los datos marcados con * son obligatorios');
        }

        unset($datos['id']);
        $this->db->trans_begin();

            $this->db->update('propiedades', $datos, array('id' => $id_propiedad));

        if( $this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return array('success' => FALSE, 'msg' => 'Ocurrió un error en la base de datos');
        }else{
            $this->db->trans_commit();
            return array('success' => TRUE, 'msg' => 'Todo bien');

        }
    }
    
    public function actualizar_desarrollo(){
        $this->load->helper('validacion');
        $datos = $this->input->post();
        //$datos = array_filter($datos);
        $id_propiedad = $datos['id'];
        if(!empty($_FILES)) {
            $this->db->select('imagen_portada')->from('desarrollos')->where('id', $id_propiedad)->limit(1);
            $result = $this->db->get();
            $imagen = ($result->num_rows() > 0 ) ? $result->first_row('array') : FALSE;
            $imagen_portada = $imagen['imagen_portada'];
            $path_anterior = "imagenes_desarrollo/$id_propiedad/$imagen_portada";
            @unlink($path_anterior);
            $old_name = $_FILES['imagen']['name'];
            $ext = pathinfo($old_name, PATHINFO_EXTENSION);
            $new_name = uniqid().".$ext";
            $datos['imagen_portada'] = $new_name;
            $subir_imagen = $this->subir_imagen_desarrollo('imagen', $id_propiedad, $new_name);
            if($subir_imagen === FALSE){
                return array('success' => FALSE, 'msg' => 'La imagen que seleccionaste debe de ser jpg/bmp/png y no pesar más de 5MB');
            }
        }
        unset($datos['imagen']);
        //Aqui van validaciones de los campos requeridos
        extract($datos);

        if( !isset($estado) || !isset($ubicacion) || !isset($tipo)){
            return array('success' => FALSE, 'msg' => 'Los datos marcados con * son obligatorios');
        }
        if(validar_vacios($nombre_propiedad) === FALSE){
            return array('success' => FALSE, 'msg' => 'Los datos marcados con * son obligatorios');
        }

        unset($datos['id']);
        $this->db->trans_begin();

            $this->db->update('desarrollos', $datos, array('id' => $id_propiedad));

        if( $this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return array('success' => FALSE, 'msg' => 'Ocurrió un error en la base de datos');
        }else{
            $this->db->trans_commit();
            return array('success' => TRUE, 'msg' => 'Todo bien');

        }
    }

    public function get_galeria_propiedad(){
        $id_propiedad = $this->input->post('id_propiedad');
        $this->db->select('nombre_imagen,id_propiedad,id')->from('propiedades_imagenes');
        $this->db->where('id_propiedad', $id_propiedad)->order_by('prioridad', 'asc');
        $result = $this->db->get();
        $imagenes = ($result->num_rows() > 0) ? $result->result_array() : FALSE;
        return $imagenes;
    }
    
    public function get_galeria_desarrollo(){
        $id_propiedad = $this->input->post('id_desarrollo');
        $this->db->select('nombre_imagen,id_desarrollo,id')->from('desarrollos_imagenes');
        $this->db->where('id_desarrollo', $id_propiedad)->order_by('prioridad', 'asc');
        $result = $this->db->get();
        $imagenes = ($result->num_rows() > 0) ? $result->result_array() : FALSE;
        return $imagenes;
    }

    function get_galeria_auto_public($id_auto)
    {
        $query_str = "select * from auto_imagenes WHERE auto_imagenes.id_auto = '$id_auto' ORDER BY auto_imagenes.prioridad asc";
        $result    = $this->db->query($query_str);
        return $result;
    }

    public function eliminar_foto(){
        $id_imagen = $this->input->post('id_imagen');
        $this->db->select('id_propiedad,nombre_imagen')->from('propiedades_imagenes');
        $this->db->where('id', $id_imagen)->limit(1);
        $result = $this->db->get();
        $imagen = ( $result->num_rows() > 0 ) ? $result->first_row('array') : FALSE;
        if($imagen){
            $id_propiedad = $imagen['id_propiedad'];
            $nombre_imagen = $imagen['nombre_imagen'];
            $path = "imagenes_propiedad/$id_propiedad/$nombre_imagen";
            @unlink($path);
            $this->db->delete('propiedades_imagenes', array('id' => $id_imagen));
            return TRUE;
        }
        return FALSE;

    }
    
    public function eliminar_foto_desarrollo(){
        $id_imagen = $this->input->post('id_imagen');
        $this->db->select('id_desarrollo,nombre_imagen')->from('desarrollos_imagenes');
        $this->db->where('id', $id_imagen)->limit(1);
        $result = $this->db->get();
        $imagen = ( $result->num_rows() > 0 ) ? $result->first_row('array') : FALSE;
        if($imagen){
            $id_propiedad = $imagen['id_desarrollo'];
            $nombre_imagen = $imagen['nombre_imagen'];
            $path = "imagenes_desarrollo/$id_propiedad/$nombre_imagen";
            @unlink($path);
            $this->db->delete('desarrollos_imagenes', array('id' => $id_imagen));
            return TRUE;
        }
        return FALSE;

    }

    public function subir_galeria(){
        $id_propiedad = $this->input->post('id_propiedad');
        $files = $_FILES;
        $estatus_imagenes = array();
        $cpt = count($_FILES['galeria']['name']);
        $config['upload_path'] = "imagenes_propiedad/$id_propiedad";
        $config['allowed_types'] = 'gif|jpg|png|bmp';
        $config['max_size'] = 5198;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        for($i=0; $i<$cpt; $i++){
            $_FILES['files']['name']= $files['galeria']['name'][$i];
            $_FILES['files']['type']= $files['galeria']['type'][$i];
            $_FILES['files']['tmp_name']= $files['galeria']['tmp_name'][$i];
            $_FILES['files']['error']= $files['galeria']['error'][$i];
            $_FILES['files']['size']= $files['galeria']['size'][$i];
            if (!$this->upload->do_upload('files')){
                $error = $this->upload->display_errors();
                $estatus_imagenes[] = array('imagen' => $_FILES['files']['name'], 'error' => $error, 'success' => FALSE);
            }else{
                $nombre = $this->upload->data('file_name');
                $this->db->select('IFNULL( MAX(prioridad),0) +1 AS p')->from('propiedades_imagenes')->where('id_propiedad', $id_propiedad);
                $result = $this->db->get();
                $prioridad = ($result->num_rows() > 0) ? $result->first_row('array') : FALSE;
                if($prioridad === FALSE){
                    break;
                    $estatus_imagenes[] = array('imagen' => $_FILES['files']['name'], 'error' => 'Error en la BD', 'success' => FALSE);
                }
                $insert = array('id_propiedad' => $id_propiedad, 'nombre_imagen' => $nombre, 'prioridad' => $prioridad['p']);
                $this->db->insert('propiedades_imagenes', $insert);
                $estatus_imagenes[] = array('imagen' => $_FILES['files']['name'], 'error' => '', 'success' => TRUE);
            }
        }
        return array('success' => TRUE, 'imagenes' => $estatus_imagenes);
    }
    
    public function subir_galeria_desarrollo(){
        $id_propiedad = $this->input->post('id_desarrollo');
        $files = $_FILES;
        $estatus_imagenes = array();
        $cpt = count($_FILES['galeria']['name']);
        $config['upload_path'] = "imagenes_desarrollo/$id_propiedad";
        $config['allowed_types'] = 'gif|jpg|png|bmp';
        $config['max_size'] = 5198;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        for($i=0; $i<$cpt; $i++){
            $_FILES['files']['name']= $files['galeria']['name'][$i];
            $_FILES['files']['type']= $files['galeria']['type'][$i];
            $_FILES['files']['tmp_name']= $files['galeria']['tmp_name'][$i];
            $_FILES['files']['error']= $files['galeria']['error'][$i];
            $_FILES['files']['size']= $files['galeria']['size'][$i];
            if (!$this->upload->do_upload('files')){
                $error = $this->upload->display_errors();
                $estatus_imagenes[] = array('imagen' => $_FILES['files']['name'], 'error' => $error, 'success' => FALSE);
            }else{
                $nombre = $this->upload->data('file_name');
                $this->db->select('IFNULL( MAX(prioridad),0) +1 AS p')->from('desarrollos_imagenes')->where('id_desarrollo', $id_propiedad);
                $result = $this->db->get();
                $prioridad = ($result->num_rows() > 0) ? $result->first_row('array') : FALSE;
                if($prioridad === FALSE){
                    break;
                    $estatus_imagenes[] = array('imagen' => $_FILES['files']['name'], 'error' => 'Error en la BD', 'success' => FALSE);
                }
                $insert = array('id_desarrollo' => $id_propiedad, 'nombre_imagen' => $nombre, 'prioridad' => $prioridad['p']);
                $this->db->insert('desarrollos_imagenes', $insert);
                $estatus_imagenes[] = array('imagen' => $_FILES['files']['name'], 'error' => '', 'success' => TRUE);
            }
        }
        return array('success' => TRUE, 'imagenes' => $estatus_imagenes);
    }

    public function insertar_marca(){
        $marca = $this->input->post('marca');
        $marca = strtoupper($marca);
        return $this->db->insert('catalogo_marcas', array('nombre' => $marca));
    }

    public function eliminar_marca(){
        $id_marca = $this->input->post('id_marca');
        return $this->db->delete('catalogo_marcas', array('id_marca' => $id_marca));
    }

    /******* AGENTES *****/
    public function get_agentes(){
        $this->db->select('*');
        $this->db->from('agentes');
        $this->db->order_by('id', 'desc');
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }

    public function get_agente(){
        $id_agente = $this->input->post('id');
        $this->db->select('*');
        $this->db->from('agentes')->where('id', $id_agente)->limit(1);
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result->first_row('array') : FALSE;
    }

    public function insertar_agente(){
        $this->load->helper('validacion');
        $datos = $this->input->post();
        unset($datos['id']);
        extract($datos);
        if(empty($_FILES)) {
            return array('success' => FALSE, 'msg' => 'Debes de seleccionar una imagen de agente');
        }
        if(validar_vacios($nombre) === FALSE){
            return array('success' => FALSE, 'msg' => 'Los datos marcados con * son obligatorios');
        }
        $this->db->trans_begin();
        //CUERPO DE LA TRANSACCION
        $subir_imagen = $this->subir_imagen_agente('imagen');
        if($subir_imagen[0] === FALSE){
            $this->db->trans_rollback();
            return array('success' => FALSE, 'msg' => 'La imagen que seleccionaste debe de ser jpg/bmp/png y no pesar más de 5MB');
        }
        $datos['imagen_portada'] = $subir_imagen[1];
        $this->db->insert('agentes', $datos);
        if( $this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return array('success' => FALSE, 'msg' => 'Ocurrió un error en la base de datos');
        }else{
            $this->db->trans_commit();
            return array('success' => TRUE, 'msg' => 'Todo bien');
        }
    }

    public function modificar_agente(){
        $this->load->helper('validacion');
        $datos = $this->input->post();
        unset($datos['imagen']);
        //$datos = array_filter($datos);
        //$datos['telefono'] = ($datos['telefono'] == '') ? '' : $datos['telefono'];
        $id_agente = $datos['id'];
        if(!empty($_FILES)) {
            if($imagen_portada = $this->get_imagen_agente($id_agente)){
                $path_anterior = "imagenes_agente/$imagen_portada";
                @unlink($path_anterior);
            }
            $subir_imagen = $this->subir_imagen_agente('imagen');
            if($subir_imagen[0] === FALSE){
                return array('success' => FALSE, 'msg' => 'La imagen que seleccionaste debe de ser jpg/bmp/png y no pesar más de 5MB');
            }
            $datos['imagen_portada'] = $subir_imagen[1];
        }
        $result = $this->db->update('agentes', $datos, array('id' => $id_agente));
        $msg = ($result) ? 'Se actualizó correctamente' : 'Ocurrió un error, intenta más tarde';
        return array('success' => $result, 'msg' => $msg);
    }

    public function eliminar_agente(){
        $id_agente = $this->input->post('id');
        if($imagen = $this->get_imagen_agente($id_agente)){
            $path = "imagenes_agente/$imagen";
            @unlink($path);
        }
        $result = $this->db->delete('agentes', array('id' => $id_agente));
        $msg = ($result) ? 'Se borró exitosamente' : 'Ocurrió un error, intenta más tarde';
        return array('success' => $result, 'msg' => $msg);
    }

    public function get_imagen_agente($id_agente){
        $this->db->select('imagen_portada')->from('agentes')->where('id', $id_agente)->limit(1);
        $result = $this->db->get();
        $imagen = ($result->num_rows() > 0 ) ? $result->first_row('array')['imagen_portada'] : FALSE;
        return $imagen;
    }

    public function subir_imagen_agente($campo){
        $config['upload_path'] = "imagenes_agente";
        $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
        $config['max_size'] = 5198;
        //$config['file_name'] = $file_name;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ( ! @$this->upload->do_upload($campo)){
            $error = $this->upload->display_errors();
            return array(FALSE, $error);
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            //$this->load->view('upload_success', $data);
            return array(TRUE, $this->upload->data()['file_name']);
        }
    }


}
