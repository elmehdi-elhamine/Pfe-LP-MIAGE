<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){

$cycle=$_POST['cycle'];
$insert_cycle = $_POST['insert_cycle'];
 



## Modifier Objectifs 
 if (isset($insert_cycle)){
        $sql = "INSERT into cycle(nom_cycle) values('$cycle') "; 
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