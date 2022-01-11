<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){

$filiere=$_POST['filiere'];
$cycle=$_POST['cycle'];
$dprtm=$_POST['dprtm'];
$coord=$_POST['coord'];
$Langue=$_POST['Langue'];
$objectifs=$_POST['objectifs'];
$competences=$_POST['competences'];
$debouches=$_POST['debouches'];
$conditions_acces=$_POST['conditions_acces'];
$listeDesModules=$_POST['listeDesModules'];
$moyens_logistiques=$_POST['moyens_logistiques'];
$partenariats_cooperation=$_POST['partenariats_cooperation'];
$pfe=$_POST['pfe'];
$stage=$_POST['stage'];

$insert_filiere = $_POST['insert_filiere'];
 



## Modifier Objectifs 
 if (isset($insert_filiere)){
        $sql = "INSERT into filiere(intitule_filiere, Langue, objectifs, competences, debouches, conditions_acces, listeDesModules,
                moyens_logistiques, partenariats_cooperation, pfe, stage, coorFiliere, id_cycle, id_departement) values('$filiere' ,'$Langue', '$objectifs', '$competences', '$debouches', '$conditions_acces', '$listeDesModules', 
                '$moyens_logistiques' ,'$partenariats_cooperation' ,'$pfe' ,'$stage' ,  '$coord', '$cycle', 
                '$dprtm'  ) "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>votre insertion est bien effectuer</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur dans la insertion ressayer!!!!</strong>" ;
		    }}         






        }else{
		$_SESSION['error'] = 'Clisuer sur supprimer !!!';
		
	      }
header('location:../departements.php');
           
       ?>