<?php
	if(isset($_POST['Name'])){
	$server="localhost";
	$username="root";
	$password="";
	$db="signup";
	$con=mysqli_connect($server, $username, $password, $db);
	if(!$con){
		die("Connection to this database failed due to ".mysqli_connect_error());
	}
	$Name=$_POST['Name'];
	$Email=$_POST['Email'];
	$Phone=$_POST['Phone'];
	$Address=$_POST['Address'];
	$Password=$_POST['Password'];
	$Retype=$_POST['Retype'];
	

	$sql="INSERT INTO signup1 (`Username`, `Email`, `Phone`, `Address` , `Password`, `Retype`, `FacebookId`, `GoogleId`, `Date`) 
	VALUES ('$Name', '$Email', '$Phone', '$Address', '$Password', '$Retype', '', '', CURRENT_TIMESTAMP);";
	if($con-> query($sql)==TRUE){
		echo " ";
	}
	else{
		echo "ERROR: $sql <br> $con->error";
		
	}
	$con->close();
	}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="css/style1.css">
  <?php 
session_start();

      if(!isset($_SESSION['Email'])){ 
      header("Location: signup.html"); 
      } 
 
    ?>
</head>
<body>

    <div class="box">

    <form class="box" action="signup.php" method="post">
      
      <h1>Sign Up Now</h1>
      <input type="text" class="input-box" name="Name" placeholder="Username" required>
  		<input type="text" class="input-box" name="Email" id="myEmail" placeholder="Email" onchange=" myFunction()">
  		<input type="text" class="input-box" name="Phone" placeholder="Phone no." required>
  		<input type="text" class="input-box" name="Address" placeholder="Address" required>
  		<input type="password" class="input-box" name="Password" id="p1" placeholder="Password" required>
      <input type="password" class="input-box" name="Retype" id="p2" placeholder="Retype Password" required>
      <p><span><input type="checkbox" onclick="incor()" required></span>I agree to the terms of services</p>
      <button name="Sign up"class="signup-btn">Sign Up</button>
      <hr>
      <p class="or">OR</p>

        <button type="button" class="google-btn">Log in with Google+</button>
        <p>Do you have an account ? <a href="sign in.html">Sign in</a></p>
	<script type="text/javascript">
		 function incor()
		 {
			
			var x=document.getElementById("p1").value;
			var y=document.getElementById("p2").value;
			if(x!=y)
			 alert("Retype password should be same as Password");
		 }
		function myFunction() {
			var str = document.getElementById("myEmail").value;
			var pos = str.indexOf("@gmail.com");

			if(pos==-1)
			{
				alert("this field must contain @gmail.com ");
				}
			}
		</script>				
    </form>
</div>

</body>

</html>
