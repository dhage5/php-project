<?php 
// Checking Session
error_reporting(0);
ob_start();
session_start();
if(isset($_SESSION["user"]) || $_SESSION["email"]){
	$uid=$_SESSION["user"];
	// echo $uid;
	// exit;
		
}else{
	if(isset($_POST['txt_password']) ||isset($_POST['txt_pass']) || $allow=="true"){
		//echo "hi"; exit;
	}else{

        $_SESSION['alert']="warning";
        $_SESSION['msg']="Session Expired! Login Again!!";
        //header('location:index.php');
          redirect('location:index.php');
        exit;
		//header('location:index.php');
                  redirect('index.php');
		exit;
	}
}

//---------------------------------
//redirect function

    function redirect($url)
	{
		if (!headers_sent())
		{    
			header('Location: '.$url);
			exit;
        }
		else
        {  
			echo '<script type="text/javascript">';
			echo 'window.location.href="'.$url.'";';
			echo '</script>';
			echo '<noscript>';
			echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
			echo '</noscript>'; exit;
		}
	}
//---------------------------------

// Set time to IST
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}
//echo date('Y-m-d H:i:s');
//--------------------------------

// Making input Secure 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	foreach($_POST as $i=>$j){
		if(is_array($j)){
	
		}else{
	  		$_POST[$i]= test_input($j);
	  	}
	}
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	foreach($_GET as $x=>$y){
		if(is_array($y)){
	
		}else{
	  		$_GET[$x]= test_input($y);
	    }
	}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//------------------------------------

$host = "localhost";
$username = "root";
$password = "";
$dbname = "datainfo";

$con = mysqli_connect($host, $username, $password, $dbname);
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}

?>