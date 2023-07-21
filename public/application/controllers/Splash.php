<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Splash extends CI_Controller {

	public function index()
	{
		$this->load->view('splash');
	}
}
