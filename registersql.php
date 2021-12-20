<?php
$allow=true;
include("common/config.php");
if(isset($_POST['submit']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password =  $_POST['password'];
    
    $email = $_POST['email'];
     
    
$fields=array('firstname','lastname','password','email');

$values=array( $firstname, $lastname, $password, $email);

 $result=$con->insert("user",$fields,$values);
if($result)
{
    $_SESSION['msg']="Insert Record Successfully";
			redirect('index.php?bs=success');
			exit;
	}

}

?>