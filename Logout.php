<?php
	session_start();
	//echo "Hii" .$_SESSION["UserID"];
	unset($_SESSION["UserName"]);
	unset($_SESSION["IsVerified"]);
	session_destroy();
	//echo "Hii" .$_SESSION["UserID"];
	header("location:index.php");
?>