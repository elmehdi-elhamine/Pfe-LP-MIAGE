<?php
include('../settings/dbconfig.php');
session_start();

	
		$id_poste = $_GET['id_poste'];
		$sql = "DELETE FROM poste WHERE id_poste = '$id_poste'";
		$statement = $db->prepare($sql);
                       $result= $statement->execute();
		if($result){
			$_SESSION['success'] = 'la candidature est bien supprimer';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	
	header("location: poste_liste.php?id_election=$election");
	
?>