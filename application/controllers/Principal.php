<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	
	public function index(){

		$data['view'] = 'dashboard/home';
		$data['scripts'] = ['public/assets/js/home/home.js']; 

        $this->load->view('template/master_layout', $data);
    
	}

    public function administration(){
		
		$data['view'] = 'dashboard/administration';
        $data['scripts'] = ['public/assets/js/administration/tynimce.js','public/assets/js/administration/administration.js']; 

        $this->load->view('template/master_layout', $data);
	}

	public function product(){
		
		$data['view'] = 'dashboard/product';
        $data['scripts'] = ['public/assets/js/product/product.js']; 

        $this->load->view('template/master_layout', $data);

    }

}

