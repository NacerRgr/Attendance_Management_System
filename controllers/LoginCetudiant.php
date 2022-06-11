<?php
session_start();
$_SESSION['con']=$_GET['con'];
   require_once '../models/LoginModel.php';
class LoginCEtudiant {
	private  $LoginM;
	private $apogee ;
	private $password;

	public function __construct($apogee,$password){
		$this->username = $apogee;
		$this->LoginM = new LoginModel();
		$this->password = $password;

	}

	public function checkForLogin(){	

		$result = $this->LoginM->checkLogin($this->username,$this->password);
		$roleEtudiant =$result->fetch();
		
		if($result->rowCount()> 0){
			// $roleEtudiant =$result->fetch();
		  // if($_SERVER['REQUEST_URI']=="/gst/views/loginView.php?access=")
		  //   {
			    if($roleEtudiant['typeUser']=="etudiant" )
			      {
			           header("Location:../controllers/EtudiantCdashboard.php?access=&dashetu=");
		          }
		          if($roleEtudiant['typeUser']=="admin" || $roleEtudiant['typeUser']=="enseignant" )
			      {
			           header("Location:../views/LoginEtudiantView.php?access=failed");
		          }
           // }
     //       elseif($_SERVER['REQUEST_URI']=="/gst/views/LoginEtudiantView.php?access=")
		   // {
		    	
		   // }
		}
		else
			header('Location:../views/LoginEtudiantView.php?access=failed');
		
	}

    

}

// if(isset($_POST['button'])){
// 	 $tst = new LoginController($_POST['username'],$_POST['password']);
// 	 $tst->checkForLogin();
// }


$_SESSION['con']=$_GET['con'];
$_SESSION['userEtudiant']=$_POST['username'];
$_SESSION['passwordEtudiant']=$_POST['password'];
$tst = new LoginCEtudiant($_POST['username'],md5($_POST['password']));
$tst->checkForLogin();

?>