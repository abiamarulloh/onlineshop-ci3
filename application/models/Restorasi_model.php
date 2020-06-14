<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restorasi_model extends CI_Model {

	 public function upload($data = array()) {
        // Insert Ke Database dengan Banyak Data Sekaligus
        return $this->db->insert_batch('image_restorasi',$data);
	}
	
	

}
