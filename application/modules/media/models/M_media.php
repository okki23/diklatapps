<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_media extends Parent_Model { 
  
     var $nama_tabel = 'm_list';
     var $daftar_field = array('id','title','artist','m4v','mp4','ogv','webmv','poster','avi','mkv','flv','webm','webmm');
     var $primary_key = 'id'; 
      
     
	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_media(){ 
      
             $getdata = $this->db->get($this->nama_tabel)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
              
                $sub_array[] = $row->title;  
                $sub_array[] = $row->artist;  
            
                $sub_array[] = '<a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>  &nbsp;';  
                $sub_array[] = $row->id;
               
                $data[] = $sub_array;  
                $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    } 
	 
 
}
