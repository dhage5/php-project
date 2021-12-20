<?php
// Start the session
$allow=true;
include ('common/config.php');

$id=$_GET['delete'];
$table=$_GET['table'];
$pages=$_GET['page'];  
//echo $pages;
//exit; 
  $rs = $con -> delete($table,$id);
  if ($rs) {
  	$_SESSION['msg']="delete Record Successfully";
			redirect($pages);
			//exit;
  }
?>
