<?php
  // $allow=true;
  include("common/config.php");
?>
<!DOCTYPE html>
<html>
     <?php 

        include ("common/head.php");

      ?>
<body>

<ul class="navbar-nav ml-auto">
          
          <?php
              include("common/navbar.php");
          ?>
          

          </ul>

        </nav>



<?php 
$id=$_GET['id'];
// echo $id;
// exit;
/*$v=$id;
$f="id";
$rs = $con -> selectdata1("phase1",$f, $v);*/

$rs = $con -> select('phase1',$id);
   //get row
  // $fetchRow = mysqli_fetch_assoc($rs);
 while($row = $rs->fetch_assoc()) {
  //$title=$row["title"];
  $filename=$row["filename"];
  //$text=$row["text"];
  
  //  echo $filename;
  // // exit;
?>

     <div class="container">
     	<br>
     	<h1 class="text-white bg-dark text-center">
        Image Update</h1>

         <form action="updateimage.php?id=<?php echo $row['id']; ?>&table=phase1&page=view1phase.php" method="post" enctype="multipart/form-data">
         	<!-- <div class="form-group">
         		<label for="user">Username:</label>
         		<input type="text" name="username" id="user" class="form-control">
         	</div> -->
         	

         	<div class="form-group">
         		<label for="file">Profile:</label>
           <!--  <input type="text" name="name" id="name" class="form-control" value="<?php //echo $row['filename'];?>"> -->
         		<input type="file" name="filename" id="filename" class="form-control" value="<?php echo $row['filename'];?>">
         	</div>

         	<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">

          <a href="view1phase.php" &table=phase1 class="btn btn-danger">Cancel</a>
         </form>
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