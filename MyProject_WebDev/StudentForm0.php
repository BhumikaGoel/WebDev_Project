<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student's Form(0)</title>
<link rel="stylesheet" href="w3css.css">
<style>
/*html, body {
  font-family: "Monotype Corsiva", cursive, sans-serif;
}*/
body { 
height:320%;
   width:100%;
   background-image:url(colorful-polygons_23-2147513075.jpg);/*your background image*/  
   background-repeat:no-repeat;/*we want to have one single image not a repeated one*/  
   background-size:cover; 
}
</style>
<script type="text/javascript">
function education(val)
{
 var ele_12=document.getElementById('12text');
 var ele_grad=document.getElementById('gdtext');
 if(val=='12th')
  { 
     ele_12.style.visibility='visible';
     ele_grad.style.visibility='hidden';
  }
 else if(val=='Graduation') 
   {
	 ele_12.style.visibility='hidden';
	 ele_grad.style.visibility='visible';
   }
 else if(val=='10th')
	{
		ele_12.style.visibility='hidden';
		ele_grad.style.visibility='hidden';
		}
}
function degree(val)
{
	var element=document.getElementById('others');
    if(val=='Others')
    {element.style.visibility='visible';}
	else
	{element.style.visibility='hidden';}
	
}
function signature()
{  
    document.getElementById("sign").required = true;
}
function getdate()
{
  document.getElementById("checkdate").required = true;
  document.getElementById("dates").innerHTML = Date(); 
}

function imgdisplay()
{
	var x = document.getElementById("imgform");
	var x1 = new XMLHttpRequest();	
	x1.open('POST','StudentFormImgCode.php',true);
	
	var data = new FormData(x);
	x1.send(data);
	
	x1.onreadystatechange = function()
	{
	if(x1.readyState == 4 && x1.status == 200)
	   {
		document.getElementById("pdiv").innerHTML = x1.responseText;
}}}
</script>
</head>
<body>


<!--THE ALERT DIV-->
<div class="w3-container w3-red w3-section w3-hover-pale-red w3-card-8">
<span class="w3-closebtn" onClick="this.parentElement.style.display='none'">X</span>
<p>Please DO NOT press Back or Refresh Button.</p>
</div>



<!--THE USER IMAGE DIV-->
<form id="imgform">
<div id="pdiv" style="margin-left:850px; margin-top:150px;" class="w3-card-4 w3-border-indigo w3-round-large">
<header class="w3-container"><center>Upload photo here</center>
<input type="file" name="file1" style="margin-left:-15px; margin-top:5px;"/></header><br/>
<center><input type="button" name="upload" value="Upload" onClick="imgdisplay();" class="w3-hover-green"/></center></br>
</div>
</form>

<!--THE MAIN FORM DIV-->
<div id="maindiv" class="w3-round-xlarge w3-section w3-border-indigo">
<form action="StudentForm0_php.php" method="post" enctype="multipart/form-data" name="form1" class="w3-container">
<font face="Monotype Corsiva" size="+2"><b>

<br/>
<p>
<input class="w3-input w3-round w3-border w3-border-indigo" type="text" name="name" style="height:40px; width:500px" required>
<label class="w3-label w3-validate">Full Name</label>
</p>


<div>
<label class="w3-label w3-validate w3-text-black">Gender</label><br/>
<select name="gnd" style="width:100px; height:40px;" class="w3-round w3-border w3-border-indigo">
<option class="w3-hover-teal">Male</option>
<option class="w3-hover-teal">Female</option>
</select><br>
</div>

<div style="margin-top:-77px; margin-left:235px">
<label class="w3-label w3-validate w3-text-black">DOB</label><br/>
<input type="date" name="dob" style="font-family:'Monotype Corsiva'; font-size:large; height:40px; margin-top:-3px" class="w3-round w3-border w3-border-indigo">
<br></div>

<br>
<p>
<input class="w3-input w3-round w3-border w3-border-indigo" type="text" name="con" style="height:40px; width:500px" maxlength="10" required>
<label class="w3-label w3-validate">Contact no.</label>
</p>

<p>
<input class="w3-input w3-round w3-border w3-border-indigo" type="text" name="ftname" style="height:40px; width:500px">
<label class="w3-label w3-text-black">Father's Name</label>
</p>

<p>
<input class="w3-input w3-round w3-border w3-border-indigo" type="text" name="ftcon" style="height:40px; width:500px" maxlength="10">
<label class="w3-label w3-text-black">Father's Contact no.</label>
</p>

<p>
<input class="w3-input w3-round w3-border w3-border-indigo" type="text" name="adr" style="height:40px; width:700px">
<label class="w3-label w3-text-black">Address</label>
</p>

<p>
<input class="w3-input w3-round w3-border w3-border-indigo" type="text" name="email" style="height:40px; width:500px">
<label class="w3-label w3-text-black">Email Address</label>
</p>

