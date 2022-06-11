<?php

class adminModel{
	protected $db ;

	public function __construct(){
		define('user',"root");
		define('pass',"");
		$this->db  = new PDO('mysql:host=localhost;dbname=test',user,pass ,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		
	}

	public function selectAll($choix){
		
		switch ($choix) {
			case 'etudiant':
				
			$query = $this->db->prepare("SELECT * FROM etudiant" );
			$query->execute();
			return $query->fetchAll();
				
				break;
			case 'enseignant':
				
			$query = $this->db->prepare("SELECT * FROM enseignant " );
			$query->execute();
			return $query->fetchAll();
				
				break;



			case 'module':
				
			$query = $this->db->prepare("SELECT * FROM module" );
			$query->execute();
			return $query->fetchAll();
				
			break;	
			

			case 'salle':
				
			$query = $this->db->prepare("select e.nomEn   , e.prenomEn , s.idsalle , s.idEn from enseignant as e , salle as s where s.idEn = e.idEn");
			$query->execute();
			return $query->fetchAll();
			break;


            case 'affecter' : 
					
				$query = $this->db->prepare("SELECT * FROM affecter");
				$query->execute();
				return $query->fetchAll();
				break;
			
			case 'seance' :

				$query = $this->db->prepare("SELECT DISTINCT s.idseance , m.nomM , s.daate , s.idsalle , s.heure_debut , s.heure_fin , s.typeSeance , e.nomEn , e.prenomEn from seance as s , module as m , enseignant as e , salle as s1 , affecter as A where m.idM = s.idM and s.idM = A.idM and A.idEn = e.idEn");
				// $query = $this->db->prepare("select * from seance");

				$query->execute();
				return $query->fetchAll();
				break;
			// case 'etudiant':
				
			// $query = $this->db->prepare("SELECT * FROM etudiant" );
			// $query->execute();
			// return $query->fetchAll();
				
			// 	break;



			default:
				// code...
				break;
		}


	

		// $query = $this->db->prepare("SELECT * FROM etudiant" );
		// $query->execute();
		// return $query->fetchAll();
	}

	public function selectJustif($idSeance){
		$query = $this->db->prepare("select e.apogee , e.nomEt , A.DateA , m.nomM , s1.typeSeance ,j.commentaire, j.lienPdf from etudiant as e , abscence as A , module as m , seance as s1 , justification as j where A.apogee = e.apogee and A.DateA = s1.daate and s1.idM = m.idM and j.date = A.DateA and s1.idseance = ? GROUP by j.idJ");
			// $query = $this->db->prepare("select * from seance");

			$query->execute(array($idSeance));
			return $query->fetchAll();
	}

	// public function selectsom($nomcolonne,$nomtableau,$username){
	// 	$query = $this->db->prepare("SELECT * FROM '"$ch"' where username = ?" );
	// 	$query->execute($uss);
	// 	return $query->fetch();
	// }


	public function select($nom,$choix="utilisateur"){
		
		switch ($choix) {
			case 'utilisateur':
			$query = $this->db->prepare("SELECT * FROM utilisateur  where username = ? " );
			$query->execute(array($nom));
			return $query->fetch();
			break;
			
			case 'enseignant':
			$query = $this->db->prepare("SELECT * FROM enseignant  where username = ? " );
			$query->execute(array($nom));
			return $query->fetch();
			break;

			// case 'admin':
			// $query = $this->db->prepare("SELECT * FROM admin  where username = ? " );
			// $query->execute(array($nom));
			// return $query->fetch();
			// break;

			case 'module' : 
				$query = $this->db->prepare("SELECT * FROM module  where nomM = ? " );
				$query->execute(array($nom));
				return $query->fetch();
				break;
	


			default:
				// code...
				break;
		}


		// $query = $this->db->prepare("SELECT * FROM utilisateur  where username = ? " );
		// $query->execute(array($username));
		// return $query->fetch();
	}
	

	
	
	public function insertInUser($array){
		$query  = $this->db->prepare("insert into utilisateur values(?,?,?,?)");
		$query->execute($array);
		return $query;
	}


	public function insertInstudents($array){
		$query  = $this->db->prepare("insert into etudiant values(?,?,?,?,?,?)");
		$query->execute($array);
		return $query;
	}

	
	public function insertInEnseignants($array){
		$query  = $this->db->prepare("insert into enseignant values(?,?,?,?,?,?)");
		$query->execute($array);
		return $query;
	}

	public function insertInModule($array){
		$query  = $this->db->prepare("insert into module values(?,?)");
		$query->execute($array);
		return $query;
	}

	public function insertInAffecter($array){
		$query  = $this->db->prepare("insert into affecter values(?,?)");
		$query->execute($array);
	
		return $query;
	}


	public function insertInSeance($array){
		$query  = $this->db->prepare("insert into seance values(?,?,?,?,?,?,?)");
		$query->execute($array);
	}


	public function insertInSalle($array){
		$query  = $this->db->prepare("insert into salle values(?,?)");
		$query->execute($array);
	}


	public function insertInetude($array){
   
		$query  = $this->db->prepare("insert into etudier values(?,?)");
		$query->execute($array);
		return $query;
		
		 

	}


	public function delete($id,$table){

		switch($table){
			case 'etudiant' : 
			$query = $this->db->prepare("delete from etudiant where apogee = ?");
			$query->execute(array($id));
			break;
			
			case 'enseignant' :
			
			$query = $this->db->prepare("delete from enseignant where idEn =  ?");
			$query->execute(array($id));
			break;
		
			case 'module' : 
				$query = $this->db->prepare("delete from module where idM = ?");
				$query->execute(array($id));
				break;
			case 'salle' :
			
			$query = $this->db->prepare("delete from salle where idsalle = ?");
			$query->execute(array($id));
			
			break;

			case 'utilisateur'  : 
			$query = $this->db->prepare("delete from utilisateur where idU = ?");
			$query->execute(array($id));
			break;

			case 'seance'  :
			$query = $this->db->prepare("delete from seance where idseance = ?");
			$query->execute(array($id));
			break;	
			
			
		}

	}
	

	function customizeSelect($table){
		
		switch($table){
			case 'affecter'  : 
				$query = $this->db->prepare('select  m.nomM  , a.idM from affecter a , module m where a.idM=m.idM group by m.nomM');
				$query->execute();
				return $query->fetchAll();
		}
	}

	function getSalle($idM){
		$query = $this->db->prepare('select s.idsalle from salle as s , affecter as a , enseignant as e where e.idEn = s.idEn and a.idEn = e.idEn and a.idM = ?');
		$query->execute(array($idM));
		return $query->fetch();
	}



	function selectList($idSeance){
				$query = $this->db->prepare('select m.nomM , e1.nomEt , e1.apogee , s.daate , s.typeSeance from etudiant as e1 , etudier as e , module as m , seance as s where s.idM = e.idM and m.idM = e.idM and e.apogee = e1.apogee and idSeance = ?
				');
				$query->execute(array($idSeance));

				return $query->fetchAll();
	}

	function selectAbsence($array){
				$query = $this->db->prepare('select e.apogee , e.nomEt , A.DateA , m.nomM  , s1.typeSeance from etudiant as e , abscence as A , module as m  , seance as s1 where A.apogee = e.apogee and A.DateA = s1.daate and s1.idM = m.idM and s1.idseance =? group by e.apogee');
				$query->execute(array($array));

				return $query->fetchAll();
	
			}

	function selectOne($id,$table){
		switch($table){
			case  'etudiant' : 
			
				$query = $this->db->prepare('select  * from etudiant where apogee = ? ');
				$query->execute(array($id));
				return $query->fetch();	
			    break;

			case  'enseignant' :
				$query = $this->db->prepare('select  * from enseignant where idEn = ? ');
				$query->execute(array($id));
				return $query->fetch();	
			    break;
			
			case  'module' : 	
				$query = $this->db->prepare('select  * from module where idM = ? ');
				$query->execute(array($id));
				return $query->fetch();	
				break;
				
		    case  'salle' : 
				$query = $this->db->prepare('select  * from salle where idSalle = ? ');
				$query->execute(array($id));
				return $query->fetch();	
				break;

			case 'utilisateur' : break;

			case 'seance' : 
			$query = $this->db->prepare('select m.nomM , s.idM , s.idseance ,  s.idsalle , s.daate , s.heure_debut , s.heure_fin , s.typeSeance from seance as s , module as m where s.idM = m.idM and s.idseance = ? ');
			$query->execute(array($id));
			return $query->fetch();	
			break;


			
		}



	}




	function updateOne($data,$table){
		switch($table){
			case  'etudiant' : 
			
				$query = $this->db->prepare('update  etudiant set nomEt = ? , preEt = ? , lienPhoto = ? , emaail = ? where apogee = ? ');
				$query->execute($data);
			    break;

			case  'enseignant' :
				$query = $this->db->prepare('update enseignant set nomEn =  ? , prenomEn = ? , email = ? , photo = ?   where idEn = ? ');
				$query->execute($data);
			
			    break;
			
			case  'module' : 	
				$query = $this->db->prepare('update module  set nomM = ?   where idM = ? ');
				$query->execute($data);
				break;
				
		    case  'salle' : 
				$query = $this->db->prepare('update salle  set idEn = ?  where idsalle = ? ');
				$query->execute($data);

				break;

			// case 'utilisateur' : break;
		
			
			case 'seance' :			
			$query = $this->db->prepare('update seance set idM =  ? , daate = ? , idsalle = ? , heure_debut = ? , heure_fin = ? , typeSeance = ?  where idseance = ? ');
			$query->execute($data);
			break;

		}
	}

	// public function insertfunc($array , $choix)
	// {
	// 	// switch ($choix) {
	// 	// 	case 'etudiant':
				
	// 	// 		break;
			
	// 	// 	case 'enseignant':
	// 	// 		break;

	// 	// 	case 'module' :
	// 	// 		break;


	// 	// 	case 'salle':
	// 	// 		// code...
	// 	// 		break;


	// 	// 	default:
	// 	// 		// code...
	// 	// 		break;
	// 	// }
	// }



}





// $tst = new adminModel();
// // $v = $tst->insertInUser(array('','nacccer','helo','admin'));
// $s = $tst->insertInstudents(array('12232340',$tst->select('nacccer')['idU'],'naxa','elmm','sds'));

// $tst = new adminModel();
// print_r( $tst->selectAbsence('6'));


// if($v)
// echo "nice";
// else
// echo "np";

// $tst = new adminModel();
// $v = $tst->selectAll("module");
// foreach($v as $k){
// 	echo $k['nomM'];
// }





