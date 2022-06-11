<?php
 session_start();
if($_SESSION['con']==1){
   

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<style>
.div1{
	width : 80%;
	margin : auto;
	margin-top  : 10%;
	height : 60%;
}
.div2{
	width : 10px;

	
}
#id1{
	margin-top : 5px;
}

p{
	text-align : center;
	margin-top: 50%;
}

.divv{
	width : 30%;
	margin-top : 1%;
	margin-left : auto;
	margin-right : auto ;

}

.s{
	float : right;
}

h4{
	margin-bottom : 5%;
}
.H22{
    margin-top : 25%;
    color : red;
}
body{
    height : 100%;
}
</style>

<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active btn btn-warning" href="<?php echo 	$_SESSION['link']?>">Retourner à la page precedente</a>
      </li>
	</ul>
	  <ul class="navbar-nav s">
	  <li class="nav-item">
	<?php echo '<a class="nav-link " href="#">Vous étes connécté <strong>'.$_SESSION['access'].'</strong></a>' ?>	  
	</li>
	<li class="nav-item">
        <a class="nav-link btn btn-danger" href="../controllers/connexion.php?gg=">Se déconnécter</a>
      </li>
    </ul>
  </div>
</nav>
<h1 class = " display-4 H22 text-center"><?php echo $_SESSION['ERROR']?></h1>
<?php

}