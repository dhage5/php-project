
<?php    
//$allow=true;
include("common/config.php");

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
	<h1 class="text-center text-white bg-dark">All Data</h1>
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
			<th>Username</th>
			<th>Email</th>
			<th>Password</th>
			<th>Profile Photo</th>
			<!-- <th colspane="2">Actions</th> -->
			<th>
				<!-- <button class="btn-warning btn">
					<a href="anand1add.php" class="text-white">Add Data</a>
					</button> -->
		  </th>

		</tr>
		</thead>
		<tbody>
			<form>
			
			<?php

                $result=$con->select("test"); 
                if(mysqli_num_rows($result)){
                while($row = mysqli_fetch_assoc($result))
              
              //while($row = $result->fetch_assoc())
               

                	{   

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
					<!-- <img src="<?php //echo '../schools/images/'.$location['filename']; ?>" width="320px" height="200px" control> -->

					<img src="<?php echo 'images/'.$row['filename']; ?>" width="320px" height="200px" control>
				</td>

				<td>
					<a href="update-data.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Update Data</a>
					<br><br><br>
					 <a href="update-image.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Update Image</a>

				
				</td>
			
				<td>	
					<a href="deletion.php?delete=<?php echo $row['id']; ?>&table=test&page=view-all-data.php" onclick="return confirm('Are you sure to delete this record?')" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			<?php// endforeach; ?>
			  <?php
                              }
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