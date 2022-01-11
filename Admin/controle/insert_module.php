<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){

$module=$_POST['module'];
$dprtm=$_POST['dprtm'];
$Langue=$_POST['Langue'];
$ModeEnseignement=$_POST['ModeEnseignement'];
$ModeEvaluation=$_POST['ModeEvaluation'];
$Coefficient=$_POST['Coefficient'];
$mobilite=$_POST['mobilite'];
$alternance=$_POST['alternance'];
$PreRequis_pedagogiques=$_POST['PreRequis_pedagogiques'];
$Competence=$_POST['Competence'];
$Objectifs=$_POST['Objectifs'];


$insert_module = $_POST['insert_module'];
 



## Modifier Objectifs 
 if (isset($insert_module)){
        $sql = "INSERT into module(intitule_module, PreRequis_pedagogiques, Langue ,ModeEnseignement, ModeEvaluation, Coefficient, Competence,
                Objectifs, mobilite, alternance, id_departement ) values('$module', '$PreRequis_pedagogiques', '$Langue', '$ModeEnseignement', 
                '$ModeEvaluation', '$Coefficient', '$Competence', '$Objectifs', '$mobilite', '$alternance', '$dprtm' ) "; 
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