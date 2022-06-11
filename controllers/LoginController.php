<?php
session_start();
require_once '../models/LoginModel.php';

$_SESSION['con']=$_GET['con'];

class LoginController {
	private  $LoginM;
	private $username ;
	private $password;

	public function __construct($username,$password){
		$this->username = $username;
		$this->LoginM = new LoginModel();
		$this->password = $password;
	}

	public function checkForLogin(){

		
		$result = $this->LoginM->checkLogin($this->username,$this->password);
		if($result->rowCount()> 0){
			$roleAdmin =$result->fetch();
		  // if($_SERVER['REQUEST_URI']=="/gst/views/loginView.php?access=")
		  //   {
			    if($roleAdmin['typeUser']=="admin" )
			      {
			           header("Location:../views/adminDashboardView.php?access=".$roleAdmin['username']);
		          }
		          if($roleAdmin['typeUser']=="enseignant" )
			      {
			      	
			      	$_SESSION['idenseignant']=$roleAdmin['idU'];
			           // header("Location:../views/enseignantDashboardView.php?access=");
			      	header("location:EnseignantDashboardController.php?enseig=");
		          }
           // }
     //       elseif($_SERVER['REQUEST_URI']=="/gst/views/LoginEtudiantView.php?access=")
		   // {
		    	if($roleAdmin['typeUser']=="etudiant")
		          {
			           header("Location:../views/LoginView.php?access=failed");
		          }
		   // }
		}
		else
			header('Location:../views/LoginView.php?access=failed');
		
	}

    

}

// if(isset($_POST['button'])){
// 	 $tst = new LoginController($_POST['username'],$_POST['password']);
// 	 $tst->checkForLogin();
// }


$tst = new  LoginController($_POST['username'],md5($_POST['password']));
$tst->checkForLogin();


