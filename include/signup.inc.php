<?php


	//start of the page
	echo "start of the page<br/>";

	if(isset($_POST["submit"])){
	//grabbing the data

	$uid = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdRepeat"];
	$email = $_POST["email"];
	

	//instantiate signupcontr class
	echo "instantiate signupcontr class<br/>";
	include "../class/dbh.class.php";
	include "../class/signup.class.php";
	include "../class/signup-contr.class.php";
	$signUser= new SignupContr($uid,$pwd,$pwdRepeat,$email);
	
	//running error handlers and user signupcontr
	echo "running error handlers and user signupcontr<br/>";
	//echo "$uid,$pwd,$pwdRepeat,$email";
	$signUser->signupUser();

	//going back to font page
	echo "going back to font page";
	header("location:../index.php?error=none");




		}



?>