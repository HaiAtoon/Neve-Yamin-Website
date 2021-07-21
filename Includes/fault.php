<!DOCTYPE html>


<html>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="Style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>דיווח על תקלה</title>
		
		<script>
		
		window.onscroll = function() {TopButton()};
       function TopButton() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
               
                document.getElementById("upicon").style.opacity = 0.6;
				document.getElementById("accessability").style.display="block";
            }

            else{
			document.getElementById("upicon").style.opacity = 0;
            document.getElementById("accessability").style.display="none";
			}
        }


		
		
		function onlyHebrew()
		{
		var txt=document.getElementById("name");
		var length=txt.value.length-1;
			if(!((txt.value.charAt(length)>='א'&&txt.value.charAt(length)<='ת')||txt.value.charAt(length)==" "))
				{
					txt.value="";
					txt.style.borderColor="red";
					txt.placeholder="בבקשה להקליד שם בעברית";
					return false;
					
				}
				else
				txt.style.borderColor="inherit";
		
		return true;
		}
		
		function onlyDigits()
		{
		var txt=document.getElementById("tel");
		var length=txt.value.length-1;
			if(!(txt.value.charAt(length)>='0'&&txt.value.charAt(length)<='9'))
				{
					txt.value="";
					txt.style.borderColor="red";
					txt.placeholder="נא להקליד מספרים בלבד"
					return false;
					
				}
				else
				txt.style.borderColor="inherit";
		
		return true;
		}
		
		function TelValidation()
		{
		var txt=document.getElementById("tel");
		var length=txt.value.length;
			if(length<10)
				{
					window.alert("חסרות ספרות בטלפון");
					txt.style.borderColor="red";
					return false;
				}
				else
					if(txt.value.substring(0,2)!="05")
					{
					 window.alert("חייב להתחיל ב 05");
					txt.style.borderColor="red";
					return false;
					}
					else
				txt.style.borderColor="inherit";
		
		return true;
		}
		
		function validateAll()
		{
		    boli=TelValidation() && onlyHebrew() && onlyDigits();
		    return boli;
		} 
		
		</script>

</head>
	<body dir="rtl">
<iframe src="header.html"  class="frameEmbadding" scrolling="no"></iframe> 
	
	<header>
	<br><h1 class="user_msg">דיווח על תקלה</h1><br>
	
	<h3 class="user_msg">השאר/י פרטים ותלונה ואנו נדאג לטפל בנושא</h3><br>

	
	</header>

	<main>
	    
	    	<?php
		
		if(!empty($_GET['msg']))
			echo "<div id='validation_response' onclick='this.parentNode.removeChild(this)' title='לחץ לסגירת ההערה'>X| ".$_GET['msg']."</div>";
			
			?>
  	<form id="reportForm" method ="post" action="addReport.php" onsubmit="return validateAll()">

	
		<p><b>שם מלא<span class="contact">*</span></b><br><input onkeyup="onlyHebrew()" id="name" name='name' placeholder="שם מלא" type="text" required/></p>
		<br>
		
		<p><b>כתובת מייל<span class="contact">*</span></b><br><input id="email" name="email" placeholder="כתובת מייל" type="email" required/></p>
		<br>
		
		<p><b>טלפון נייד<span class="contact">*</span></b><br><input id="tel" name='tel' onkeyup="onlyDigits()" onfocusout="TelValidation()" placeholder="טלפון נייד" maxlength="10" type="tel" required/></p>
		<br>
		
		<p><b>תוכן התקלה<span class="contact">*</span></b><br><textarea class="fault_txtarea" rows="5" input id="comments" name='comments' placeholder="תוכן התקלה" required></textarea></p>
		<br>
		
		<p><b>העלאת תמונה</b><br><input id="img" name='img' placeholder="תמונה" type="file"/></p>
	
			<br>

		<p><input id="submit" name="submit" type="submit" value="שלח"></p>
		<br>
	
			<br><br>
    </form>
	
</main>


  <a href="#top"> <img id="upicon" title="חזרה לראש הדף" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.6"  src="CSS/pics/up.png" ></a>
<iframe src="footer.html"  class="frameEmbadding" scrolling="no"></iframe> 

</body>

</html>