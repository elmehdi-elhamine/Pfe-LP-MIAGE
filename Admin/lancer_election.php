<?php 
  

include('../settings/dbconfig.php');


	session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$nom_election = $_POST['nom_election'];
$date_debut = $_POST['date_debut_insc'];
$date_fin = $_POST['date_fin_insc'];
$date_election = $_POST['date_election'];


if((!empty($nom_election))&&(!empty($date_debut))&&(!empty($date_fin))
	&&(!empty($date_election)))
{
  
        $sql =  "INSERT INTO election (id_election,nom_election,date_debut_insc,date_fin_insc,date_election,status) 
         VALUES (NULL,'$nom_election','$date_debut', '$date_fin','$date_election','active')";
             $statement = $db->prepare($sql);
                        $result=$statement->execute();


              if($result)
              {
			    $_SESSION['success'] = "<strong style=color:green>l'élection est lancer</strong>" ;
		       }}
		else{
			  $_SESSION['error'] = "<strong style=color:red>vous avez laisser un champ vide ,Tous les champs doivent etre remplis !!</strong>" ;
		    }          

            }
       else{
		$_SESSION['error'] = 'Cliquer sur lacner une election';
		
	      }
header('location:acceuil_vote_admin.php');
           
       ?>