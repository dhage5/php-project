<?php
  include("common/header.php");
?>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Sign Up</h1>
              </div>
              <form  method="POST" action="" enctype="multipart/form-data"> 
              <form class="user">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label>Username:</label>
                    <input type="text" class="form-control form-control-user" id="firstName" name="firstname"  placeholder="User Name">
                  </div>
                  
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label>Email ID:</label>
                  <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label>Password :</label>
                    <input type="password" id="password" name="password"  class="form-control form-control-user"  placeholder="Password">
                  </div>
             
                </div>

                <div class="form-group row">
                  <div class="col-sm-12">
                    <label>Profile Photo:</label>
                    <input type="file" id="file" name="file" class="form-control form-control-user">
                  </div>
             
                </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary btn-user btn-block">
                  Sign Up
                </button>
                <hr>
              </form>
              <hr>
         
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

<?php
include("common/config.php");

if(isset($_POST['submit']))
{

$firstname = $_POST['firstname'];
$email = $_POST['email'];
$password = $_POST['password'];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// Check file size
if ($_FILES["file"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
   
    $finals="images/".$_FILES["file"]["name"];
    $filename=$_FILES["file"]["name"]; 

//if($title!="" && $text!="" && $filename!="")
//{
  $fields=array('firstname','email','password','filename');

  $values=array( $firstname, $email, $password, $filename);

  $result=$con->insert("test",$fields,$values);
if($result)
  {
  echo "data inserted into database";
  redirect('register.php');
  }
  else
  {
    echo "ckeck record";
  }
}
}
}
?>



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
