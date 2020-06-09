<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function get_blog(){
        return $this->db->get("blog")->num_rows();
    }

    public function get_invoice(){
        return $this->db->get("invoice")->num_rows();
    }

    public function get_product(){
        return $this->db->get("product")->num_rows();
    }

}