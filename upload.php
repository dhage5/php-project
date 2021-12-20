<?php
//$allow=true;
 include ("common/config.php");

if(isset($_POST['submit']))
{
  
  $uploadedon=Date('Y-m-d H:i:s');
  //$status=1;
$table=$_GET['table'];
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
    $table=$_GET['table'];
    $pages = $_GET['page'];
    $finals="images/".$_FILES["file"]["name"];
    $filename=$_FILES["file"]["name"]; 
 
    $fields=array('filename', 'uploadedon');//database Field
    $values=array($filename,$uploadedon);//variables
    $result_insert=$con->insert($table,$fields,$values);
    
    redirect($pages);
  

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>
<br><br>
<?php
if (isset($_GET['del'])) {
  $id = $_GET['del'];
  mysqli_query($con, "DELETE FROM gallery WHERE id=$id");
  $_SESSION['message'] = "Data deleted!"; 
 // header('location: uu.php');

            {
              echo "Data deleted successfully.";
               //redirect('uu.php');
              }
}

?> 

<br><br>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<!-- <a href="gallery.php" class="btn btn-primary"><span>Back</span></a> -->

</body>
</html>