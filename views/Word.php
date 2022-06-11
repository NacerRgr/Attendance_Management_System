<?php
session_start();
      header("Content-type:application/vnd.ms-word");;
     ;
$filename='"'.$_SESSION['mmodule'].'".doc';
header("Content-Disposition: attachment;Filename=".$filename);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
<h2 align="center" style="color: red;" >Liste des absences de module <?php echo $_SESSION['mmodule'];?></h2>
<div align="center">
<table border="1">
	<tr>
		<th>N° Apogée</th><th>Nom Complet</th><th>Date d'absences</th>
	</tr>
	<?php foreach ($_SESSION['etudiantss'] as $key ) 
	{
    ?>
	<tr>
		<td>
		<?php echo $key['apogee'];?>	
		</td>
		<td>
		<?php echo $key['nomEt']." ".$key['preEt'];?>	
		</td>
		<td>
		<?php echo $key['DateA'];?>
		</td>
	</tr>
	<?php 
	}
	?>
</table>
<p  style="text-align:right;" ><b><?php echo Date("d/m/Y") ?></b></p>
</div>
</body>
</html>