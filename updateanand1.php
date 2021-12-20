 <script src="//cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<?php
//$allow=true;
  include("common/config.php");

?>

<?php
  include("common/head.php");

?>

  <ul class="navbar-nav ml-auto">
          
          <?php
              include("common/navbar.php");
          ?>
          

          </ul>

        </nav>



              
       
<?php 
$id=$_GET["id"];
//$table=$_GET['table'];
// echo $id;
// exit;
/*$v=$id;
$f="id";
$rs = $con -> selectdata1("phase1",$f, $v);*/
//$rs = $con -> select($table,$id);
$rs = $con -> select('test',$id);
   //get row
  // $fetchRow = mysqli_fetch_assoc($rs);
 while($row = $rs->fetch_assoc()) {
  $firstname=$row["firstname"];
 // $filename=$row["filename"];
  $email=$row["email"];
  $password=$row["password"];
 // echo $text;
 // exit;
?>
          
           <div class="container">

            <h4><b>User Update</b></h4>
            <br>
              <form method="POST" action="update.php?id=<?php echo $row['id']; ?>&table=test&page=viewanand.php" enctype="multipart/form-data">
               <!--  
                <input type="hidden" name="edit_id" value="<?php //echo $row['id']?>"> -->

                <div class="form-group">
                  <label for="firstname" class="col-sm-1 control-label">Username</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['firstname'];?>">
                  </div>
                
                </div>

                   <div class="form-group">
                  <label for="email" class="col-sm-1 control-label">Email</label>

                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'];?>">
                  </div>
                
                </div>

                 <div class="form-group">
                <label for="firstname" class="col-sm-1 control-label">Password</label>

                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password'];?>">
                  </div>
                
                </div>            
            <input type="submit" id="submit" name="submit" value="Update" class="btn btn-success" />

            <a href="viewanand.php" &table=test class="btn btn-danger">Cancel</a>
              </form>
              </div>
  </div>

<?php
}
 

?>
 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>