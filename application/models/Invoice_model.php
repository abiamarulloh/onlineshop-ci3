<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model {
	
	public function get_invoice(){
		$this->db->order_by('invoice.id');
	 	return $this->db->get('invoice')->result();
	}

	public function update_invoice($id) {
		// ambil data invoice
		$get_invoice = $this->db->get_where('invoice', ['id' => $id])->row();

		// Update data invoice
		$this->db->set("status", $get_invoice->status+1);
		$this->db->where('id', $id);
		return $this->db->update('invoice', $data);
	}

	public function get_invoice_order_by_id($id){
		$this->db->select('*, order.id as id_product_order');
		$this->db->from('order');
		$this->db->join('invoice', 'invoice.id = order.invoice_id');

		$this->db->where(['invoice.id' => $id]);
		$this->db->group_by('order.id');
		return $this->db->get()->result();
	}

	public function get_invoice_by_id($id){
		return $this->db->get_where("invoice", ['id' => $id])->result();
	}

	public function get_auth_order_by_id($id) {
		$this->db->select('auth.fullname as auth_fullname, auth.image as auth_image, auth.email as auth_email, auth.phone as auth_phone,  auth.created_date as auth_created_date');
		$this->db->from('order');
		$this->db->join('invoice', 'invoice.id = order.invoice_id');
		$this->db->join('auth', 'auth.id = order.auth_id');

		$this->db->where(['invoice.id' => $id]);
		$this->db->group_by('auth.id');
		return $this->db->get()->result();
	}

	public function get_invoice_by_auth($id_auth){
		$this->db->select('*, invoice.fullname as invoice_fullname, invoice.address as invoice_address, invoice.phone as invoice_phone, invoice.date_buyying as invoice_date_buyying, invoice.dateline_buyying as invoice_dateline_buyying , invoice.id as invoice_id');
		$this->db->from('order');
		$this->db->join('invoice', 'invoice.id = order.invoice_id');
		$this->db->join('auth', 'auth.id = order.auth_id');

		$this->db->where(['auth.id' => $id_auth]);
		$this->db->group_by('invoice.id');
		return $this->db->get()->result();
	}


}
