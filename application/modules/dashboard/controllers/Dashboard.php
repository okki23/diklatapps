<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Dashboard extends Parent_Controller {
 

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_dashboard');
 	} 
	public function index(){ 
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'dashboard/dashboard_view';
		$data['parsing'] = $this->getlist();
		$this->load->view('template_view',$data);
	}
	public function getlist(){
		$data = $this->db->get('m_list')->result();
		return json_encode($data, JSON_UNESCAPED_SLASHES); 
	}
	 
}
