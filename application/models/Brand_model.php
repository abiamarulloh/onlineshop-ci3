<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends CI_Model {
	

	public function delete_brand($id){
		return $this->db->delete('brand', ['id' => $id]);
	}

	
	public function get_brand_admin($limit, $start){
		return $this->db->get('brand',$limit, $start)->result();
	}

	public function get_brand_by_id($id){
		return $this->db->get_where('brand', ['id' => $id])->row();
	}

	public function get_product_by_brand($id, $limit, $start){
		$this->db->select('product.image as product_image, product.name as product_name, product.price as price, product.id product_id');
		return $this->db->get_where('product', ["brand_id" => $id] ,$limit, $start)->result();
	}


}
