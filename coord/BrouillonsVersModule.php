<?php
session_start();
include('../settings/dbconfig.php');
if(isset($_GET['id'])){
$sth = $db->prepare("select * from filiere where id_filiere=:id_filiere");
$sth->bindValue(':id_filiere',$_GET['id']);
$sth->execute();
$result=$sth->fetch(PDO::FETCH_ASSOC);
print_r($result);
$_SESSION['nouvelleFiliere']['etape5']=$result;
switch ($result['id_cycle']) {
    case 1:
        header('location:InsertModuleLicence.php');
        break;
    case 2:
        header('location:InsertModuleMaster.php');
        break;
    
    default:
        # code...
        break;
}
}


?>