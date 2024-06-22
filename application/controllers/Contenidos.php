<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenidos extends CI_Controller {

	
	public function __construct() {
        parent::__construct();
        $this->load->model('Contenidos_model', 'contenidos');
        $this->load->helper('url');
    }

    // GET: /products o /product/id
    public function index($id = NULL) {

		if($id === NULL){
			$products =  $this->contenidos->get_all();
			echo json_encode(['data' => $products, 'code_status' => 200]);
		}
		else{
			if($this->contenidos->get($id)){
				$product = $this->contenidos->get($id);
				echo json_encode(['data' => $products, 'code_status' => 200]);
			}else
				echo json_encode(['data' => [], 'code_status' => 404]);

		}
    }

}
