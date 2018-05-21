<?php
session_start();
if(isset($_COOKIE['user_cookie']))
{
	$data=$_SESSION['CSRF_Token'];
	echo $data;	
}
?>