<?php 
  

include('../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$nom_poste = $_POST['nom_poste'];
$coorFiliere = $_POST['coorFiliere'];
$chefDepartement = $_POST['chefDepartement'];
$id_dprtm = $_POST['id_dprtm'];
$id_filiere = $_POST['id_filiere'];
$election = $_POST['id_election'];
$date_election = $_POST['date_election'];



if ($nom_poste=='Coordinateur') {
	

$sql = "UPDATE filiere SET coorFiliere = '$coorFiliere' WHERE id_filiere = '$id_filiere' "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
                                  $sql="SELECT * from filiere where id_filiere='$id_filiere'";
                                           $statement = $db->prepare($sql);
                                            $statement->execute();
                                            $filiere = $statement->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($filiere as $fil) {
			    $_SESSION['success'] = "<strong style=color:green>l'affectation de $nom_poste au filiere <strong style=color:black> $fil->intitule_filiere </strong> est bien effectuer .</br>Consulter la liste des filieres</strong>";
			    header("location:affecter_resultas_vote.php?id_election=$election&date_election=$date_election");}

		       }
		else{
			
$_SESSION['error'] = "<strong style=color:red>une erreur ressayer !!!!</strong>" ;
			  header("location:affecter_resultas_vote.php?id_election=$election&date_election=$date_election");


		    }          

            




}else if ($nom_poste=='Chef de departement') {

$sql = "UPDATE departement  SET chefDepartement = '$chefDepartement' WHERE id_dprtm = '$id_dprtm' "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $sql="SELECT * from departement where id_dprtm='$id_dprtm'";
                                           $statement = $db->prepare($sql);
                                            $statement->execute();
                                            $dept = $statement->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($dept as $de) {
			    $_SESSION['success'] = "<strong style=color:green>l'affectation de $nom_poste au departement <strong style=color:black> $de->nom_dprtm </strong> est bien effectuer .</br>Consulter la liste des departements</strong>";
			    header("location:affecter_resultas_vote.php?id_election=$election&date_election=$date_election");}
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur ressayer !!!!</strong>" ;
			  header("location:affecter_resultas_vote.php?id_election=$election&date_election=$date_election");

		    }          

            }

}


  
        
       else{
		$_SESSION['error'] = "<strong>Cliquer sur formulaire de modification !!!!<strong>";
		
	      }
           
       ?>