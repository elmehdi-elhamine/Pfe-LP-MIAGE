<?php
session_start();
include('../settings/dbconfig.php');
if(isset($_POST['submit'])){
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    if($password1==$password2){
        try {
            $sth = $db->prepare("update administrateur set mdp=:mdp WHERE id_admin=:id ");
            $sth->bindValue('id',$_SESSION['Admin']['id_admin']);
            $sth->bindValue('mdp',password_hash($password1,PASSWORD_DEFAULT));
            $sth->execute();
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
   
   



    
    
    }
    else{
        header('Location: modifierMotDePasse.php?message="Champs ne correspond pas"');

    }
      

}





?>