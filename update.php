<?php
// $allow=true;
include("common/config.php");
if(isset($_POST['submit']))
{
$id=$_GET['id'];
$table=$_GET['table'];
$firstname=$_POST['firstname'];
$email=$_POST['email'];
$password=$_POST['password'];
$pages=$_GET['page']; 



$field=array('firstname','email','password');

$value=array($firstname, $email, $password);


 $result=$con->update($table,$field,$value,$id);
if($result)
{


	echo "Updated data Save Succesfully";

	redirect($pages);
}

}

?>