<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "GET" ){
$id_filiere = $_GET['id_filiere'];



## Supprimer Objectifs 

        $sql = "UPDATE filiere SET competences = NULL 
        WHERE id_filiere = $id_filiere "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>bien supprimer</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur est produit dans la supprission ressayer!!!</strong>" ;
		    }         






        }else{
		$_SESSION['error'] = 'vous devez cliquer sur supprimer premierement !!!!!';
		
	      }
header('location:../affecter_mod.php?id_filiere=$id_filiere');
           
       ?>