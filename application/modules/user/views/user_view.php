 
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
                               Manajemen User
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
 
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
  
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">No</th>
                                            <th style="width:5%;">Username</th>  
                                            <th style="width:5%;">Level</th>  
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
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">   
                                 
                                    <input type="hidden" name="id" id="id"> 
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <span class="label label-danger">* Kosongkan Apabila Tidak Mengganti Password </span>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" /> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    
                                    <label> Type  </label>
                                    <br>
                                    <input type="text" name="level" id="level">

                                    <button type="button" id="userbtn" class="btn btn-default waves-effect "> User </button>

                                    <button type="button" id="adminbtn" class="btn btn-default waves-effect "> Admin </button>
                                
                                     </div>
                                 

                                   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
                             </form>
                       </div>
                     
                    </div>
                </div>
    </div>
 
 
   <script type="text/javascript">
    
    //kantor
     $("#userbtn").on("click",function(){
        $("#level").val('2');
          $(this).attr('class','btn btn-primary');
        $("#adminbtn").attr('class','btn btn-default');

    });

    $("#adminbtn").on("click",function(){
        $("#level").val('1');
         $(this).attr('class','btn btn-primary');
        $("#userbtn").attr('class','btn btn-default');

         
    });
       
     function Ubah_Data(id){
        $("#defaultModalLabel").html("Form Ubah Data");
        $("#defaultModal").modal('show');
 
        $.ajax({
             url:"<?php echo base_url(); ?>user/get_data_edit/"+id,
             type:"GET",
             dataType:"JSON", 
             success:function(result){  
                 $("#defaultModal").modal('show'); 
                 $("#id").val(result.id);
                 $("#username").val(result.username); 
                 $("#level").val(result.level);                   
                 if(result.level == '1'){
                    $("#adminbtn").attr('class','btn btn-primary');
                    $("#userbtn").attr('class','btn btn-default');
                 }else{
                    $("#adminbtn").attr('class','btn btn-default');
                    $("#userbtn").attr('class','btn btn-primary');
                 }
             }
         });
     }
 
     function Bersihkan_Form(){
        $(':input').val(''); 
        $("#userbtn").attr('class','btn btn-default');
        $("#adminbtn").attr('class','btn btn-default');
     }
 
     

     function Hapus_Data(id){
        if(confirm('Anda yakin ingin menghapus data ini?'))
        {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('user/hapus_data')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                Bersihkan_Form();
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
    
   
    $('.thumbnail').on('click',function(){
        $('.modal-body').empty();
        var title = $(this).parent('a').attr("title");
        $('.modal-title').html(title);
        $($(this).parents('div').html()).appendTo('.modal-body');
        $('#Prev').modal({show:true});
    });
  
    function Simpan_Data(){
        //setting semua data dalam form dijadikan 1 variabel 
         var formData = new FormData($('#user_form')[0]);  

         //validasi form sebelum submit ke controller
         var username = $("#username").val(); 
          
         if(username == ''){
            alert("Username Belum anda masukkan!");
            $("#username").parents('.form-line').addClass('focused error');
            $("#username").focus();
          
         }else{

            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>user/simpan_data_user",
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

    }
     

     $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
     });

     
       $(document).ready(function() {
           
        $("#addmodal").on("click",function(){
            $("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            Bersihkan_Form();
            $("#defaultModalLabel").html("Form Tambah Data");
        });
        
         
        $('#example').DataTable( {
            "ajax": "<?php echo base_url(); ?>user/fetch_user" 
        });

       
     
         
      });
  
        
         
    </script>