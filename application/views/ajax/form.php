<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <title>Ajax Crud</title>
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-md-12 mt-5">
                  <h1 class="text-center">Ajax Data Table</h1>
                  <hr style="background-color: black; color: black; height: 1px">
              </div>
          </div>
          
          <div class="row">
              <div class="col-md-12 mt-2">
                  <!--Add Record modal-->
                  <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#exampleModal">Add Record</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Add Record Form-->
        <form action="" method="post" id="form">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" id="email" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add">Add Record</button>
      </div>
    </div>
  </div>
</div>

<!--edit model-->

<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Edit Record Form-->
        <form action="" method="post" id="edit_form">
            <input type="hidden" id="edit_record_id" name="edit_record_id" value="">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" id="edit_name" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" id="edit_email" class="form-control" value="">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="update">Update</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
          
          <div class="row">
              <div class="col-md-12 mt-4">
                  <table class="table table-responsive-lg" id="records">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                  </table>
                  
              </div>
          </div>
          
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  <!--Addv Records-->
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  
  <script>
    $(document).on("click","#add",function(e){
    e.preventDefault();
    var name=$("#name").val();
    var email=$("#email").val();
    if(name==""||email==""){
        toastr["warning"]("Both fields required");
    }else{
        $.ajax({
            url:"<?php echo base_url()?>insert",
            type:"post",
            dataType:"json",
            data:{
                name:name,
                email:email
            },
            success:function(data){
            if(data.response=="success"){
                $('#records').DataTable().destroy();
                fetch();
                $('#exampleModal').modal('hide');
                
               toastr["success"](data.message);
              }else{
                toastr["error"](data.message);    
                }
            }
        });
        $("#form")[0].reset();
    }
    
 }); 
 
 
     //fetch records
     
     function fetch(){
     $.ajax({
         url:"<?php echo base_url()?>fetch",
         type:"post",
         dataType:"json",
         success:function(data){
            
             var k="1";
             $('#records').DataTable({
        "data":data.posts,
        "responsive":true,
        "columns": [
            { "render": function(){
          return a= k++;      
        }},
            { "data": "name" },
            { "data": "email" },
            { "render": function(data,type,row,meta){
             var a=`
            <a href="#" value="${row.id}" id="del" class="btn btn-sm btn-outline-danger">Delete</a> 
            <a href="#" value="${row.id}" id="edit" class="btn btn-sm btn-outline-success">Edit</a>
            `;           
           return a;         
        }}
        ]
        });
    }
        });
    }
     fetch();
     </script>
          <script>
          
          $(document).on("click",'#del',function(e){
        e.preventDefault();
        
        
        var  del_id=$(this).attr("value");
                    const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success ml-2',
                cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, cancel!',
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                  
            $.ajax({
            url:"<?php echo base_url();?>delete",
            type:"post",
            dataType:"json",
            data:{
                
               del_id:del_id
            },
            success:function(data){
                
                if(data.response=="success"){
                  swalWithBootstrapButtons.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                setTimeout(function(){
                location.reload();    
                },1000)
                }else{
                swalWithBootstrapButtons.fire(
                  'Cancelled',
                  'Your imaginary file is safe :)',
                  'error'
                )}
               }        
            });
            } else if (
                result.dismiss === Swal.DismissReason.cancel
              ) {

              }
            });
        });
   
//   edit
   $(document).on("click",'#edit',function(e){
        e.preventDefault();
        var edit_id=$(this).attr("value");
         
        $.ajax({
            url:"<?php echo base_url();?>edit",
            type:"post",
            dataType:"json",
            data:{edit_id:edit_id},
            success:function(data){
                $('#edit_modal').modal('show')
                $('#edit_record_id').val(data.post.id);
                $('#edit_name').val(data.post.name);
                $('#edit_email').val(data.post.email);
            }
            
        });
        
        });
        
//      update

    $(document).on("click","#update",function(e){
    e.preventDefault();
     var edit_record_id=$("#edit_record_id").val();
     var edit_name=$("#edit_name").val();
     var edit_email=$("#edit_email").val();
     
     if(edit_record_id == "" || edit_name=="" || edit_email== "" ){
            toastr["error"]("Fill All the Fields");
        }else{
           $.ajax({
               url:"<?php echo base_url();?>update",
               type:"post",
               dataType:"json",
               data:{
                   edit_record_id:edit_record_id,
                   edit_name:edit_name,
                   edit_email:edit_email
           
               },
                success:function(data){
                    if(data.response=="success"){
                        $('#records').DataTable().destroy();
                        fetch()
                        $('#edit_modal').modal('hide')
                        toastr["success"](data.messaage);
                    }else{
                        toastr["error"](data.messaage);
                    }

                }
               
           })  
        }
    });
    

     </script>
     
  </body>
</html>