<?php
require_once("config.php");


$email = $_POST['email'];
$pass = $_POST['password'];


if($email == "" || $pass == ""){
	
	header("Location:login.php");
	
}


$con= mysqli_connect($db_host ,$db_user ,$db_password ,$db_name);


if (!$con)
   die("cannot connect Database");
   
   $sql ="SELECT * FROM user WHERE email = '$email' AND PASSWORD = '$pass';";
   

    $rs = mysqli_query($con,$sql);
	
	
	$row =mysqli_fetch_assoc($rs);
    
	$count =mysqli_num_rows($rs);
	
	if($count == 0){
 		
		header('Location:login.php');
        exit();
	}
   $_SESSION['user_id'] = $row['user_id'];
   $_SESSION['user_name'] = $row['user_name'];
   $_SESSION['user_type'] = $row['user_type'];
   
header("Location:dashboard.php");
	


?>