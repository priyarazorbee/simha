<?php
ini_set("max_execution_time", 0);
$search = $_SERVER['REQUEST_URI'] ;
$url_components = parse_url($search); 
   parse_str($url_components['query'], $params); 
     $id= $params['id'];
  $url="http://localhost/simha/api/getId/".$id;
$variableee = json_decode(file_get_contents($url));
//echo "<pre>";
//print_r($variableee);
//echo "</pre>";

include "head.php"; 
include "sidebar.php";
include "navbar.php";
?>
    <!-- End of Sidebar -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
             <h1 class="h3 mb-4 text-gray-800">Edit Stall</h1>
          <!-- Page Heading -->
   <form method="post" class="form-horizontal" id="updateForm" enctype="multipart/form-data">
				<input  type="hidden" id="<?php echo $variableee->id ?>" name="<?php echo $variableee->id ?>" class="form-control" />	
				<div class="form-group">
				<label class="col-sm-3 control-label">Name</label>
				<div class="col-sm-6">
				<input type="text" id="txt_name" name="txt_name" class="form-control" placeholder="<?php echo $variableee->name ?>" />
				</div>
				</div>
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Description</label>
				<div class="col-sm-6">
				<input type="text" id="description"name="description" class="form-control" placeholder="<?php echo $variableee->description ?>" />
				</div>
				</div>
                   <div class="form-row">
                <div class="form-group col-md-6">
                <label class="col-sm-3 control-label">Start Date</label>
                   <div class="datepicker date input-group">
                    <input type="text" placeholder="Start-date" name="start" class="form-control" id="startDate">
                    <div class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-sm-3 control-label">End Date</label>
                    <div class="datepicker date input-group">
                    <input type="text" placeholder="End-date" name="end" class="form-control" id="endDate">
                    <div class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></div>
                    </div>
                    </div>
             </div>
                <div class="form-group">
                 <label class="col-sm-3 control-label">Action</label>   
                
                  <div class="col-sm-6">   
                <select name="action" id="action" required="required">
                            <option value="1">Active</option>
                            <option value="2">In-Active</option>
                        </select>
                </div>   
                 </div>   
				<div class="form-group">
				<label class="col-sm-3 control-label">File</label>
				<div class="col-sm-6">
                    <div class="row">
                      <div class="col-sm-6">  
                     <img class="img-thumbnail" src="http://localhost/admin/<?php echo $variableee->image ?>"/> </div>
                         <div class="col-sm-6"> 
				<input type="file" id="txt_file" name="txt_file" class="form-control" accept="image/*"/></div>
				</div>
				</div></div>
       
                <div class="form-group">
				<label class="col-sm-3 control-label">Floor</label>
				<div class="col-sm-6">
				  <div class="row">
                      <div class="col-sm-6">  
                     <img class="img-thumbnail" src="http://localhost/admin/<?php echo $variableee->floor ?>"/> </div>
                         <div class="col-sm-6"> 
				<input type="file" id="txt_floor" name="txt_floor" class="form-control" accept="image/*"/></div>
				</div>
				</div></div>
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
                <input type="hidden" name="_METHOD" value="PUT"/>
				<input type="submit"  name="btn_insert" class="btn btn-success" value="Insert">
				<a href="index.php" class="btn btn-danger">Cancel</a>
				</div>
				</div>
					
			</form>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
     <?php include "footer.php"; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
<script src="js/main.js"></script>
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
   $(function () {

    // INITIALIZE DATEPICKER PLUGIN
    $('.datepicker').datepicker({
        clearBtn: true,
        format: "yyyy/mm/dd"
    });


    // FOR DEMO PURPOSE
    $('#reservationDate').on('change', function () {
        var pickedDate = $('input').val();
        $('#pickedDate').html(pickedDate);
    });
});
  </script>  
</body>

</html>
