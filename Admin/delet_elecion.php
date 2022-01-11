<?php 
  

include('../settings/dbconfig.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET" ){
$id_election = $_GET['id_election'];



  
        $sql = "UPDATE election set status = 'inactive' WHERE id_election = '$id_election' "; 
             $statement = $db->prepare($sql);
                       $result= $statement->execute();
if($result)
              {
			    $_SESSION['success'] = "vous avez supprimer l'élection ";
		       }
		else{
			  $_SESSION['error'] = "une erreur ressayer !!!" ;
		    }          
}
            
       else{
		$_SESSION['error'] = 'clique sur supprimer !!!';
		
	      }
          header('location:acceuil_vote_admin.php');
       
       ?>