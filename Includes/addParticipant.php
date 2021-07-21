<?php


if(empty($_POST["id"]))
die("direct access is not allowed");

header('Content-Type: text/html; charset=utf-8'); 
$error="";
//create connection


	$host="localhost";
	$user="coralil_myuser";
	$pass="neveyamin";
	$db="coralil_NeveYaminDB";

	$conn=new mysqli($host,$user,$pass,$db);
	
	if($conn->connect_error){
	    $error="Connection failed: ".$conn->connect_error;
	    header("Location: http://coralil.mtacloud.co.il/Registration.php?msg='".$error."'");
		die();
	}


$conn->query("SET character_set_connection = 'utf8', character_set_results = 'utf8', character_set_client = 'utf8'");
// 


$result=$conn->query("SELECT COUNT(hugID) AS counter FROM Participant_in_Hug WHERE hugID='".$_GET["hugID"]."'");
$result= $result->fetch_assoc();
$current_students_num=$result['counter']; //מספר הרשומים לחוג כרגע


$result=$conn->query("SELECT max_participants AS max FROM Hugs WHERE hugID='".$_GET["hugID"]."'");
$result= $result->fetch_assoc();
$max=$result['max']; //מספר מקסימלי של רשומים לחוג


if($max-$current_students_num==0)// חוג מלא
{
    $error="לצערנו חוג זה כבר מלא, אבל נסה להירשם לחוג אחר";
    header("Location: http://coralil.mtacloud.co.il/Registration.php?msg=".$error);
		die();
}
else

$result=$conn->query("SELECT * FROM Participant_in_Hug WHERE hugID='".$_GET["hugID"]."' AND ParticipantID='".$_POST["id"]."'"); //מניעת רישום כפול
$result= $result->num_rows;


if($result>0)
{
    $error="המשתמש שהוזן כבר רשום לחוג המבוקש, ניתן להירשם לחוג אחר";
    header("Location: http://coralil.mtacloud.co.il/Registration.php?msg=".$error);
		die();

}

else

$result=$conn->query("SELECT * FROM Participant WHERE id='".$_POST["id"]."'"); //יוזר קיים, מבקש להירשם לחוג נוסף
$result=$result->num_rows;
if($result>0)
{
     $sql="insert into Participant_in_Hug(hugID,ParticipantID,paid) values";
    $sql.="('".$_GET["hugID"]."','".$_POST["id"]."','No')";
    
    if (!$conn->query($sql)){
    	$error= "Can not add user to Hug. Error is: ". $conn->error;
    	header("Location: http://coralil.mtacloud.co.il/Registration.php?msg=".$error);
    	exit();
    }
    header("Location: http://coralil.mtacloud.co.il/OKhug.php?pname=".$_POST["fullname"]."&hugID=".$_GET["hugID"]);
    die();
}

else
{  //יוזר חדש וחוג חדש

    //run sql
    
    if($_POST["ads"]=="on")
     $_POST["ads"]=1;
     else
     $_POST["ads"]=0;
    
    
    $sql="insert into Participant(fullname,id,email,telephone,age,ads) values";
    $sql.="('".$_POST["fullname"]."','".$_POST["id"]."','".$_POST["email"]."','".$_POST["tel"]."',".$_POST["age"].",".$_POST["ads"].")";
    
    
    
    
    if (!$conn->query($sql)){
    	$error= "Can not add new user. Error is: ". $conn->error;
    	header("Location: http://coralil.mtacloud.co.il/Registration.php?msg=".$error);
		
    	exit();
    }
    
    
    $sql="insert into Participant_in_Hug(hugID,ParticipantID,paid) values";
    $sql.="('".$_GET["hugID"]."','".$_POST["id"]."','No')";
    
    if (!$conn->query($sql)){
    	$error= "Can not add user to Hug. Error is: ". $conn->error;
    	header("Location: http://coralil.mtacloud.co.il/Registration.php?msg=".$error);
    	exit();
    }
    
    
    header("Location: http://coralil.mtacloud.co.il/OKhug.php?pname=".$_POST["fullname"]."&hugID=".$_GET["hugID"]);
		die();
    
}

?>