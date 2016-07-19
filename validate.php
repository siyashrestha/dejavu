<?php 
ob_flush();
$con=mysqli_connect('localhost','root','');
$flag = 0;

if(!$con){
	echo "not connected to server";
	}
	if(!mysqli_select_db($con,'registration')){
		echo "database not selected<br>";
	}
	
	$Fname=$_POST['fname'];
	if (strlen(trim($_POST['fname']))<3){
	echo "enter valid name<br />";
	$flag = 1;
	}
	$Lname=$_POST['lname'];
	$Age=$_POST['age'];
		if($_POST['age']!=strval(intval($_POST['age']))){
	echo "your age must be a number<br />";
	$flag = 1;
	}
	
	$Address=$_POST['address'];
	
	$Pno=$_POST['phone_number'];
	$numbersOnly = ereg_replace("[^0-9]", "", $Pno);
	//echo $numbersOnly;
	$numberOfDigits = strlen($numbersOnly);
	if ($numberOfDigits == 7 or $numberOfDigits == 10 && is_numeric($numbersOnly)) {
		} else {
			echo 'Invalid Phone Number<br>';
			$flag = 1;
		}
	
	$Email=$_POST['email'];
	if(!preg_match('/^[^@\s]+@[-a-z0-9+\.]+[a-z]{2,}$/i',$_POST['email'])){
	echo "please enter a valid email<br />";
	$flag = 1;
	}
	
	$Password=$_POST['pass'];
	$Gender=$_POST['gender'];
	$sql="INSERT INTO signup(First_Name,Last_Name,Age,Address,Email,Phone_number,Password,Gender) VALUES 
							('$Fname','$Lname','$Age','$Address','$Pno','$Email','$Password',$Gender)";
	
	 if(!$flag){
		 if(!mysqli_query($con,$sql)){
			echo "not inserted<br>";
		}else
		{
			echo "inserted<br>";
		} 
	 }
	 else{
		 echo "<br /> please insert a valid record<br>";
	 }
	
?>
<a href="register.html"> Register again</a>