<div>
<label class="w3-label w3-text-black">Highest Educational Qualification</label><br>
<select id="edumenu" name="edumenu" onChange="education(this.value);" style="width:200px; height:40px;" class="w3-round w3-border w3-border-indigo">
<option selected>--- Choose One ---</option>
<option value="10th">10th</option>
<option value="12th">12th</option>
<option value="Graduation">Graduation</option>
</select>
<input type="text" name="12text" id="12text"  placeholder="Enter %age marks in 12th" style="visibility:hidden;
margin-left:280px; margin-top:-40px; height:40px; width:300px" class="w3-round w3-border w3-border-indigo w3-input"/>
<input type="text" name="gdtext" id="gdtext"  placeholder="Enter degree" style="visibility:hidden; 
margin-left:280px; margin-top:-40px; position:absolute; height:40px; width:300px" class="w3-round w3-border w3-border-indigo w3-input"/>
</div>
<br>
<label class="w3-label w3-validate w3-text-black">Degree pursuing</label><br />
<select id="degmenu" name="degmenu" onChange="degree(this.value);" style="width:200px; height:40px;" class="w3-round w3-border w3-border-indigo">
<option selected>--- Choose One ---</option>
<option>BCA</option>
<option>B.Com</option>
<option>B.Sc(Comp)</option>
<option>B.Tech</option>
<option value="Others">Others</option></select>
<input type="text" name="others" id="others" style="visibility:hidden; margin-left:55px;" placeholder="Please Specify" class="w3-round w3-border w3-border-indigo"/>
<br>
<br />


<label class="w3-label w3-validate w3-text-black">Year</label><br />
<select id="yrmenu" name="yrmenu" style="width:200px; height:40px;" class="w3-border-indigo w3-round w3-border">
<option selected>--- Choose One ---</option>
<option>1st Year</option>
<option>2nd Year</option>
<option>3rd Year</option>
<option>4th Year</option>
</select><br /><br />


<p>
<input class="w3-input w3-round w3-border w3-border-indigo" type="text" name="inst" style="height:40px; width:700px">
<label class="w3-label w3-text-black">Name of Institution</label>
</p>

<p>
<label class="w3-label w3-text-black">Intended Course(s)
<font size="3" face="Times New Roman, Times, serif">(Press Ctrl for multiple selections)</font></label><br />
<select multiple="multiple" name="course[]" class="w3-round w3-border w3-border-indigo">
<option >C</option>
<option>C++</option>
<option>Java</option>
<option>HTML</option>
<option>CSS</option>
<option>Javascript</option>
<option>PHP</option>
</select>
<br /><br />


<label class="w3-label w3-validate w3-text-black">Preferred Time</label><br />
<select name="timing" style="width:200px; height:40px;" class="w3-round w3-border w3-border-indigo">
<option selected>-- Choose One --</option>
<option>Morning</option>
<option>Afternoon</option>
<option>Evening</option>
</select>
<br /><br />


<p>
<label class="w3-label w3-text-black">The above information is correct to the best of your knowledge.<br/>
Please sign with your initials as an acknowledgement.</label>
<input class="w3-input w3-round w3-border w3-border-indigo" type="text" placeholder="for example B.G." name="sign" onClick="signature()" style="height:40px; width:300px">
</p>

<p id="dates"><input type="checkbox" id="checkdate" onClick="getdate()">
Dated Today</p>
</b></font>

<?php
$_SESSION['ses_submit']=11;
?>
<!--<input type="submit" value="Submit" name="sub" id="subbtn" class="w3-btn w3-light-grey w3-hover-green w3-round-xlarge w3-ripple w3-xlarge"/>-->
<center><button onclick="document.getElementById('id01').style.display='block'" class="w3-btn w3-light-grey w3-hover-green w3-round-xlarge w3-ripple w3-xlarge" name="haha" type="button">Submit</button></center>

<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-card-8" style="width:500px">
    <header class="w3-container w3-deep-orange">
       <h2>Confirm Submission?</h2>
    </header>
        <div class="w3-container">
            <center><p><input type="submit" value="Yes" name="sub" id="subbtn" class="w3-btn w3-light-grey w3-hover-green w3-round-xlarge w3-ripple w3-xlarge" style="font-family:Georgia, 'Times New Roman', Times, serif; margin-left:-50px;"/></p><br/><br/>
            <p><b><input type="button" value="No" name="no" id="no" class="w3-btn w3-light-grey w3-hover-red w3-round-xlarge w3-ripple w3-xlarge" onclick="document.getElementById('id01').style.display='none'" style="font-family:Georgia, 'Times New Roman', Times, serif;"/><b></p></center>
        </div>
    </div>
</div>
<br /><br />
</form>
&nbsp;&nbsp;&nbsp;<a href='http://www.freepik.com/free-vector/colorful-polygons_794801.htm'>Background Design by Freepik</a>
</div>
</body>
</html>
