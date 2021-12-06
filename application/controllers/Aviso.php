<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aviso extends CI_Controller {


	public function index()
	{
		$this->load->view('aviso/aviso_page');
	}
}
