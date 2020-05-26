<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce_model extends CI_Model {
	
	public function get_product(){
		return $this->db->get("product")->result();
	}

	public function get_category(){
		return $this->db->get("product_category")->result();
	}

	public function insert_category($data){
		return $this->db->insert("product_category", $data);
	}

	public function delete_category($id){
		return $this->db->delete("product_category", ['id' => $id]);
	}

	public function get_product_admin($limit, $start){
		return $this->db->get('product',$limit, $start)->result();
	}

	public function get_product_by_id($id){
		$this->db->select('*, product.name as name, product.id as product_id');
		$this->db->from('product');
		$this->db->join('product_category', 'product_category.id = product.category_id');
		$this->db->where('product.id', $id);
		return $this->db->get()->row();
	}


	public function delete_product($id){
		return $this->db->delete("product", ['id' => $id]);
	}


	public function find($id){
		$result = $this->db->where('id', $id)
				->limit(1)
				->get("product");


		if( $result->num_rows() > 0) {
			return $result->row();
		}else{
			return array();
		}
		
	}

	

}
