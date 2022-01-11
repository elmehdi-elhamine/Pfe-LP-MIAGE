<?php
session_start();
include('../settings/dbconfig.php');
if (isset($_POST['submit'])) {
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        try {
            $query = "select * from `professeur` where `email`=:email";
            $stmt = $db->prepare($query);
            $stmt->bindValue('email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($count > 0 && password_verify($password,$row['mdp'])){
            if($row['isCoordFiliere']){
              $_SESSION['coordFiliere']=$row;
              $_SESSION['professeur']['time']=time();
              $status = "en ligne";
              $sql2 = $db->prepare("UPDATE professeur SET status = '{$status}' WHERE id_prof = {$row['id_prof']}");
              $sql2->execute();
              header('location:../coord/acceuil_coord.php');
            }
            else{
              $_SESSION['professeur']=$row;
              $_SESSION['professeur']['time']=time();
              
              $status = "en ligne";
              $sql2 = $db->prepare("UPDATE professeur SET status = '{$status}' WHERE id_prof = {$row['id_prof']}");
              $sql2->execute();

              header('location:../Professeur/acceuil_prof.php');

            }
              } 
            else{
              $query = "select * from `administrateur` where `email`=:email";
              $stmt = $db->prepare($query);
              $stmt->bindValue('email', $email, PDO::PARAM_STR);
              $stmt->execute();
              $count = $stmt->rowCount();
              $row   = $stmt->fetch(PDO::FETCH_ASSOC);
              if(!empty($row) && password_verify($password,$row['mdp'])){
                $_SESSION['Admin']=$row;
                $_SESSION['Admin']['time']=time();
                header('location:../Admin/index.php');

              }
              else{

                header('location:index.php?message=Utilisateur introuvable');
              }
              } 

            
              
               
            
          } catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
          }
        

    }
    else{
        header('location:index.php?message=Champs Vide');
    }
}




?>