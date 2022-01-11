<?php
session_start();
include('../settings/dbconfig.php');
if(isset($_POST['filiere'])){
    $sth=$db->prepare("select count(lm.id_module) from liste_modules lm where lm.id_filiere=:id_filiere");
    $sth->bindValue(':id_filiere', $_POST['filiere']);
    $sth->execute();
    $result1=$sth->fetch(PDO::FETCH_ASSOC);
    if($result1['count(lm.id_module)']<24){
    $sth=$db->prepare("select sum(lm.volumeHoraire) from liste_modules lm where lm.id_filiere=:id_filiere and lm.NatureModule='Majeur'");
    $sth->bindValue(':id_filiere', $_POST['filiere']);
    $sth->execute();
    $result3=$sth->fetch(PDO::FETCH_ASSOC);

    $sth=$db->prepare("select sum(lm.volumeHoraire) from liste_modules lm where lm.id_filiere=:id_filiere and lm.NatureModule='Complementaire'");
    $sth->bindValue(':id_filiere', $_POST['filiere']);
    $sth->execute();
    $result4=$sth->fetch(PDO::FETCH_ASSOC);

    $sth=$db->prepare("select sum(lm.volumeHoraire) from liste_modules lm where lm.id_filiere=:id_filiere");
    $sth->bindValue(':id_filiere', $_POST['filiere']);
    $sth->execute();
    $result5=$sth->fetch(PDO::FETCH_ASSOC);
   // $result5=(0 ? 1 : $result5);
    $volumeGlobal=(empty($result5['sum(lm.volumeHoraire)']) ? 1 : $result5['sum(lm.volumeHoraire)']);
    
    
    echo "le volume horaire globale de la filiere est: ".  $volumeGlobal." heures\nil vous reste ".(24-$result1['count(lm.id_module)'])." modules \nle pourcentage de module majeur est : ".ceil(($result3['sum(lm.volumeHoraire)']/$volumeGlobal)*100)."% \nle pourcentage de module Complementaire est : ".ceil(($result4['sum(lm.volumeHoraire)']/$volumeGlobal)*100)."%\n";
        
    }
    else {
    $sth=$db->prepare("select sum(lm.volumeHoraire) from liste_modules lm where lm.id_filiere=:id_filiere and lm.NatureModule='Majeur'");
    $sth->bindValue(':id_filiere', $_POST['filiere']);
    $sth->execute();
   
    
    $sth=$db->prepare("select sum(lm.volumeHoraire) from liste_modules lm where lm.id_filiere=:id_filiere and lm.NatureModule='Complementaire'");
    $sth->bindValue(':id_filiere', $_POST['filiere']);
    $sth->execute();
    $result4=$sth->fetch(PDO::FETCH_ASSOC);

    $sth=$db->prepare("select sum(lm.volumeHoraire) from liste_modules lm where lm.id_filiere=:id_filiere");
    $sth->bindValue(':id_filiere', $_POST['filiere']);
    $sth->execute();
    $result5=$sth->fetch(PDO::FETCH_ASSOC);
      if(ceil(($result4['sum(lm.volumeHoraire)']/$result5['sum(lm.volumeHoraire)'])*100)<=15 || ceil(($result4['sum(lm.volumeHoraire)']/$result5['sum(lm.volumeHoraire)'])*100)<=25){
        echo "Le pourcentage des modules complementaires (entre 15% et 25%) n'est pas correcte\nvous etes amenee a reinserer les modules a nouveau\nvotre demande sera mis au brouillon pour l'instant";
        $sth=$db->prepare("delete from liste_modules where id_filiere=:id_filiere"); 
        $sth->bindValue(':id_filiere', $_POST['filiere']);
        $sth->execute(); 
        $sth2=$db->prepare("update filiere set isBrouillon=1 where id_filiere=:id_filiere"); 
        $sth2->bindValue(':id_filiere', $_POST['filiere']);
        $sth2->execute();  
    }
      
      elseif(ceil(($result2['sum(lm.volumeHoraire)']/$result5['sum(lm.volumeHoraire)'])*100)<=75 || ceil(($result2['sum(lm.volumeHoraire)']/$result5['sum(lm.volumeHoraire)'])*100)<=85){
        echo "Le pourcentage des modules majeurs  (entre 75% et 85%) n'est pas correcte\nvous etes amenee a reinserer les modules a nouveau\nvotre demande sera mis au brouillon pour l'instant";
        $sth=$db->prepare("delete from liste_modules where id_filiere=:id_filiere"); 
        $sth->bindValue(':id_filiere', $_POST['filiere']);
        $sth->execute();
        $sth2=$db->prepare("update filiere set isBrouillon=1 where id_filiere=:id_filiere"); 
        $sth2->bindValue(':id_filiere', $_POST['filiere']);
        $sth2->execute();  
    }
      else{
          echo "votre demande a ete bien enregistre";
      }


    }
   
}





?>