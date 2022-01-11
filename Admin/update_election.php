<?php 
  

include('../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$nom_election = $_POST['nom_election'];
$date_debut = $_POST['date_debut_insc'];
$date_fin = $_POST['date_fin_insc'];
$date_election = $_POST['date_election'];
$id_election = $_POST['id_election'];


  
        $sql = "UPDATE election SET nom_election = '$nom_election' ,date_election = '$date_election' ,date_debut_insc = '$date_debut', date_fin_insc = '$date_fin' WHERE id_election = '$id_election' "; 
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>votre modification est bien effectuer</strong>";
		       }
		else{
			  $_SESSION['error'] = "<strong style=color:red>une erreur dans la modification ressayer !</strong>" ;
		    }          

            }
       else{
		$_SESSION['error'] = 'Fill up add form first';
		
	      }
header('location:acceuil_vote_admin.php');
           
       ?>