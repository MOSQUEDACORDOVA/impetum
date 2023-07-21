<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Version extends CI_Controller {


    public function index(){
        echo '<b style="font-size:22px;">La versión de Codeigniter es la siguiente: '.CI_VERSION.'</b>';
    }
}
