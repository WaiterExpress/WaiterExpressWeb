<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Listing extends CI_Controller 
{

    public function __construct(){
        parent::__construct();
    }

	public function index()
	{
        $this->load->view('modulos/header');
        $this->load->view('listing/index');
        $this->load->view('modulos/footer');
    }

    public function property()
    {
        $this->load->view('modulos/header');
        $this->load->view('listing/property');
        $this->load->view('modulos/footer');
    }
}
