<?php
session_start();
include('../settings/dbconfig.php');
if(isset($_POST['submit'])){
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    if($password1==$password2){
    $sth = $db->prepare("update professeur set mdp=:mdp WHERE id_prof=:id ");
    $sth->bindValue('id',$_SESSION['professeur']['id_prof']);
    $sth->bindValue('mdp',password_hash($password1,PASSWORD_DEFAULT));
    $sth->execute();
    header('Location: modifierMotDePasse.php?message="Modification reussite"');



    
    
    }
    else{
        header('Location: modifierMotDePasse.php?message="Champs ne correspond pas"');

    }
      

}





?>