<?php
session_start();

if(isset($_SESSION['check']))
{   
    $_SESSION['no_instl']=$_REQUEST['g'];
	
	echo "<center>Your total payable fee is ".$_SESSION['feesum']."</center>";
	
	echo "\n";
	
   	$_SESSION['eachinstl']=$_SESSION['feesum']/$_SESSION['no_instl'];
	
	echo "<center>Each installment amounts to ".$_SESSION['eachinstl']."</center>";
		
	
    $conn=mysqli_connect('localhost','root','','computer');
    mysqli_query($conn,"update regform set no_installments=".$_SESSION['no_instl'].", total_fee=".$_SESSION['feesum'].",pending_fee=".$_SESSION['feesum']."");

   echo "<center>"."<a href='End_Page.html'>"."Continue"."</a>"."</center>";
}

else 
{   	
    $_SESSION['feesum']=$_REQUEST['n'];

    $_SESSION['array']=$_REQUEST['m'];
    $_SESSION['arr']=unserialize($_SESSION['array']);


    $_SESSION['ser_coursefee']=$_REQUEST['p'];
    $_SESSION['coursefee']=unserialize($_SESSION['ser_coursefee']);
	header("location:StudentForm1.php");
}

?>