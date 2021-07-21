<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="Style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>אישור פניה</title>
		

</head>
	<body dir="rtl">
<iframe src="header.html"  class="frameEmbadding" scrolling="no"></iframe> 
	<center>

	<main>
	<br><h1 class="user_msg"> תודה שפניתם אלינו!</h1><br>
	
	<br><h3 class="user_msg"> 	קיבלנו את הפנייה. נחזור אליכם בהקדם האפשרי.</h3><br>
	<?php
	if(!empty($_GET['confirmation']))
	{
	    ?>
	<br><h3 class="user_msg">מס' פנייתך במערכת הוא: 
	<a href="javascript:window.print()" title="לחץ להדפסת המסך"><?php echo $_GET['confirmation'] ?></a>
	</h3><br>
	
	<?php
	}
?>
	
	<a href="index.html">לחזרה לדף הבית</a>
<br><br><br><br><br><br><br><br><br><br>

</main>

<iframe src="footer.html"  class="frameEmbadding" scrolling="no"></iframe> 

</body>

</html>