<?php 
  

include('../settings/dbconfig.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$Id = $_POST['Id'];
$content = $_POST['Content'];



if(!empty($Id)){
  
        $sql = "UPDATE notifications SET Content = '$content' WHERE Id = '$Id'  "; 
        $statement = $db->prepare($sql);
        $result=$statement->execute();


        if($result) 
              {
			    $_SESSION['success'] = 'votre modification a bien efectuer';
		       }}
		else{
			  $_SESSION['error'] = "vous n'avez pas choisir aucun professeur" ;
		    }          

            }
        else{
		$_SESSION['error'] = 'Vous devez cliquer sur la formulaire de modification premierement!!!! ';
		
	      }

header('location:notifications.php');
           
       ?>