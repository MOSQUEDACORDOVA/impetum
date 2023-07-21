<?php

/**
 * CURL
 *
 * @package Helpers
 * @subpackage
 * @category Respuesta
 * @author Daniel uribe
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if (!function_exists('respuesta_json')) {
    function respuesta_json($arreglo){
        $CI = & get_instance();
        $CI->output->set_content_type('application/json')->set_output(json_encode($arreglo));
    }
}
