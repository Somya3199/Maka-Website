<?php
	$server="localhost";
	$username="root";
	$password="";
	$db="signup";
	$con=mysqli_connect($server, $username, $password, $db);
	if(!$con){
		die("Connection to this database failed due to ".mysqli_connect_error());
	}
	$pick_up=$_POST['pick'];
	$drop_off=$_POST['drop'];
	$date=$_POST['date'];
	$time_slot=$_POST['time'];
	

	$sql="INSERT INTO bookings (`pick_up`, `drop_off`, `date`, `time_slot`) 
	VALUES ('$pick_up', '$drop_off', '$date', '$time_slot');";
	if($con-> query($sql)==TRUE){
		echo "Booking Successful";
	}
	else{
		echo "ERROR: $sql <br> $con->error";
		
	}
	$con->close();
	

	if(isset($_POST['submit'])){
		$pick_up=$_POST['pick'];
		$drop_off=$_POST['drop'];
		$date=$_POST['date'];
		$time_slot=$_POST['time'];
		$email='unknown'

		$to='infoofmaka@gmail.com'; // Receiver Email ID, Replace with your email ID
		$subject='Form Submission';
		$message="Pick Up :".$pick_up."\n"."Drop Off :".$drop_off."\n"."Date :".$date."\n"."Time Slot :".$time_slot."\n";
		$headers="From: ".$email;

		if(mail($to, $subject, $message, $headers)){
			echo "<h1>Booking Email Sent Successfully! Thank you, We will reach out to you shortly!</h1>";
		}
		else{
			echo "Something went wrong!";
		}
	}
?>