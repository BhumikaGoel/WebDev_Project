<?php
session_start();


if(isset($_SESSION['Serial'])){

if(isset($_SESSION['ses_submit']))
{
$name=$_POST['name'];
$gender=$_POST['gnd'];
$dob=$_POST['dob'];
$con=$_POST['con'];
$ftname=$_POST['ftname'];
$ftcon=$_POST['ftcon'];
$adr=$_POST['adr'];
$email=$_POST['email'];
$edumenu=$_POST['edumenu'];
$text12=$_POST['12text'];
$gdtext=$_POST['gdtext'];
$degmenu=$_POST['degmenu'];
$others=$_POST['others'];
$yrmenu=$_POST['yrmenu'];
$inst=$_POST['inst'];
$timing=$_POST['timing'];
$sign=$_POST['sign'];

$i=0;
$arr=array();
foreach($_POST['course'] as $selectedOption)
{
	$arr[$i]=$selectedOption;
	$i++;
}

$limit=count($arr);
$array=serialize($arr);
$_SESSION['array']=$array;

$conn=mysqli_connect('localhost','root','','computer');
//echo "conn established";
mysqli_query($conn,"update regform set Full_Name='".$name."', Gender='".$gender."', DOB='".$dob."', Contact='".$con."',Father_Name='".$ftname."', Father_Contact='".$ftcon."', Address='".$adr."', Email='".$email."', EduQualify='".$edumenu."', Edu12_marks='".$text12."',EduGrad_deg='".$gdtext."', Deg_Pursuing='".$degmenu."', Deg_Specify='".$others."', Year='".$yrmenu."', Inst_Name='".$inst."',Course='".$array."',Pref_Time='".$timing."',Sign='".$sign."' where Serial_Number='".$_SESSION['Serial']."'"); 
//echo "after query";



$conn=mysqli_connect("localhost","root","","computer");
$i=0;
for($i=0;$i<$limit;$i++)
{
 $z=mysqli_query($conn,"select fee from feestructure where course_name='".$arr[$i]."'");
 $row = mysqli_fetch_assoc($z);
 $coursefee[$i]=$row['fee'];
}


$_SESSION['ser_coursefee']=serialize($coursefee);
//and $arr is already serialized to $array.
$_SESSION['feesum']=array_sum($coursefee);

header("location:StudentForm1_php.php?n=".$_SESSION['feesum']." &m=".$_SESSION['array']." &p=".$_SESSION['ser_coursefee']."");
}
}


else{
	
if(isset($_SESSION['ses_submit']))
{
$name=$_POST['name'];
$gender=$_POST['gnd'];
$dob=$_POST['dob'];
$con=$_POST['con'];
$ftname=$_POST['ftname'];
$ftcon=$_POST['ftcon'];
$adr=$_POST['adr'];
$email=$_POST['email'];
$edumenu=$_POST['edumenu'];
$text12=$_POST['12text'];
$gdtext=$_POST['gdtext'];
$degmenu=$_POST['degmenu'];
$others=$_POST['others'];
$yrmenu=$_POST['yrmenu'];
$inst=$_POST['inst'];
$timing=$_POST['timing'];
$sign=$_POST['sign'];

$i=0;
$arr=array();
foreach($_POST['course'] as $selectedOption)
{
	$arr[$i]=$selectedOption;
	$i++;
}

$limit=count($arr);
$array=serialize($arr);
$_SESSION['array']=$array;

/*alternatively, could have used:
for($i=0;$i<$limit;$i++)
{
	$varcourse=$varcourse.",".$arr[$i];
}*/

$conn=mysqli_connect('localhost','root','','computer');

mysqli_query($conn,"insert into regform(Full_Name,Gender,DOB,Contact,Father_Name,Father_Contact,Address,Email,EduQualify,Edu12_marks,EduGrad_deg,Deg_Pursuing,Deg_Specify,Year,Inst_Name,Course,Pref_Time,Sign) values('".$name."','".$gender."','".$dob."','".$con."','".$ftname."','".$ftcon."','".$adr."','".$email."','".$edumenu."','".$text12."','".$gdtext."','".$degmenu."','".$others."','".$yrmenu."','".$inst."','".$array."','".$timing."','".$sign."')");

$conn=mysqli_connect("localhost","root","","computer");
$i=0;
for($i=0;$i<$limit;$i++)
{
 $z=mysqli_query($conn,"select fee from feestructure where course_name='".$arr[$i]."'");
 $row = mysqli_fetch_assoc($z);
 $coursefee[$i]=$row['fee'];
}


$_SESSION['ser_coursefee']=serialize($coursefee);
//and $arr is already serialized to $array.
$_SESSION['feesum']=array_sum($coursefee);
echo"without variable";
header("location:StudentForm1_php.php?n=".$_SESSION['feesum']." &m=".$_SESSION['array']." &p=".$_SESSION['ser_coursefee']."");
}
}



?>