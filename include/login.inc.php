<?php


	//start of the page
	echo "start of the page<br/>";

	if(isset($_POST["submit"])){
	//grabbing the data

	$uid = $_POST["uid"];
	$pwd = $_POST["pwd"];

	//instantiate logincontr class
	echo "instantiate logincontr class<br/>";
	include "../class/dbh.class.php";
	include "../class/login.class.php";
	include "../class/login-contr.class.php";
	$login= new LoginContr($uid,$pwd);
	
	//running error handlers and user logincontr
	echo "running error handlers and user logincontr<br/>";
	$login->loginUser();

	//going back to font page
	header("location:../index.php?error=none");

	}

?>