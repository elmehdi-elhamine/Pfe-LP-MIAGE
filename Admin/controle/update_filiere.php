<?php 
  

include('../../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){

$id_filiere=$_POST['id_filiere'];
$filiere = $_POST['filiere'];
$coord = $_POST['coord'];
$cycle = $_POST['cycle'];
$dprtm = $_POST['dprtm'];
$update_filiere = $_POST['update_filiere'];
 



## Modifier Objectifs 
 if (isset($update_filiere)){
        $sql = "UPDATE filiere f SET f.intitule_filiere = '$filiere' , f.id_cycle = '$cycle' ,
                f.id_departement = '$dprtm' , f.coorFiliere = '$coord' WHERE id_filiere = $id_filiere "; 
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