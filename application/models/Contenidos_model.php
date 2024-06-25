<?php
class Contenidos_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all() {
        $query = $this->db->get('products');
        $this->db->where('soft_delete =',0);
        return $query->result_array();
    }

    public function get($id) {
        $query = $this->db->get_where('products', array('id_producto' => $id));
        $this->db->where('soft_delete =',0);
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


}
