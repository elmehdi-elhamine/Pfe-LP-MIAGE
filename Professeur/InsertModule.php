<?php
include('../settings/dbconfig.php');
session_start();
if (isset($_POST['newModule'])) { 
        $sth = $db->prepare("select * from module m inner join liste_modules lm
                        on m.id_module=lm.id_module 
                        INNER JOIN filiere f on lm.id_filiere=f.id_filiere 
                        where m.intitule_module=:intitule_module and lm.semestre=:semestre and f.id_filiere=:id_filiere ");
      $sth->bindValue(':intitule_module', $_POST['IntituleModule']);
      $sth->bindValue(':semestre', $_POST['semestre']);
      $sth->bindValue(':id_filiere', $_SESSION['nouvelleFiliere']['etape5']['id_filiere']);
      $sth->execute(); 
      $result=$sth->fetchAll();
      
      if(empty($result)){
          switch ($_POST['semestre']) {
              case 'Semestre 1'|| 'Semestre 2':
                 
                  $stmt=$db->prepare("SELECT count(m.intitule_module)
                    from module m inner join liste_modules lm on lm.id_module=m.id_module
                    inner JOIN filiere f on f.id_filiere=lm.id_filiere 
                    where f.id_filiere=:id_filiere and lm.semestre=:semestre; ");
                    $stmt->bindValue(':semestre', $_POST['semestre']);
                    $stmt->bindValue(':id_filiere', $_SESSION['nouvelleFiliere']['etape5']['id_filiere']);
                    $stmt->execute(); 
                    $row=$stmt->fetch();
                    
                    if($row['count(m.intitule_module)'] < 7){
                        echo "inferieur a 7 <br/>";
                        
                        try {
                          $stmt2=$db->prepare("insert into module(intitule_module,PreRequis_pedagogiques,Langue,ModeEnseignement,ModeEvaluation,Coefficient,Competence,Objectifs,mobilite,alternance,id_departement,equipe_pedagogique)
                          value(:intitule_module,:PreRequis_pedagogiques,:Langue,:ModeEnseignement,:ModeEvaluation,:Coefficient,:Competence,:Objectifs,:mobilite,:alternance,:id_departement,:equipe_pedagogique)");
                          $stmt2->bindValue(':intitule_module', $_POST['IntituleModule']);
                          $stmt2->bindValue(':PreRequis_pedagogiques', $_POST['Prerequis']);
                          $stmt2->bindValue(':Langue', $_POST['Langue']);
                          $stmt2->bindValue(':ModeEnseignement', $_POST['Mode']);
                          $stmt2->bindValue(':ModeEvaluation', $_POST['ModeEvaluation']);
                          $stmt2->bindValue(':Coefficient', $_POST['Coefficient']);
                          $stmt2->bindValue(':Competence', $_POST['Competences']);
                          $stmt2->bindValue(':Objectifs', $_POST['Objectifs']);
                          $stmt2->bindValue(':mobilite', $_POST['Mobilite']);
                          $stmt2->bindValue(':alternance', $_POST['Alternance']);
                          $stmt2->bindValue(':id_departement', $_POST['departement']);
                         
                         /* $stmt2->bindValue(':equipe_pedagogique', $_POST['EquipePedagogique']);
                          $st=$db->prepare("update professeur set isCoordModule=1 where id_prof=:id_prof");
                          $st->bindValue(':id_prof', $_POST['coordModule']);
                          $st->execute();*/
                         
            
                          $stmt2->execute();
                       } catch (PDOException $Exception) {
                          echo $Exception->getMessage();
                       }
                     
                      $stmt4=$db->prepare("select * from module where intitule_module=:intitule_module and id_departement=:id_departement");
                      $stmt4->bindValue(':intitule_module', $_POST['IntituleModule']);
                      $stmt4->bindValue(':id_departement', $_POST['departement']);
                      $stmt4->execute();
                      print_r($row=$stmt4->fetch(PDO::FETCH_ASSOC));
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
                     header('Location: InsertModuleLicence.php?message="Insertion Reussite"');
                     
                         
                    }
                    else{
                        header('Location: InsertModuleLicence.php?message="Vous ave depassez le nombre de modules necessaire pour cette semestre"');
                    }
                  break;
             
              case 'Semestre 3'||'Semestre 4'||'Semestre 5'||'Semestre 6':
                $stmt=$db->prepare("SELECT count(m.intitule_module)
                    from module m inner join liste_modules lm on lm.id_module=m.id_module
                    inner JOIN filiere f on f.id_filiere=lm.id_filiere 
                    where f.id_filiere=:id_filiere and lm.semestre=:semestre; ");
                    $stmt->bindValue(':semestre', $_POST['semestre']);
                    $stmt->bindValue(':id_filiere', 40);
                    $stmt->execute(); 
                    $row=$stmt->fetch();
                    
                    if($row['count(m.intitule_module)'] < 6){
                       
                      try {
                        $stmt2=$db->prepare("insert into module(intitule_module,PreRequis_pedagogiques,Langue,ModeEnseignement,ModeEvaluation,Coefficient,Competence,Objectifs,mobilite,alternance,id_departement,equipe_pedagogique)
                        value(:intitule_module,:PreRequis_pedagogiques,:Langue,:ModeEnseignement,:ModeEvaluation,:Coefficient,:Competence,:Objectifs,:mobilite,:alternance,:id_departement,:equipe_pedagogique)");
                        $stmt2->bindValue(':intitule_module', $_POST['IntituleModule']);
                        $stmt2->bindValue(':PreRequis_pedagogiques', $_POST['Prerequis']);
                        $stmt2->bindValue(':Langue', $_POST['Langue']);
                        $stmt2->bindValue(':ModeEnseignement', $_POST['Mode']);
                        $stmt2->bindValue(':ModeEvaluation', $_POST['ModeEvaluation']);
                        $stmt2->bindValue(':Coefficient', $_POST['Coefficient']);
                        $stmt2->bindValue(':Competence', $_POST['Competences']);
                        $stmt2->bindValue(':Objectifs', $_POST['Objectifs']);
                        $stmt2->bindValue(':mobilite', $_POST['Mobilite']);
                        $stmt2->bindValue(':alternance', $_POST['Alternance']);
                        $stmt2->bindValue(':id_departement', $_POST['departement']);
                       
                       /* $stmt2->bindValue(':equipe_pedagogique', $_POST['EquipePedagogique']);
                        $st=$db->prepare("update professeur set isCoordModule=1 where id_prof=:id_prof");
                        $st->bindValue(':id_prof', $_POST['coordModule']);
                        $st->execute();*/
                       
          
                        $stmt2->execute();
                     } catch (PDOException $Exception) {
                        echo $Exception->getMessage();
                     }
                   
                    $stmt4=$db->prepare("select * from module where intitule_module=:intitule_module and id_departement=:id_departement");
                    $stmt4->bindValue(':intitule_module', $_POST['IntituleModule']);
                    $stmt4->bindValue(':id_departement', $_POST['departement']);
                    $stmt4->execute();
                    print_r($row=$stmt4->fetch(PDO::FETCH_ASSOC));
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
                   header('Location: InsertModuleLicence.php?message="Insertion Reussite"');
                   
                         
                    }
                    else{
                        header('Location: InsertModuleLicence.php?message="Vous ave depassez le nombre de modules necessaire pour cette semestre"');
                    }
                    break;
              
              
              
          }

      }
      else{
        unset($_POST);
        header('Location: InsertModuleLicence.php?message="Module existe deja"');
      }
    
      if(){
          
      }
 
}
else if (isset($_POST['submit'])) {
    print_r($_POST);
    $sth = $db->prepare("select * from module m inner join liste_modules lm
    on m.id_module=lm.id_module 
    INNER JOIN filiere f on lm.id_filiere=f.id_filiere 
    where m.id_module=:id_module and lm.semestre=:semestre and f.id_filiere=:id_filiere ");
$sth->bindValue(':id_module', $_POST['module']);
$sth->bindValue(':semestre', $_POST['semestre']);
$sth->bindValue(':id_filiere', $_SESSION['nouvelleFiliere']['etape5']['id_filiere']);
$sth->execute(); 
$result=$sth->fetchAll();
print_r($result);
if(empty($result)){
    switch ($_POST['semestre']) {
        case 'Semstre 1' || 'Semestre 2':
            $stmt=$db->prepare("SELECT count(m.intitule_module)
            from module m inner join liste_modules lm on lm.id_module=m.id_module
            inner JOIN filiere f on f.id_filiere=lm.id_filiere 
            where f.id_filiere=:id_filiere and lm.semestre=:semestre; ");
            $stmt->bindValue(':semestre', $_POST['semestre']);
            $stmt->bindValue(':id_filiere', $_SESSION['nouvelleFiliere']['etape5']['id_filiere']);
            $stmt->execute(); 
            $row=$stmt->fetch();
          if($row['count(m.intitule_module)']<7){
              echo "inferieur a 7";
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