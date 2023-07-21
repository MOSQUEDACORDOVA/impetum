<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->helper('validacion');
    }
    
    function show_propiedades(){
		$query_str="select * from propiedades where tipo != '0' order by prioridad ASC LIMIT 3";
		$result= $this->db->query($query_str);
		return $result;
	}
	
	function show_desarrollos(){
		$query_str="select * from desarrollos where tipo != '0' order by prioridad ASC LIMIT 3";
		$result= $this->db->query($query_str);
		return $result;
	}
	
	function show_agentes(){
		$query_str="select * from agentes order by ordenamiento ASC";
		$result= $this->db->query($query_str);
		return $result;
	}
	
	//Mostrar todas las propiedades en las sección de propiedades del sitio publico
	function show_propiedades_all(){
		$query_str="select * from propiedades where tipo != '0' order by prioridad ASC";
		$result= $this->db->query($query_str);
		return $result;
	}
	
	function show_propiedades_filtro(){
		$tipo = $this->input->post('tipo');
		$query_str="select * from propiedades where tipo = $tipo order by prioridad ASC";
		$result= $this->db->query($query_str);
		return $result;
	}
	
	function show_propiedades_filtros(){
		$tipo = $this->input->post('tipo');
		$estado = $this->input->post('estado');
		$precio = $this->input->post('precio');
		if($tipo != 'todas' && $estado != ''){
			//Consulta cuando es diferente a todas y por estado
			$query_str="select * from propiedades where tipo = $tipo and estado = '$estado' order by prioridad ASC";
		}else if($tipo != 'todas' && $precio == 1){
			//Consulta cuando es diferente a todas y por precio menor
			$query_str="select * from propiedades where tipo = $tipo order by CAST(precio_filtro AS SIGNED) ASC";
		}else if($tipo != 'todas' && $precio == 2){
			//Consulta cuando es diferente a todas y por precio mayor
			$query_str="select * from propiedades where tipo = $tipo order by CAST(precio_filtro AS SIGNED) DESC";
		}else if($tipo != 'todas' && $precio == 1 && $estado != ''){
			//Consulta cuando es diferente a todas y por precio menor y estado
			$query_str="select * from propiedades where tipo = $tipo and estado = '$estado' order by CAST(precio_filtro AS SIGNED) ASC";
		}else if($tipo != 'todas' && $precio == 2 && $estado != ''){
			//Consulta cuando es diferente a todas y por precio mayor y estado
			$query_str="select * from propiedades where tipo = $tipo and estado = '$estado' order by prioridad ASC";
		}else if($tipo == 'todas' && $estado != ''){
			//Consulta cuando es igual a todas y por estado
			$query_str="select * from propiedades where estado = '$estado' order by prioridad ASC";
		}else if($tipo == 'todas' && $precio == 1){
			//Consulta cuando es igual a todas y por precio menor
			$query_str="select * from propiedades order by CAST(precio_filtro AS SIGNED) ASC";
		}else if($tipo == 'todas' && $precio == 2){
			//Consulta cuando es igual a todas y por precio mayor
			$query_str="select * from propiedades order by CAST(precio_filtro AS SIGNED) DESC";
		}else if($tipo == 'todas' && $precio == 1 && $estado != ''){
			//Consulta cuando es igual a todas y por precio menor y estado
			$query_str="select * from propiedades where estado = '$estado' order by CAST(precio_filtro AS SIGNED) ASC";
		}else if($tipo == 'todas' && $precio == 2 && $estado != ''){
			//Consulta cuando es igual a todas y por precio mayor y estado
			$query_str="select * from propiedades where estado = '$estado' order by prioridad ASC";
		}else if($tipo != '' && $precio == '' && $estado == ''){
			//Consulta cuando es igual a todas y por precio mayor y estado
			$query_str="select * from propiedades where tipo = $tipo order by prioridad ASC";
		}else if($tipo != '' && $precio){
			//Consulta cuando es igual a todas y por precio mayor y estado
			$query_str="select * from propiedades where tipo = $tipo order by prioridad ASC";
		}else if($tipo != '' && $estado == ''){
			//Consulta cuando es igual a todas y por precio mayor y estado
			$query_str="select * from propiedades where tipo = $tipo order by prioridad ASC";
		}
		
		$result= $this->db->query($query_str);
		return $result;
	}
	
	//DESARROLLOS
	//Mostrar todas las propiedades en las sección de propiedades del sitio publico
	function show_desarrollos_all(){
		$query_str="select * from desarrollos where tipo != '0' order by prioridad ASC";
		$result= $this->db->query($query_str);
		return $result;
	}
	
	function show_desarrollos_filtro(){
		$tipo = $this->input->post('tipo');
		$query_str="select * from desarrollos where tipo = $tipo order by prioridad ASC";
		$result= $this->db->query($query_str);
		return $result;
	}
	
	function show_desarrollos_filtros(){
		$tipo = $this->input->post('tipo');
		$estado = $this->input->post('estado');
		$precio = $this->input->post('precio');
		if($tipo != 'todas' && $estado != ''){
			//Consulta cuando es diferente a todas y por estado
			$query_str="select * from desarrollos where tipo = $tipo and estado = '$estado' order by prioridad ASC";
		}else if($tipo != 'todas' && $precio == 1){
			//Consulta cuando es diferente a todas y por precio menor
			$query_str="select * from desarrollos where tipo = $tipo order by CAST(precio_filtro AS SIGNED) ASC";
		}else if($tipo != 'todas' && $precio == 2){
			//Consulta cuando es diferente a todas y por precio mayor
			$query_str="select * from desarrollos where tipo = $tipo order by CAST(precio_filtro AS SIGNED) DESC";
		}else if($tipo != 'todas' && $precio == 1 && $estado != ''){
			//Consulta cuando es diferente a todas y por precio menor y estado
			$query_str="select * from desarrollos where tipo = $tipo and estado = '$estado' order by CAST(precio_filtro AS SIGNED) ASC";
		}else if($tipo != 'todas' && $precio == 2 && $estado != ''){
			//Consulta cuando es diferente a todas y por precio mayor y estado
			$query_str="select * from desarrollos where tipo = $tipo and estado = '$estado' order by prioridad ASC";
		}else if($tipo == 'todas' && $estado != ''){
			//Consulta cuando es igual a todas y por estado
			$query_str="select * from desarrollos where estado = '$estado' order by prioridad ASC";
		}else if($tipo == 'todas' && $precio == 1){
			//Consulta cuando es igual a todas y por precio menor
			$query_str="select * from desarrollos order by CAST(precio_filtro AS SIGNED) ASC";
		}else if($tipo == 'todas' && $precio == 2){
			//Consulta cuando es igual a todas y por precio mayor
			$query_str="select * from desarrollos order by CAST(precio_filtro AS SIGNED) DESC";
		}else if($tipo == 'todas' && $precio == 1 && $estado != ''){
			//Consulta cuando es igual a todas y por precio menor y estado
			$query_str="select * from desarrollos where estado = '$estado' order by CAST(precio_filtro AS SIGNED) ASC";
		}else if($tipo == 'todas' && $precio == 2 && $estado != ''){
			//Consulta cuando es igual a todas y por precio mayor y estado
			$query_str="select * from desarrollos where estado = '$estado' order by prioridad ASC";
		}else if($tipo != '' && $precio == '' && $estado == ''){
			//Consulta cuando es igual a todas y por precio mayor y estado
			$query_str="select * from desarrollos where tipo = $tipo order by prioridad ASC";
		}else if($tipo != '' && $precio){
			//Consulta cuando es igual a todas y por precio mayor y estado
			$query_str="select * from desarrollos where tipo = $tipo order by prioridad ASC";
		}else if($tipo != '' && $estado == ''){
			//Consulta cuando es igual a todas y por precio mayor y estado
			$query_str="select * from desarrollos where tipo = $tipo order by prioridad ASC";
		}
		
		$result= $this->db->query($query_str);
		return $result;
	}
	
	//Obtener la información de una propiedad
	public function get_propiedades_info($id){
        $this->db->select('*')->from('propiedades')->where('id', $id);
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }
    
    //Obtener la información de una propiedad
	public function get_desarrollos_info($id){
        $this->db->select('*')->from('desarrollos')->where('id', $id);
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }
    
    //Imagenes
    function muestra_imagenes_propiedades($id){
		$query_str="select * from propiedades_imagenes WHERE id_propiedad = '$id' ORDER BY prioridad ASC";
		$result= $this->db->query($query_str);
		return $result;
	}
	
	//Imagenes
    function muestra_imagenes_desarrollos($id){
		$query_str="select * from desarrollos_imagenes WHERE id_desarrollo = '$id' ORDER BY prioridad ASC";
		$result= $this->db->query($query_str);
		return $result;
	}
	
	//Función para obtener
    public function get_propiedades_images($id){
        $sql = "select * from propiedades_imagenes WHERE id_propiedad = '$id' ORDER BY prioridad ASC";
        $result = $this->db->query($sql);
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }
    
    //Función para obtener
    public function get_desarrollos_images($id){
        $sql = "select * from desarrollos_imagenes WHERE id_desarrollo = '$id' ORDER BY prioridad ASC";
        $result = $this->db->query($sql);
        return ($result->num_rows() > 0) ? $result->result_array() : FALSE;
    }
    
    public function busqueda_desarrollos(){
        $busqueda = $this->input->post('search');
        $sql = "SELECT * from desarrollos WHERE nombre_propiedad LIKE '%$busqueda%' OR ubicacion LIKE '%$busqueda%' ORDER BY prioridad ASC";
		$result= $this->db->query($sql);
		return $result;

    }
    
    public function busqueda_propiedades(){
        $busqueda = $this->input->post('search');
        $sql = "SELECT * from propiedades WHERE nombre_propiedad LIKE '%$busqueda%' OR ubicacion LIKE '%$busqueda%' ORDER BY prioridad ASC";
		$result= $this->db->query($sql);
		return $result;

    }
    
    public function busqueda_agentes(){
        $busqueda = $this->input->post('search');
        $sql = "SELECT * from agentes WHERE nombre LIKE '%$busqueda%' OR ubicacion LIKE '%$busqueda%' ORDER BY ordenamiento ASC";
		$result= $this->db->query($sql);
		return $result;

    }

}
