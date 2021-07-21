<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="Style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>רישום לחוג</title>
		
		
		
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
		var txt=document.getElementById("fullname");
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

		function onlyDigits(nameof)
		{
		var txt=document.getElementById(nameof);
		var length=txt.value.length-1;
			if(!(txt.value.charAt(length)>='0'&&txt.value.charAt(length)<='9'))
				{
					txt.value="";
					txt.style.borderColor="red";
					txt.placeholder="נא להקליד מספרים בלבד";
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

		function IDValidation()
		{
		    var txt = document.getElementById("id");
		    if (txt.value.length < 9)
		    {
		        window.alert("מספר זהות קטן מדי");
		        txt.style.borderColor = "red";
		        return false;

		    }
		    else
		        txt.style.borderColor = "inherit";

		    return true;
		}

		function validateAll()
		{
		    return TelValidation() && onlyHebrew() && onlyDigits('age') && onlyDigits('tel') && onlyDigits('id') && IDValidation();
		} 


        </script>	

</head>
	<body dir="rtl">
<iframe src="header.html"  class="frameEmbadding" scrolling="no"></iframe> 
	

	<main>
  	<br><h1 class="user_msg">רישום לחוג</h1>
        <?php
			if(!empty($_GET['msg']))
			echo '<div id="validation_response" onclick="this.parentNode.removeChild(this)" align="center" title="לחץ לסגירת ההערה">X| '.$_GET['msg'].'</div>';
			?>
	<form id="RegistrationForm" method ="post" action=<?php echo "addParticipant.php?hugID=".$_GET["hugID"] ?> onsubmit="return validateAll()">

	
		<p class="text-form"><b>שם מלא<span class="contact">*</span></b><br><input onkeyup="onlyHebrew()" id="fullname" name="fullname" placeholder="שם מלא" type="text" required/></p>
		
		<p class="text-form"><b>תעודת זהות<span class="contact">*</span></b><br><input id="id" name="id" maxlength="9" onkeyup="onlyDigits('id')" onfocusout="IDValidation()" placeholder="תעודת זהות" type="text" required/></p>

		<p class="text-form"><b>כתובת מייל<span class="contact">*</span></b><br><input id="email" name="email" placeholder="כתובת מייל" type="email" required/></p>
		
		<p class="text-form"><b>טלפון נייד<span class="contact">*</span></b><br><input id="tel" name="tel" maxlength="10" onkeyup="onlyDigits('tel')" onfocusout="TelValidation()" placeholder="טלפון נייד" type="tel" required/></p>
		<p class="text-form"><b>גיל<span class="contact">*</span></b><br><input id="age" maxlength="2" name="age" onkeyup="onlyDigits('age')" placeholder="גיל" type="text" required/></p>
		
		
				
		
		<p>קראתי ואני מאשר/ת את התקנון<input type="checkbox" name="takanon" required/><span id="contact"> *</span></p>
		
		<br><p>אני מסכים לקבל חומר שיווקי<input type="checkbox" name="ads"></p>

		<p>
            <input id="SubmitBtn" name="SubmitBtn" type="submit" value="רישום" /> <br />
        <input id="ResetBtn" name="ResetBtn" type="reset" value="נקה" />
        </p>

		
    </form>
	
</main>
     
			  <a href="#top"> <img id="upicon" title="חזרה לראש הדף" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.6"  src="CSS/pics/up.png" ></a>
<iframe src="footer.html"  class="frameEmbadding" scrolling="no"></iframe> 

</body>

</html>