<?php
include('../settings/dbconfig.php');
if(isset($_GET['id'])){
$statement = $db->prepare("update filiere set isAccredited=1 where id_filiere=:id");
$statement->bindValue(':id', $_GET['id']);
$statement->execute();
header('Location: ' . $_SERVER['HTTP_REFERER']);
}



?>