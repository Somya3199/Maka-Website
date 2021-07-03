<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <title>Sign In form</title>
  <link rel="stylesheet" href="css/style1.css">
</head>

<body>
  <div class="box">

    <form class="box" action="signin.php" method="post">

      <h1>Sign In Now</h1>

      <input type="text" class="input-box" name="Email" placeholder="Email" required>

      <input type="password" class="input-box" name="Password" placeholder="Password" required>

      <a href="#"> Forgot Your Password ?</a>
      <button type="submit" class="signin-btn">Sign in</button>
      <hr>
      <p class="or">OR</p>

      <button type="button" class="google-btn">Log in with Google+</button>
      <p>Don't have an account ? <a href="signup.html">Sign up</a></p>
      <hr>
      <h3>Want to work with us ?</h3>
      <button type="button" class="register-btn"><a href="https://forms.gle/8WAubdr2PQpAryrZ7"> Register Now !</a></button>


    </form>
  </div>

</body>

</html>

<?php
session_start();
?>

<?php 
      if(!isset($_SESSION['Email'])){ 
      header("Location: sign in.html"); 
      } 
     
    ?>

<?php
	
	$server="localhost";
	$username="root";
	$password="";
	$db="signup";
	$con=mysqli_connect($server, $username, $password, $db);
	if(!$con){
		die("Connection to this database failed due to ".mysqli_connect_error());
	}
	   $k = $_POST['Email'];  

     $_SESSION['Email']=$_POST['Email'];
$_SESSION['Password']=$_POST['Password'];
$_SESSION['f']=0;


  $sql="SELECT Email,Password from signup1";
  $result = $con->query($sql);

  
  while($row = $result->fetch_assoc()){
  if(strval($row["Email"])==$_SESSION['Email']){
     if(strval($row["Password"]==$_SESSION['Password'])){
      $f=1;
     break;
    }
    else{
      $f=2;
    }
 
  }
  
  
  //echo $v1.$uname;
  //echo $v2.$passw;
  //echo $v1==$uname;
  //echo $v2==$passw;
}
if($f==1){
  echo '<script>alert("Logged In Successfully..");</script>';
  echo("<script>window.location = 'signin.php';</script>");
  //header('Location:admin.php');
    //include("admin.html");
 }
 elseif($f==2){
  echo '<script>alert("Error..Wrong Username or Password");</script>';
  echo("<script>window.location = 'sign in.html';</script>");
  //header('Location:login.html');
 }
 else{
    echo '<script>alert("Register First");</script>';
    echo("<script>window.location = 'signup.php';</script>");
    //echo isset($_SESSION['uname']);
   
// opening a link 
    
//header('Location:login.html');

 }

  
    //echo "id: " . $row["uname"]. " - Name: " . $row["passw"];
?>
