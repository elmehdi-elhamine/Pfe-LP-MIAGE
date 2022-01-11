<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$id_cycle=$_POST['id_cycle'];
$cycle = $_POST['cycle'];
$update_cycle = $_POST['update_cycle'];


## Modifier Objectifs 
 if (isset($update_cycle)){
        $sql = "UPDATE cycle SET nom_cycle = '$cycle' 
        WHERE id_cycle = $id_cycle "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>votre modification est bien effectuer</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur dans la modification ressayer!!!!</strong>" ;
		    }}         






        }else{
		$_SESSION['error'] = 'Clisuer sur supprimer !!!';
		
	      }
header('location:../departements.php');
           
       ?>