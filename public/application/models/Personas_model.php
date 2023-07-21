<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    
class Personas_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function check_login($correo, $password)
    {
        //$sha1_password = sha1($password);

        $query_str = "select id from usuarios where email = ? and contrasena = ?";

        $result = $this->db->query($query_str, array(
            $correo,
            $password
        ));

        if ($result->num_rows() == 1) {
            return $result->row(0)->id;
        }

        else {
            return false;
        }

    }
}