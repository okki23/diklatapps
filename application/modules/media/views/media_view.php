 
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                 
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Media
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
 
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
                               
									<thead>
										<tr> 
                                            <th style="width:5%;">Title</th>
                                            <th style="width:5%;">Artist</th>   
                                            <th style="width:10%;">Opsi</th> 
										</tr>
									</thead> 
								</table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         


        </div>
    </section>

   
	<!-- form tambah dan ubah data -->
	<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4>
                           
                        </div>
                        <div class="modal-body"> 
                                    

                                    
                                            <form id="uploadImage" action="<?php echo base_url('media/upload'); ?>" enctype="multipart/form-data" method="post">
                                            <input type="hidden" name="id" id="id">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="artist" id="artist" class="form-control" placeholder="Artist" />
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" />
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <label>File Upload</label>
                                                    <input type="file" name="uploadFile" id="uploadFile" onchange="PreviewGambar(this);" />
                                                    <input type="hidden" name="fileupload" id="fileupload">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" id="uploadSubmit" value="Upload" class="btn btn-info" />
                                                </div>
                                                <div class="progress">  
                                                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><div id="percent"> </div></div>
                                                </div>
                                                
                                                <button type="button" name="cancel" id="cancel" class="btn btn-block btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
                                                <button type="button" name="save" id="save" class="btn btn-block btn-success waves-effect" onclick="javascript:CloseWindow();" data-dismiss="modal"> <i class="material-icons">check</i> Save</button>
                                                  
                                            
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>

    
  
 
   <script type="text/javascript"> 
    function PreviewGambar(input) {
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function (e) { 
                $("#fileupload").val($('#uploadFile').val().replace(/C:\\fakepath\\/i, ''));
            };
            reader.readAsDataURL(input.files[0]);
            
        }
     }
	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>media/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){ 
                  
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
                 $("#nama_media").val(result.nama_media);
                 $("#ukuran").val(result.ukuran); 
                 $("#harga_satuan").val(result.harga_satuan); 
                 $("#id_jenis").val(result.id_jenis);
                 $("#nama_jenis").val(result.nama_jenis);
                 $("#id_satuan").val(result.id_satuan);
                 $("#nama_satuan").val(result.nama_satuan);
                  
			 }
		 });
	 }
 
	 function Bersihkan_Form(){ 
        $(':input').val('');   
     }
     function CloseWindow(){
        location.reload();
     }
	 function Hapus_Data(id){
		if(confirm('Anda yakin ingin menghapus data ini?'))
        {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('media/hapus_data')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
			   
               $('#example').DataTable().ajax.reload(); 
			   
			    $.notify("Data berhasil dihapus!", {
					animate: {
						enter: 'animated fadeInRight',
						exit: 'animated fadeOutRight'
					}  
				 },{
					type: 'success'
					});
				 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
   
    }
	}
    
      
    function Save(){
            var id = $("#id").val();
            var fileupload = $("#fileupload").val();  
             $.ajax({
                 url:"<?php echo base_url(); ?>media/save",
                 type:"POST",
                 data:{id:id,fileupload:fileupload},  
                 success:function(result){  
                     console.log(fileupload);
                  
                 }
                }); 
    }
	function Simpan_Data(){
		//setting semua data dalam form dijadikan 1 variabel 
		 var formData = new FormData($('#user_form')[0]); 
 
                 //transaksi dibelakang layar
                 $.ajax({
                 url:"<?php echo base_url(); ?>media/simpan_data",
                 type:"POST",
                 data:formData,
                 contentType:false,  
                 processData:false,   
                 success:function(result){ 
                    
                     $("#defaultModal").modal('hide');
                     $('#example').DataTable().ajax.reload(); 
                     $('#user_form')[0].reset();
                     Bersihkan_Form();
                     
                     $.notify("Data berhasil disimpan!", {
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                     } 
                     },{
                        type: 'success'
                    });
                 }
                }); 
 
  
	}
      
	 
       $(document).ready(function() {
            $('#uploadImage').submit(function(event){
            if($('#uploadFile').val())
            {
                event.preventDefault();
                
                $(this).ajaxSubmit({
                    
                    target: '#targetLayer', 
                    beforeSubmit:function(){
                        var percentValue = '0%';
                        $('#percent').html(percentValue);
                        $('.progress-bar').width('0%');
                            var id = $("#id").val();
                            var fileupload = $("#fileupload").val();  
                            var artist = $("#artist").val();
                            var title = $("#title").val();  
                            $.ajax({
                            url:"<?php echo base_url(); ?>media/save",
                            type:"POST",
                            data:{id:id,fileupload:fileupload,artist:artist,title:title},  
                            success:function(result){  
                                console.log(fileupload); 
                            }
                            }); 
                    },
                    uploadProgress: function(event, position, total, percentageComplete)
                    {
                        
                          
                        $('.progress-bar').animate({
                            width: percentageComplete + '%'
                        }, {
                            duration: 1000,
                            easing: "linear",
                            step: function (x) {
                            percentText = Math.round(x * 100 / percentageComplete);
                                $("#percent").text(percentText + "%");  
                                $("#percent").html(percentageComplete + '%');
                                if(percentageComplete == 100){
                                    $("#cancel").hide();
                                    $("#save").show();
                                }else{
                                    $("#cancel").show();
                                    $("#save").hide();
                                }
                                
                            }
                          
                        });
                    },
                    success:function(){
                           
                    },
                    resetForm: true
                });
            }
            return false;
        });
		$("#addmodal").on("click",function(){
			$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
            $("#sign").hide();
            $("#cancel").show();
            $("#save").hide();
		}); 
		$('#example').DataTable({ 
			"ajax": "<?php echo base_url(); ?>media/fetch_media", 
		}); 
	  }); 
		 
    </script>

     