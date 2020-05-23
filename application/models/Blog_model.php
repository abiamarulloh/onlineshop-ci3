<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public function get_category(){
		return $this->db->get('blog_category')->result();
	}
	
	public function insert_category($data)
	{
		return $this->db->insert('blog_category', $data);
	}

	public function delete_category($id){
		return $this->db->delete('blog_category', ['id' => $id]);
	}

	

	public function delete_blog($id){
		return $this->db->delete('blog', ['id' => $id]);
	}

	
	public function get_blog_admin($limit, $start){
		return $this->db->get('blog',$limit, $start)->result();
	}


	public function get_blog_by_id($id){
		return $this->db->get_where('blog', ['id' => $id])->row();
	}

	public function blog_detail($id){
		$this->db->select('*, blog_category.name as category_name, blog.created_date as blog_created, blog.updated_date as blog_updated, blog.image as blog_image');
		$this->db->from('blog');
		$this->db->join('blog_category', 'blog.category_id = blog_category.id');
		$this->db->join('auth', 'auth.id = blog.user_id');
		$this->db->where('blog.id', $id);
		return $this->db->get_where()->row();
	}




}
