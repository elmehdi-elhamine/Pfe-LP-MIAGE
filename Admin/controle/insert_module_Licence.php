<?php
include('../settings/dbconfig.php');
session_start();

else if (isset($_POST['submit'])) {
    
    $sth = $db->prepare("select * from module m inner join liste_modules lm
    on m.id_module=lm.id_module 
    INNER JOIN filiere f on lm.id_filiere=f.id_filiere 
    where m.id_module=:id_module and lm.semestre=:semestre and f.id_filiere=:id_filiere ");
$sth->bindValue(':id_module', $_POST['module']);
$sth->bindValue(':semestre', $_POST['semestreExiste']);
$sth->bindValue(':id_filiere', $_SESSION['nouvelleFiliere']['etape5']['id_filiere']);
$sth->execute(); 
$result=$sth->fetchAll();

if(empty($result)){
    switch ($_POST['semestreExiste']) {
        case 'Semstre 1' || 'Semestre 2':
            $stmt=$db->prepare("SELECT count(m.intitule_module)
            from module m inner join liste_modules lm on lm.id_module=m.id_module
            inner JOIN filiere f on f.id_filiere=lm.id_filiere 
            where f.id_filiere=:id_filiere and lm.semestre=:semestre; ");
            $stmt->bindValue(':semestre', $_POST['semestrExiste']);
            $stmt->bindValue(':id_filiere', $_SESSION['nouvelleFiliere']['etape5']['id_filiere']);
            $stmt->execute(); 
            $row=$stmt->fetch();
          if($row['count(m.intitule_module)']<7){
              
              $stmt2=$db->prepare("insert into liste_modules(id_filiere,id_module,semestre,NatureModule,volumeHoraire,pourcentageCours,pourcentageTD,pourcentageTP,volumeHoraireCours,volumeHoraireTD,volumeHoraireTP)value(:id_filiere,:id_module,:semestre,:NatureModule,:volumeHoraire,:pourcentageCours,:pourcentageTD,:pourcentageTP,:volumeHoraireCours,:volumeHoraireTD,:volumeHoraireTP)");
              $stmt2->bindValue(':id_filiere', $_SESSION['nouvelleFiliere']['etape5']['id_filiere']);
              $stmt2->bindValue(':id_module',$_POST['module'] );
              $stmt2->bindValue(':NatureModule', $_POST['NatureModule2']);
              $stmt2->bindValue(':volumeHoraire', $_POST['VolumeHoraire2']);
              $stmt2->bindValue(':semestre', $_POST['semestreExiste']);
              $stmt2->bindValue(':pourcentageCours', $_POST['pourcentageCours2']);
              $stmt2->bindValue(':pourcentageTD', $_POST['pourcentageTD2']);
              $stmt2->bindValue(':pourcentageTP', $_POST['pourcentageTP2']);
              $stmt2->bindValue(':volumeHoraireCours', $_POST['VolumeHoraireCours2']);
              $stmt2->bindValue(':volumeHoraireTD', $_POST['VolumeHoraireTD2']);
              $stmt2->bindValue(':volumeHoraireTP', $_POST['VolumeHoraireTP2']);
              $stmt2->execute();
            header('Location: InsertModuleLicence.php?message="Insertion Reussite"');
           
          }
          else{
             header('Location: InsertModuleLicence.php?message="Vous ave depassez le nombre de modules"');
          }
            
            break;
            case 'Semstre 3' || 'Semestre 4' ||'Semestre 5' || 'Semstre 6':
            $stmt=$db->prepare("SELECT count(m.intitule_module)
            from module m inner join liste_modules lm on lm.id_module=m.id_module
            inner JOIN filiere f on f.id_filiere=lm.id_filiere 
            where f.id_filiere=:id_filiere and lm.semestre=:semestre; ");
            $stmt->bindValue(':semestre', $_POST['semestre']);
            $stmt->bindValue(':id_filiere', $_SESSION['nouvelleFiliere']['etape5']['id_filiere']);
            $stmt->execute(); 
            $row=$stmt->fetch();
          if($row['count(m.intitule_module)']<6){
             
            $stmt2=$db->prepare("insert into liste_modules(id_filiere,id_module,semestre,NatureModule,volumeHoraire,pourcentageCours,pourcentageTD,pourcentageTP,volumeHoraireCours,volumeHoraireTD,volumeHoraireTP)value(:id_filiere,:id_module,:semestre,:NatureModule,:volumeHoraire,:pourcentageCours,:pourcentageTD,:pourcentageTP,:volumeHoraireCours,:volumeHoraireTD,:volumeHoraireTP)");
            $stmt2->bindValue(':id_filiere', $_SESSION['nouvelleFiliere']['etape5']['id_filiere']);
            $stmt2->bindValue(':id_module',$row['id_module'] );
            $stmt2->bindValue(':NatureModule', $_POST['NatureModule1']);
            $stmt2->bindValue(':volumeHoraire', $_POST['VolumeHoraire1']);
            $stmt2->bindValue(':semestre', $_POST['semestre']);
            $stmt2->bindValue(':pourcentageCours', $_POST['pourcentageCours']);
            $stmt2->bindValue(':pourcentageTD', $_POST['pourcentageTD']);
            $stmt2->bindValue(':pourcentageTP', $_POST['pourcentageTP']);
            $stmt2->bindValue(':volumeHoraireCours', $_POST['VolumeHoraireCours']);
            $stmt2->bindValue(':volumeHoraireTD', $_POST['VolumeHoraireTD']);
            $stmt2->bindValue(':volumeHoraireTP', $_POST['VolumeHoraireTP']);
            $stmt2->execute();
            header('Location: InsertModuleLicence.php?message="Insertion reussite"');

          }
          else{
             header('Location: InsertModuleLicence.php?message="Vous ave depassez le nombre de modules"');
          }
            
            break;
            
        
        
        default:
            # code...
            break;
    }


}
else{
    header('Location: InsertModuleLicence.php?message="Module existe deja"');
}
}

?>