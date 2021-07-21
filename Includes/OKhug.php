<!DOCTYPE html>
<?php
if(empty($_GET["hugID"]))
die("direct access is not premitted");
?>
<html>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="Style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>אישור רישום</title>
		

</head>
	<body dir="rtl">
<iframe src="header.html"  class="frameEmbadding" scrolling="no"></iframe> 
	

	<main>
	<br><h1 class="user_msg"><?php echo $_GET["pname"] ?> היקר! </h1>
        <h1 class="user_msg">רישומך לחוג בנווה ימין בוצע בהצלחה!</h1><br>
	
	<br><h3 class="user_msg"> 	להלן פרטי החוג אליו נרשמת:</h3><br>
        <?php
	if(!empty($_GET['hugID']))
	{
        $sql="SELECT name,guideName,day,fromHour,toHour FROM Hugs WHERE hugID='".$_GET['hugID']."'";
        $conn=new mysqli("localhost","coralil_myuser","neveyamin","coralil_NeveYaminDB");
        $conn->query("SET character_set_connection = 'utf8', character_set_results = 'utf8', character_set_client = 'utf8'");
        $result=$conn->query($sql);
        $result=$result->fetch_assoc();
        ?>
	<br>
        <h5 class="user_msg"><u>שם החוג: </u><i><?php echo $result["name"]; ?></i> </h5><br />
        <h5 class="user_msg"><u>שם המדריך: </u><i><?php echo $result["guideName"]; ?></i> </h5><br />
        <h5 class="user_msg"><u>יתקיים ביום </u><i><?php echo $result["day"]; ?> </i></h5><br />
        <h5 class="user_msg"><u>מהשעה  </u><i><?php echo $result["fromHour"]; ?></i><u> עד השעה </u><i><?php echo $result["toHour"]; ?> </i></h5><br />

        <br />
        <h5 class="user_msg">אנו מאחלים לך הנאה מרובה בחוג! נשמח לראותך!</h5>
    <br>
    <div class="user_msg">
	<a href="javascript:window.print()" style="text-align:center">לחץ כאן להדפסת האישור</a><br>
	<a href="index.html" style="text-align:center">לחזרה לדף הבית</a>
	</div>
	<br>
	
	<?php
	}
?>
	

<br><br><br><br><br><br><br><br>

</main>

<iframe src="footer.html"  class="frameEmbadding" scrolling="no"></iframe> 

</body>

</html>