<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student's Form(1)</title>
<link rel="stylesheet" href="w3css1.css">
</head>
<style>
#quesdiv
{
	border-color:#000;
	border:hidden;
	margin-left:300px;
	margin-top:170px;
	position:absolute;
	height:170px;
	width:700px;
	
}
#divcalc
{
	border:hidden;
	border-color:#000;
	margin-top:340px;
	position:absolute;
	height:80px;
	width:700px;
	margin-left:300px;
}
body { 
height:100%;
   width:100%;
   background-image:url(colorful-polygons_23-2147513075.jpg);/*your background image*/  
   background-repeat:no-repeat;/*we want to have one single image not a repeated one*/  
   background-size:cover; 
}
</style>
<script>
	function calculation()
	{
    var t=document.getElementById("instl").value;
	
	var x2 = new XMLHttpRequest();	
	x2.open('POST','StudentForm1_php.php?g='+t,true);
	x2.send();
	x2.onreadystatechange = function()
	{
	if(x2.readyState == 4 && x2.status == 200)
	   {
		  document.getElementById("divcalc").style.visibility='visible';
		  document.getElementById("divcalc").innerHTML = x2.responseText;
		 // alert(x2.responseText);
		}
    	
	}
	}
</script>

<body background="bgimage.jpg">
<form action="StudentForm1_php.php" method="post">
<?php
$_SESSION['check']=19;
?>
<font face="Monotype Corsiva" size="+2"><b>

<!--add w3.css container tags for the two divs here-->
<div id="quesdiv">
<center><br/>List the number of installments you would like to pay in:</center><br/>
<center><select id="instl" name="instl" style="width:150px; height:40px;" class="w3-round w3-border w3-border-indigo">
<option selected>-Choose One-</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select></center><br />
<center><button type="button" name="calculate" onclick="calculation();" class="w3-btn w3-grey w3-hover-green w3-round-xlarge w3-ripple w3-xlarge">Calculate</button></center>
</div> <br /><br /><br />
<div id="divcalc"></div>
</b>
</font>

</form>
</body>
</html>



