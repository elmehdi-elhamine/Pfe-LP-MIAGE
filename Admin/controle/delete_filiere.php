<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "GET" ){
$id_filiere = $_GET['id_filiere'];



## Supprimer Objectifs 

        $sql = " DELETE f , lm FROM filiere f  LEFT JOIN liste_modules lm 
                 on f.id_filiere = lm.id_filiere where f.id_filiere = '$id_filiere'  "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>Filière bien supprimer</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur est produit dans la supprission de la filière, ressayer!!!!</strong>" ;
		    }         






        }else{
		$_SESSION['error'] = 'vous devez cliquer sur supprimer premierement !!!!!';
		
	      }
header('location:../departements.php');
           
       ?>