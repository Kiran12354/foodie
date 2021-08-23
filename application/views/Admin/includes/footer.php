<footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url()?>Admin_assets/assets/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url()?>Admin_assets/assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url()?>Admin_assets/assets/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>Admin_assets/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="<?php echo base_url()?>Admin_assets/assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url()?>Admin_assets/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url()?>Admin_assets/assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url()?>Admin_assets/assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
  
  <script>
    $(document).ready(function() {
        $('#summernote1').summernote();
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 
  <script>
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
    </script>
  
  <script>
        function status_change(d,d1,d3){

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger mr-2'
            },
            buttonsStyling: false
          });
                
            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Are You Sure To Change Status ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Change it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true,
        }).then((result) =>{
            
        if (result.value) {
       $.ajax({
           type: 'POST',
           url:'<?php echo base_url();?>My_controller/status_change',
           data: {id:d1,teg_table:d,st:d3},
           dataType: 'json',
           success:function(data){
               toastr["success"]("Status Changed");
                window.setTimeout(function() {
                        location.reload();
                    }, 1000);
            }
           });
               }
    });
    }
    </script>
    
    <script>
        function ptap_order(d,d1,d2){
               
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger mr-2'
        },
        buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "This Action Will Change The Order !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Change it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
       $.ajax({type: 'POST',
           url:'<?php echo base_url();?>My_controller/change_Order',
           data: {id:d1,teg_table:d,va:$('#ptap_order'+d2).val()},
           dataType: 'json',
           success:function(data){
               
                    toastr["success"]("Order Changed");
                window.setTimeout(function() {
                        location.reload();
                    }, 1000);
            }
           });
                   }
    });
    }
    
    
    
  </script>
  
</body>

</html>