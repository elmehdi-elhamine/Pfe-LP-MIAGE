<?php 
  

include('../settings/dbconfig.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" ){
$Id = $_POST['Id'];

$content = $_POST['Content'];



if(!empty($Id)){
  
        $sql = "INSERT INTO notifications(Content) VALUES ('$content') "; 
        $statement = $db->prepare($sql);
        $result=$statement->execute();


        if($result) 
              {
			    $_SESSION['success'] = 'votre insertion a bien efectuer';
		       }}
		else{
			  $_SESSION['error'] = "erreur" ;
		    }          

            }
        else{
		$_SESSION['error'] = 'Vous devez cliquer sur la formulaire d insertion premierement!!!! ';
		
	      }

header('location:notifications.php');
           
       ?>