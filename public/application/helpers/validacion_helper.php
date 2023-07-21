<?php

/**
 * Validacion
 *
 * @package Helpers
 * @subpackage
 * @category Validaciones
 * @author Daniel uribe
 * @link http://ejemplo.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Funcion para validar que una variables no sea vacía (espacio en blanco) PUEDE SER 0
 * @param str $valor Un valor alfanumerico
 */
if(!function_exists('es_vacio')){
    function es_vacio($valor){
        return (!isset($valor) || trim($valor)==='');
    }
}

/**
 * Funcion para validar que varios parametros no sean vacios si alguno es vacío regresa FALSE
 * @param mixed Número infinito de parametros
 * @return bool Regresa falso en caso de que algun parametro sea vacio, verdadero en caso contrario
 */
if(!function_exists('validar_vacios')){
    function validar_vacios(){
        foreach(func_get_args() as $param){
            if(!isset($param) || trim($param)==='')
			return FALSE;
        }
        return TRUE;
    }
}
