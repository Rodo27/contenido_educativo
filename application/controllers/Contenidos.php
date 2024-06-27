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
 
    // public function index($id = NULL) {

	// 	if($id === NULL){
	// 		$products =  $this->contenidos->get_all();
	// 		echo json_encode(['data' => $products, 'code_status' => 200]);
	// 	}
	// 	else{
	// 		if($this->contenidos->get($id)){
	// 			$product = $this->contenidos->get($id);
	// 			echo json_encode(['data' => $products, 'code_status' => 200]);
	// 		}else
	// 			echo json_encode(['data' => [], 'code_status' => 404]);

	// 	}
    // }


	
    // listaContenidosPortada
    public function listaContenidosPortada() {

			$products =  $this->contenidos->get_list();
			echo json_encode(['data' => $products, 'code_status' => 200]);
		
    }

	// listaContenidos
	public function listaContenidos() {

			$products =  $this->contenidos->get_all();
			echo json_encode(['data' => $products, 'code_status' => 200]);
		
    }

	// getProduct
	public function getProduct($id) {
		
		if($this->contenidos->get($id)){
			$product = $this->contenidos->get($id);
			echo json_encode(['data' => $product	, 'code_status' => 200]);
		}else
			echo json_encode(['data' => [], 'code_status' => 404]);
	
	}

	 // POST: /createProduct
	public function nuevoContenido(){

        $data = $this->input->post();
        $data = $this->security->xss_clean($data);

        $textoData = array(
            'titulo' => $data['titulo'],
            'palabras_clave' => $data['palabrasClave'],
            'area_conocimiento' => $data['areaConocimiento'],
            'tipo_contenido' => $data['tipoContenido'],
            'descripcion' => $data['descripcion']
        );

        $id_insert = $this->contenidos->insert($textoData);

        if (!$id_insert) {
            echo json_encode(['error' => 'Error al insertar datos de texto', 'code_status' => 500]);
            return;
        }

        if (isset($_FILES['imagenPortada'])) {
			$rutaImagenPortada = $this->guardarImagen('imagenPortada',$id_insert);
			$this->contenidos->update($id_insert, ['imagen_portada' => $rutaImagenPortada]);
		}
		
		if (isset($_FILES['imagenPrevia'])) {
			$rutaImagenPrevia = $this->guardarImagen('imagenPrevia', $id_insert);
			$this->contenidos->update($id_insert, ['imagen_previa' => $rutaImagenPrevia]);
		}

        echo json_encode(['message' => 'Contenido creado correctamente', 'code_status' => 201]);
    }


	public function actualizarContenido(){
        
        $data = $this->input->post();
        $data = $this->security->xss_clean($data);

        $dataInsert = array(
            'titulo' => $data['titulo'],
            'palabras_clave' => $data['palabrasClave'],
            'area_conocimiento' => $data['areaConocimiento'],
            'tipo_contenido' => $data['tipoContenido'],
            'descripcion' => $data['descripcion']
        );


        $result = $this->contenidos->update($data['id_producto'], $dataInsert);


		if (isset($_FILES['imagenPortada'])) {
			$rutaImagenPortada = $this->guardarImagen('imagenPortada',$data['id_producto']);
			$this->contenidos->update($data['id_producto'], ['imagen_portada' => $rutaImagenPortada]);
		}
		
		if (isset($_FILES['imagenPrevia'])) {
			$rutaImagenPrevia = $this->guardarImagen('imagenPrevia', $data['id_producto']);
			$this->contenidos->update($data['id_producto'], ['imagen_previa' => $rutaImagenPrevia]);
		}

        echo json_encode(['message' => 'Contenido creado correctamente', 'code_status' => 201]);
    }


	public function borrarContenido($id_producto){


		$directorio = './public/files/'; 
		$archivos = scandir($directorio);

		foreach ($archivos as $archivo) {
			if ($archivo != '.' && $archivo != '..') {
				if (strpos($archivo, '_'.$id_producto.'.') !== false) 
					unlink($archivo);
			}
		}

		echo json_encode(['message' => 'Contenido borrado correctamente', 'code_status' => 201]);
	}


	private function guardarImagen($imagenData, $id_insert) {

		
		$extension = pathinfo($imagenData, PATHINFO_EXTENSION);
        
        $config['upload_path'] = './public/files';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048'; 
        $config['file_name'] = $imagenData.'_'.$id_insert.$extension;
		$config['override'] = true;

		$this->upload->initialize($config);

        if (!$this->upload->do_upload($imagenData)) {
            $error = $this->upload->display_errors();
            echo json_encode(['error' => $error, 'code_status' => 400]);
            exit;
        } else {
            $data = $this->upload->data();
            $rutaImagen = 'public/files/' . $data['file_name'];
            return $rutaImagen;
        }
    }
}
