<?php
include('../settings/dbconfig.php');
$stmt = $db->prepare("update notifications set Statut=1 where ID=:ID");
$stmt->bindParam(':ID', $_GET['id']);
$stmt->execute();
header('Location: ' . $_SERVER['HTTP_REFERER']);


?>