<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<title></title>

	<style>
		body{
			background-color:#B8FFF9 ;
		}
	</style>
</head>
<body>


<div class="wrapper fadeInDown">
  <div id="formContent">

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="../icons/user-solid.svg" id="icon" alt="User Icon" />
    </div>
   

     
    <!-- Login Form -->
    <form method="POST" action="../controllers/LoginController.php?con=1">
      <div>
      <a href="LoginView.php?access=" id="link1"><img src="../icons/circle-dot-regular.svg" width="20px" height="20px" ></a>
        <label  id="radio1">Adm/Ens</label>
        <a href="LoginEtudiantView.php?access=" id="link1"><img src="../icons/rec.png" width="20px" height="20px" ></a>
  	    <label id="radio1">Etudiant</label>
  	  </div>
      
       <?php
        if($_GET['access']=='failed')
          {
           ?> <font color='red' class='erreur'><b>Votre mot de passe est incorrect.Réessayez</font>
          <?php }else 
          {
            echo"";
          }

      ?>
    </p>
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Entrez le nom d'utilisateur" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Entrez le mot de passe" required>
      <input type="submit" class="fadeIn fourth" name="button" value="Se connecter" >
    </form>

    

  </div>
</div>


</body>
</html>