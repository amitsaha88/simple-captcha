<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Captcha - Without page refresh</title>

<!--This is the simple javascript for the captcha and validating it after submit-->
<script type="text/javascript">
function refresh_captcha()
{
	var rand=Math.round(Math.random()*1000);

	document.getElementById('generated_captcha_code').value=rand;

	return document.getElementById('captcha_code').value='',document.images['captchaimg'].src = document.images['captchaimg'].src.substring(0,document.images['captchaimg'].src.lastIndexOf("?"))+"?rand="+rand;
	
	document.getElementById("error_messagecaptcha").innerHTML='';
	document.getElementById("captcha_code").style.border="1px solid #282828";	
}

function check_captcha()
{
	var gencode = document.getElementById("generated_captcha_code").value;

	var usercode = document.getElementById("captcha_code").value;
	if(!usercode.match(/\S/))
	{
		document.getElementById("error_messagecaptcha").innerHTML='<span class="req">You forgot to enter the captcha code!</span>';
		document.getElementById("captcha_code").focus();

		document.getElementById("captcha_code").style.border="1px solid red";
		return false;
	}
	else
	{
		document.getElementById("error_messagecaptcha").innerHTML='';
		document.getElementById("captcha_code").style.border="1px solid #282828";
		
	}
	if(usercode!=gencode)
	{

		document.getElementById("error_messagecaptcha").innerHTML='<span class="req">Captcha does not match!</span>';

		document.getElementById("captcha_code").focus();

		document.getElementById("captcha_code").style.border="1px solid red";

		refresh_captcha();

		return false;

	}
	else
	{
		document.getElementById("error_messagecaptcha").innerHTML='<span class="success">GOOD!!! Valid Captcha.</span>';
		
		document.getElementById("captcha_code").style.border="1px solid #282828";

	}
}

</script>
<!--Script end, you can copy and paste it in your php file-->

<!--Just to style the notification messages-->
<style type="text/css">
.success{ color:#0C0; font-weight:bold;}
.req{ color:#F00;font-weight:bold;}
</style>

</head>

<body>
<!------------------ Captcha Code DIV --------------------------->
<div align="center">

<h1>Simple Captcha - without page refresh</h1>

				<form id="captcha_form" name="captcha_form"><!-- captcha form (not neccessary) -->

                <div id="error_messagecaptcha"></div>
				<br />

                <label class="text" for="addr1">Enter below Captcha <font class="req">*</font></label><br>
                
                <input id="generated_captcha_code" value="<?php echo $r=rand(100,99999); ?>" type="hidden"/>
                <div align="center">
                <br>
                <div class="captcha_wrapper">
                <img src="captchagen.php?rand=<?php echo $r; ?>" id='captchaimg' >
                </div>
                
                <div class="text">
                Can't read? <a href="javascript:void(0);" class="refresh_captcha" onclick="refresh_captcha()">Refresh captcha</a> 
                </div>
    
    			</div>
                <br><br>
                <div class="div_text">
                <input type="text" class="textbox" id="captcha_code" name="captcha_code" placeholder="Enter captcha code here (case sensitive)" style="width: 250px;">
                </div>
                <br />
                
                <input type="button" id="Submit" value="Submit" onclick="return check_captcha()" />
                
                </form>

</div>
<!-- Captcha Code DIV End  -->                
</body>
</html>
