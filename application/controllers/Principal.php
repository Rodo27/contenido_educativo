<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenidos extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{

		$data['view'] = 'dashboard/home';
		$data['scripts'] = ['public/assets/js/empty.js']; 

        $this->load->view('template/master_layout', $data);
    
	}

	public function administration(){
		
		$data['view'] = 'dashboard/administration';
        $data['scripts'] = ['public/assets/js/administration/tynimce.js']; 

        $this->load->view('template/master_layout', $data);
	}

	public function product(){
		
		$data['view'] = 'dashboard/product';
        $data['scripts'] = ['public/assets/js/empty.js']; 

        $this->load->view('template/master_layout', $data);
	}
}
