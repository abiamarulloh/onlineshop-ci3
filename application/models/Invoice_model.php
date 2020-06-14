<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model {
	
	public function get_invoice(){
		$this->db->select('*, invoice.id as invoice_id');
		$this->db->from('invoice');
		$this->db->join('auth', 'auth.id = invoice.auth_id');
		$this->db->group_by('invoice.id');
		return $this->db->get()->result();
	}

	public function update_invoice($id) {
		// ambil data invoice
		$get_invoice = $this->db->get_where('invoice', ['id' => $id])->row();

		// Update data invoice
		$this->db->set("status", $get_invoice->status+1);
		$this->db->where('id', $id);
		return $this->db->update('invoice', $data);
	}

	public function update_invoice_down($id) {
		// ambil data invoice
		$get_invoice = $this->db->get_where('invoice', ['id' => $id])->row();

		// Update data invoice
		$this->db->set("status", $get_invoice->status-1);
		$this->db->where('id', $id);
		return $this->db->update('invoice', $data);
	}


	public function get_invoice_by_id($id){
		$this->db->select('*');
		$this->db->from('invoice');
		$this->db->join('auth', 'auth.id = invoice.auth_id');

		$this->db->where(['invoice.id' => $id]);
		$this->db->group_by('auth.id');
		return $this->db->get()->row();
	}


	public function orders_by_invoice($id){
		$this->db->select('*, order.id as id_order, product.image as product_image, brand.name as brand_name, product.name as product_name, product_category.name as category_name');
		$this->db->from('order');
		$this->db->join('invoice', 'invoice.id = order.invoice_id');
		$this->db->join('product', 'product.id = order.product_id');
		$this->db->join('brand', 'brand.id = product.brand_id');
		$this->db->join('product_category', 'product_category.id = product.category_id');

		$this->db->where('invoice.id', $id);
		return $this->db->get()->result();
	}


	// public function get_invoice_order_by_id($id){
	// 	$this->db->select('*, order.id as id_product_order');
	// 	$this->db->from('order');
	// 	$this->db->join('invoice', 'invoice.id = order.invoice_id');

	// 	$this->db->where(['invoice.id' => $id]);
	// 	$this->db->group_by('order.id');
	// 	return $this->db->get()->result();
	// }


	// public function get_invoice_by_id($id){
	// 	$this->db->select('auth.fullname as invoice_fullname, auth.address as invoice_address, auth.phone as invoice_phone,  invoice.date_buyying as invoice_date_buyying, invoice.dateline_buyying as invoice_dateline_buyying ,auth.address as invoice_address, invoice.status as invoice_status, invoice.id as invoice_id');
	// 	$this->db->from('order');
	// 	$this->db->join('invoice', 'invoice.id = order.invoice_id');
	// 	$this->db->join('auth', 'auth.id = order.auth_id');

	// 	$this->db->where(['invoice.id' => $id]);
	// 	$this->db->group_by('auth.id');
	// 	return $this->db->get()->result();
	// }

	// public function get_auth_order_by_id($id) {
	// 	$this->db->select('auth.fullname as auth_fullname, auth.address as auth_address, auth.phone as auth_phone, auth.email as auth_email,auth.created_date as auth_created_date, auth.address as auth_address');
	// 	$this->db->from('order');
	// 	$this->db->join('invoice', 'invoice.id = order.invoice_id');
	// 	$this->db->join('auth', 'auth.id = order.auth_id');

	// 	$this->db->where(['invoice.id' => $id]);
	// 	$this->db->group_by('auth.id');
	// 	return $this->db->get()->result();
	// }


	// Tampil di Member Berdasarkan User yang login
	public function get_invoice_by_auth($id_auth){
		$this->db->select('*');
		$this->db->from('order');
		$this->db->join('invoice', 'invoice.id = order.invoice_id');
		$this->db->join('auth', 'auth.id = order.auth_id');
		$this->db->where(['auth.id' => $id_auth]);
		$this->db->group_by('invoice.id');
		return $this->db->get()->result();
	}


}
