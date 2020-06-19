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
		$this->db->select('*, product.image as product_image ,product.name as product_name, product.id as product_id');
		return $this->db->get('product',$limit, $start)->result();
	}

	public function get_product_by_id($id){
		$this->db->select('*, product.image as product_image ,product.name as product_name, product.id as product_id, product_category.name as category_name, brand.name as brand_name, brand.id as brand_id, product.category_id as category_id');
		$this->db->from('product');
		$this->db->join('product_category', 'product_category.id = product.category_id');
		$this->db->join('brand', 'brand.id = product.brand_id');
		$this->db->where('product.id', $id);
		return $this->db->get();
	}


	public function delete_product($id){
		return $this->db->delete("product", ['id' => $id]);
	}

	public function delete_image_product($id){
		return $this->db->delete("image_product", ['product_id' => $id]);
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


	// Get Brand
	public function get_brand(){
		return $this->db->get("brand")->result();
	}

	 public function upload($data = array()) {
        // Insert Ke Database dengan Banyak Data Sekaligus
		return $this->db->insert_batch('image_product',$data);
	}
	


	

}
