<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "GET" ){
$id_filiere=$_GET['id_filiere'];


## Modifier Objectifs 
        $sql = "UPDATE filiere SET coorFiliere = NULL 
        WHERE id_filiere = $id_filiere "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>le coordinateur de la filière est bien supprimé</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur dans la suppressiony ressayer!!!!</strong>" ;
		    }        






        }else{
		$_SESSION['error'] = 'Cliquer sur supprimer !!!';
		
	      }
header('location:../departements.php');
           
       ?>