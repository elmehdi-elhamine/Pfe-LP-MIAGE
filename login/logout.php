<?php
session_start();
include('../settings/dbconfig.php');


$status = "hors ligne";
$sql = $db->prepare("UPDATE professeur SET status = '{$status}' WHERE id_prof={$_SESSION['professeur']['id_prof']}");
$sql->execute();



session_unset();
session_destroy();
header('location:index.php?message=Vous avez été déconnecté avec succès');
?>