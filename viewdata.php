<?php    
//$allow=true;
include("common/config.php");
$host = "localhost";
$username = "root";
$password = "";
$dbname = "test-php";

$con = mysqli_connect($host, $username, $password, $dbname);
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">

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

	<!-- Image -->

	<div class="container">
	<h1 class="text-center text-white bg-dark">About User</h1>
	<br>
	


	<div class="table-responsive">

		<!-- <?php

                //$result=$con->select("phase3"); 
                //if($result->num_rows > 0)
                 // if(mysqli_num_rows($result) > 0)
               // {
         ?>  -->      	

		<table class="table table-bordered table-striped table-hover text-center">
		<thead>

		<tr>
			<th>Firstname</th>
			<th>Email</th>
			<th>Password</th>
			<th>Images</th>
			<!-- <th colspane="2">Actions</th> -->
			<th>
		  </th>

		</tr>
		</thead>
		<tbody>
			<form>
			
			<?php

			$sql1="SELECT * FROM test WHERE firstname = '".$_SESSION['user']."'";
 // echo $sql1; exit;
			//$id=$_GET["id"];
             

			 $rs = mysqli_query($con, $sql1);
			// echo $rs; exit;
			 	if(mysqli_num_rows($rs)>0)
			  $row = mysqli_fetch_assoc($rs);
               // while($row = mysqli_fetch_assoc($rs))
			{
			 
			 	
  
           // $firstname=$row['firstname'];
        //   echo $row['firstname'];
// exit;
              //while($row = $result->fetch_assoc())
               

           

			?>
			<tr>
				<td>
					
				<?php echo $row['firstname']; ?>
				</td>
				<td>
				<?php echo $row['email']; ?>
				</td>
				<td>
				<?php echo $row['password']; ?>
				</td>
				<td>
					<img src="<?php echo 'images/'.$row['filename']; ?>" width="320px" height="200px" control>
				</td>

				<td>
					<a href="updatedata.php?id=<?php echo $row['id']; ?> &table=test" class="btn btn-primary">Update</a>
					<br><br><br>
					 <a href="imageupdate2.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Image</a>

				
				</td>
				
				<td>	
					<a href="deletion.php?delete=<?php echo $row['id']; ?>&table=test&page=viewanandvan.php" onclick="return confirm('Are you sure to delete this record?')" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			         <?php // endforeach; ?>
			  <?php
                              
                            }
             ?>

		</tbody>
        </form>
	</table>
</div>
</div>

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