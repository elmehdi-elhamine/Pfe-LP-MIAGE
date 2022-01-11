<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "GET" ){
$id_cycle = $_GET['id_cycle'];



## Supprimer Objectifs 

        $sql = " DELETE c, f, lm FROM cycle c LEFT JOIN filiere f on f.id_cycle=c.id_cycle LEFT JOIN liste_modules lm 
                 on f.id_filiere = lm.id_filiere where c.id_cycle = '$id_cycle'  "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>Cycle bien supprimer</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur est produit dans la supprission du cycle, ressayer!!!!</strong>" ;
		    }         






        }else{
		$_SESSION['error'] = 'vous devez cliquer sur supprimer premierement !!!!!';
		
	      }
header('location:../departements.php');
           
       ?>