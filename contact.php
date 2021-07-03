<?php
	$server="localhost";
	$username="root";
	$password="";
	$db="contact";
	$con=mysqli_connect($server, $username, $password, $db);
	if(!$con){
		die("Connection to this database failed due to ".mysqli_connect_error());
	}
	$First_name=$_POST['First_name'];
	$Last_name=$_POST['Last_name'];
	$email=$_POST['Email'];
	$message=$_POST['msg'];
	

	$sql="INSERT INTO contact_info (`First_name`, `Last_name`, `Email`, `Message`) 
	VALUES ('$First_name', '$Last_name', '$email', '$message');";
	if($con-> query($sql)==TRUE){
		echo "Message received";
	}
	else{
		echo "ERROR: $sql <br> $con->error";
		
	}
	$con->close();
	


	if(isset($_POST['submit'])){
		$First_name=$_POST['First_name'];
		$Last_name=$_POST['Last_name'];
		$Email=$_POST['Email'];
		$msg=$_POST['msg'];

		$to='infoofmaka@gmail.com'; // Receiver Email ID, Replace with your email ID
		$subject='Form Submission';
		$message="First Name :".$First_name."\n"."Last Name :".$Last_name."\n"."Wrote the following :"."\n\n".$msg;
		$headers="From: ".$email;

		if(mail($to, $subject, $message, $headers)){
			echo "<h1>Sent Successfully! Thank you"." ".$First_name.", We will contact you shortly!</h1>";
		}
		else{
			echo "Something went wrong!";
		}
	}
?>