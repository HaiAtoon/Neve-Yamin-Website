<?php

if(empty($_POST["name"]))
die("direct access is not allowed");

//create connection
$error_string="";

	$host="localhost";
	$user="coralil";
	$pass="neveyamin";
	$db="coralil_NeveYaminDB";

	$conn=new mysqli($host,$user,$pass,$db);
	
	
	if($conn->connect_error){
	    $error_string="Connection failed: ".$conn->connect_error;
	     header("Location: http://coralil.mtacloud.co.il/fault.php?msg='".$error_string."'");
		die();
    
    }
	//echo "Connection successful";
	
	
	$conn->query("SET character_set_connection = 'utf8', character_set_results = 'utf8', character_set_client = 'utf8'");

//get data


    $fullname=$_POST['name'];
    $email=$_POST['email'];
     $tel=$_POST['tel'];
     $comments=$_POST['comments'];
     $img=$_POST['img'];


//run sql


$sql="INSERT INTO faults(fullname,email,telephone,fault_info,pic) VALUES ('";
$sql.=$fullname."','";
$sql.=$email."','";
$sql.=$tel."','";
$sql.=$comments."','";
$sql.=$pic."')";

if (!$conn->query($sql)){
    $error_string= "Can not add new user. Error is: ". $conn->error;
    header("Location: http://coralil.mtacloud.co.il/fault.php?msg='".$error_string."'");
	
	exit();
}
else  
{ 
    $sql="SELECT fault_number FROM faults WHERE fault_info='".$comments."'";
    $confirmation=$conn->query($sql);

    $confirmation=$confirmation->fetch_assoc();
   
    
    
        header("Location: http://coralil.mtacloud.co.il/OK.php?confirmation=".$confirmation['fault_number']);
    die();
}

?>