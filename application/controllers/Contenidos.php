<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenidos extends CI_Controller {

	
	public function __construct() {
        parent::__construct();
        $this->load->model('Contenidos_model', 'contenidos');
        $this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('upload');
		

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


	
    // listaContenidosPortada
    public function listaContenidosPortada() {

			$products =  $this->contenidos->get_all();
			echo json_encode(['data' => $products, 'code_status' => 200]);
		
    }

	// listaContenidos
	public function listaContenidos() {

			$products =  $this->contenidos->get_all();
			echo json_encode(['data' => $products, 'code_status' => 200]);
		
    }


	// getProduct
	public function getProduct(int $id) {
		
		if($this->contenidos->get($id)){
			$product = $this->contenidos->get($id);
			echo json_encode(['data' => $product	, 'code_status' => 200]);
		}else
			echo json_encode(['data' => [], 'code_status' => 404]);
	
	}

	 // POST: /createProduct
	public function nuevoContenido(){

        
        $data = $this->input->post();

        $textoData = array(
            'titulo' => $data['titulo'],
            'palabras_clave' => $data['palabrasClave'],
            'area_conocimiento' => $data['areaConocimiento'],
            'tipo_contenido' => $data['tipoContenido'],
            'descripcion' => $data['descripcion']
        );

        $textoInsertId = $this->contenidos->insert($textoData);


        if (!$textoInsertId) {
            echo json_encode(['error' => 'Error al insertar datos de texto', 'code_status' => 500]);
            return;
        }

        if (isset($_FILES['imagenPortada'])) {
			$imagenPortada = $_FILES['imagenPortada'];
			$rutaImagenPortada = $this->guardarImagen($imagenPortada);
			$updateData['imagenPortada'] = $rutaImagenPortada;
		}
		
		if (isset($_FILES['imagenPrevia'])) {
			$imagenPrevia = $_FILES['imagenPrevia'];
			$rutaImagenPrevia = $this->guardarImagen($imagenPrevia);
		}
		
		if (!empty($updateData)) {
			$this->contenidos->update($textoInsertId, ['imagen_previa' => $rutaImagenPrevia]);
		}


        echo json_encode(['message' => 'Contenido creado correctamente', 'code_status' => 201]);
    }



	private function guardarImagen($imagenData) {

		// echo json_encode($imagenData);
		// // esto imprime {"name":"qr-asistencia-alondra.png","type":"image\/png","tmp_name":"C:\\wamp64\\tmp\\phpFC0E.tmp","error":0,"size":244}
		// die();

		// echo base_url('public/files/');
		// die();
        
        $config['upload_path'] = './public/files';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048'; 
        $config['file_name'] = uniqid().'.png';
		$config['overwrite'] = true;
		//uniqid(); 


		$this->upload->initialize($config);

        if (!$this->upload->do_upload('imagenPrevia')) {
            $error = $this->upload->display_errors();
            echo json_encode(['error' => $error, 'code_status' => 400]);
            exit;
        } else {
            $data = $this->upload->data();
            $rutaImagen = 'public/files' . $data['file_name'];
            return $rutaImagen;
        }
    }
	

	function save_file(){
        
        $filename = strval(time() . '.pdf');

        $config['upload_path']          = './public/files';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = '10000';
        $config['file_name']            = $filename;
        $config['overwrite']            = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_cmgo'))
            return array('status' => FALSE, 'filename' => '', 'msg' => $this->upload->display_errors());
        else
            return array('status' => TRUE, 'filename' => $filename,  'msg' => 'File uploaded');
    }

}
