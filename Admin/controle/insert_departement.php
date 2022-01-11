<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){

$dprtm=$_POST['dprtm'];
$insert_dprtm = $_POST['insert_dprtm'];
 



## Modifier Objectifs 
 if (isset($insert_dprtm)){
        $sql = "INSERT into departement(nom_dprtm) values('$dprtm') "; 
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