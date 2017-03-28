<?php
session_start();
echo '<link href="w3css.css" rel="stylesheet">';

        $x = $_FILES['file1']['name'];
	
		$conn=mysqli_connect("localhost","root","","computer");
        mysqli_query($conn,"insert into regform(Serial_Number) values('')");
		
		$x1 = mysqli_query($conn,"select max(Serial_Number) from regform");
		$row = mysqli_fetch_array($x1);
        
			
		if($_FILES['file1']['type'] == 'image/jpeg')
		{		
		  move_uploaded_file($_FILES['file1']['tmp_name'],"".$row[0].'.jpeg');
		  mysqli_query($conn,"update regform set Picture='".$row[0].".jpeg' where Serial_Number='".$row[0]."'");
		}
		
		if($_FILES['file1']['type'] == 'image/jpg')
		{		
		  move_uploaded_file($_FILES['file1']['tmp_name'],"".$row[0].'.jpg');
		  mysqli_query($conn,"update regform set Picture='".$row[0].".jpg' where Serial_Number='".$row[0]."'");
		}
		
		if($_FILES['file1']['type'] == 'image/png')
		{		
		  move_uploaded_file($_FILES['file1']['tmp_name'],"".$row[0].'.png');
		  mysqli_query($conn,"update regform set Picture='".$row[0].".png' where Serial_Number='".$row[0]."'");
		}
		
		
$_SESSION['Serial'] = $row[0];
		
$y=mysqli_query($conn,"select Picture from regform where Serial_Number='".$_SESSION['Serial']."'");
$row = mysqli_fetch_assoc($y);
echo "<img src='".$row['Picture']."' height='223' width='203' class='w3-border w3-hover-opacity'>";

      
		
	
		
?>