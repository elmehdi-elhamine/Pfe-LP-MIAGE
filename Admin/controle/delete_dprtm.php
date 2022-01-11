<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "GET" ){
$id_dprtm = $_GET['id_dprtm'];



## Supprimer Objectifs 

        $sql = " DELETE d, f, lm FROM departement d left JOIN filiere f on d.id_dprtm = f.id_departement left JOIN liste_modules lm 
                 on f.id_filiere = lm.id_filiere where d.id_dprtm = '$id_dprtm'  "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>Département bien supprimer</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur est produit dans la supprission du département, ressayer!!!!</strong>" ;
		    }         






        }else{
		$_SESSION['error'] = 'vous devez cliquer sur supprimer premierement !!!!!';
		
	      }
header('location:../departements.php');
           
       ?>