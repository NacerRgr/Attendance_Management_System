<?php
session_start();
$_SESSION['con']=0;

if(isset($_GET['gg'])&&($_SESSION['con']==0)){
	header("location:../views/loginView.php?access=");

}
	if(isset($_GET['ss'])&&($_SESSION['con']==0))
	{
	
	header("location:../views/loginView.php?access=");
	}
	if(isset($_GET['ee'])&&($_SESSION['con']==0))
	{
	
	header("location:../views/LoginEtudiantView.php?access=");
	}
?>