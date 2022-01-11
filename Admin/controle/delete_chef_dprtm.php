<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "GET" ){
$id_dprtm=$_GET['id_dprtm'];


## Modifier Objectifs 
        $sql = "UPDATE departement SET chefDepartement = NULL 
        WHERE id_dprtm = $id_dprtm "; 
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
		$_SESSION['error'] = 'Clisuer sur supprimer !!!';
		
	      }
header('location:../departements.php');
           
       ?>