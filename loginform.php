<?php
$allow=true;
include("common/config.php");

{

     $firstname = $_POST['firstname'];    
     $password =  $_POST['password'];


 // $result=$con->selectData($firstname,$password);


 // $row = mysqli_fetch_assoc($result);
 	 
	//  $_SESSION["id"] = $row["id"];
 // 	// echo $_SESSION["id"];
 //    // exit;
	// echo "login Succesfully";
	// redirect('dashboard.php');

$result=$con->selectData($firstname,$password);
 if($result)
 {
	$_SESSION["user"]=$firstname;
	//$resultFetch=$con->selectData($email,$password);
	//$_SESSION["user"]=$resultFetch['id'];
	// echo $_SESSION["user"],exit;
	echo "login Succesfully";
	redirect('dashboard.php');
}
else{
	echo "error";
	redirect('register.php');
}
}


?>