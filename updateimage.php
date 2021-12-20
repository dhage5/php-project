<?php
//$allow=true;
include("common/config.php");
if(isset($_POST['submit']))
{
$id=$_GET['id'];
$table = $_GET['table'];
$pages = $_GET['page'];

 $filename = $_FILES["filename"]["name"];
 // $tempname = $_FILES["filename"]["tmp_name"];
 // $folder = "images/".$filename;
 // move_uploaded_file($tempname, $folder);

$field=array('filename');

$value=array($filename);

$result=$con->update($table,$field,$value,$id);
if($result)
{

	move_uploaded_file($_FILES["filename"]["tmp_name"], "images/".$_FILES["filename"]["name"]);

	echo "Updated data Save Succesfully";
	//redirect('view1phase.php');
	redirect($pages);
}

}

?>