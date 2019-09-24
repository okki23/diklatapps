<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class media extends Parent_Controller {

	var $nama_tabel = 'm_list';
	var $daftar_field = array('id','title','artist','m4v','mp4','ogv','webmv','poster','avi','mkv','flv','webm','webmm');
	var $primary_key = 'id'; 
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_media'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
	 } 

  	public function index(){
  		$data['judul'] = $this->data['judul']; 
  		$data['konten'] = 'media/media_view';
  		$this->load->view('template_view',$data);		
     
	}
	  
	public function upload(){
		if(isset($_FILES["uploadFile"])){  
			$extension = explode('.', $_FILES['uploadFile']['name']);   
			$destination = './upload/' . $_FILES['uploadFile']['name'];  
			move_uploaded_file($_FILES['uploadFile']['tmp_name'], $destination);  
			 
		}  
	}
	 
  	public function fetch_media(){  
       $getdata = $this->m_media->fetch_media();
       echo json_encode($getdata);   
	  }
	  
	  
	public function item_list(){  
       
		$no_sox =  $this->input->post('no_sox');
		
		$getdata = $this->db->query("select a.*,b.nama_jenis,c.nama_satuan from m_media a
		left join m_jenis b on b.id = a.id_jenis
		left join m_satuan c on c.id = a.id_satuan")->result();
	   
		  
		  $dataparse = array();  
			 foreach ($getdata as $key => $value) {  
				  $sub_array['nama_media'] = $value->nama_media;
				  $sub_array['nama_jenis'] = $value->nama_jenis;  
				  $sub_array['ukuran'] = $value->ukuran;
				  $sub_array['nama_satuan'] = $value->nama_satuan;
				 
				  $sub_array['action'] =  "<button typpe='button' onclick='GetItemList(".$value->id.");' class = 'btn btn-primary'> <i class='material-icons'>shopping_cart</i> Pilih </button>";  
	 
				 array_push($dataparse,$sub_array); 
			  }  
		 
		  echo json_encode($dataparse);
   
	  }
 
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$data = $this->db->query("select a.*,b.nama_jenis,c.nama_satuan from m_media a
		left join m_jenis b on b.id = a.id_jenis
		left join m_satuan c on c.id = a.id_satuan where a.id = '".$id."' ")->row(); 
 
		echo json_encode($data,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);    
	 
		$cekfile = $this->db->where($this->primary_key,$id)->get($this->nama_tabel)->row(); 
   
		if($cekfile->mp4 != '' || $cekfile->mp4 != NULL){ 
			unlink("upload/".str_replace(" ","_",$cekfile->mp4)); 
		}
    		$sqlhapus = $this->db->where($this->primary_key,$id)->delete($this->nama_tabel);
		
			if($sqlhapus){
				$result = array("response"=>array('message'=>'success'));
			}else{
				$result = array("response"=>array('message'=>'failed'));
			}
		
			echo json_encode($result,TRUE);
	}
 


	 
	public function save(){
		$id = $this->input->post('id');
		$fileupload = base_url('upload').'/'.$this->input->post('fileupload');
		$title = $this->input->post('title');
		$artist = $this->input->post('artist');
		$list = array('title'=>$title,
					  'artist'=>$artist,
					  'm4v'=>$fileupload,
					  'mp4'=>$fileupload,
					  'ogv'=>$fileupload,
					  'webmv'=>$fileupload,
					  'mkv'=>$fileupload,
					  'flv'=>$fileupload,
					  'webm'=>$fileupload,
					  'webmm'=>$fileupload);
		$this->db->insert($this->nama_tabel,$list); 
	}

	public function simpan_data(){ 
    
    $data_form = $this->m_media->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
  
    $simpan_data = $this->m_media->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
 
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
 
  
       


}
