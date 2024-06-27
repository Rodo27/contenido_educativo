<?php
class Contenidos_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_list() {
        
        $this->db->select('*');
        $this->db->where('soft_delete', 0); 
        $this->db->order_by('fecha', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get('products');

        return $query->result_array();
    }

    public function get_all() {
        
        $this->db->select('*');
        $this->db->where('soft_delete', 0); 
    
        $query = $this->db->get('products');

        return $query->result_array();
    }

    public function get($id) {
        $this->db->where('soft_delete =',0);
        $query = $this->db->get_where('products', array('id_producto' => $id));
        return $query->row();
    }


    public function insert($data){
        
        $this->db->insert('products', $data);

        return $this->db->affected_rows() > 0 ?  $this->db->insert_id() : false;
    }

    public function update($id_producto, $data) {

        $this->db->where('id_producto', $id_producto);
        $this->db->update('products', $data);
        return $this->db->affected_rows() > 0;
    }

    public function delete($id_producto){
        $this->db->where('id_producto', $id_producto);
        $this->db->update('products', ['soft_delete' => 1]);
        return $this->db->affected_rows() > 0;

    }

}
