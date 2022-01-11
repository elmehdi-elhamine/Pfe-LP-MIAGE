<?php
session_start();
include('../settings/dbconfig.php');
if(isset($_SESSION['professeur']) && isset($_SESSION['nouvelleFiliere']['etape5'])){
  ?>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Page Admin</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<!-- Fonts and icons -->
	<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">
	<link rel="stylesheet" href="cssChat/styleC.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

    

	
</head>
<style>
.blue-color {
color:blue;
}
.green-color {
color:green;
}
.teal-color {
color:teal;
}
.yellow-color {
color:yellow;
}
.red-color {
color:red;
}
.sidenavv {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.01), 0 6px 20px 0 rgba(0, 0, 0, 0.05);
}

.sidenavv a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenavv a:hover {
  color: #1fd116;
}

.sidenavv .closebtnv {
  position: absolute;
  top: 10;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenavv {padding-top: 15px;}
  .sidenavv a {font-size: 18px;}
}



	.modal.right .modal-content {
		height: 100%;
		overflow-y: auto;
	}
	
	.modal.right .modal-body {
		padding: 15px 15px 80px;
	}


.modal.right.fade .modal-dialog {
		right: -320px;
		-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, right 0.3s ease-out;
		        transition: opacity 0.3s linear, right 0.3s ease-out;
	}
	.modal.right.fade.in .modal-dialog {
		right: 0;
	}

.modal-backdrop, 
.modal-backdrop.fade.in{
opacity: 1 !important;
filter: alpha(opacity=100) !important;
background: transparent;
}

</style>
<body>


<!-------------------------- First Modal ----------------------------------------------------------------------------------------------->

<div id="mySidenavv" class="sidenavv">
  <a href="javascript:void(0)" class="closebtnv" onclick="closeNavV()">&times;</a>

  <div class="wrapperr">
    <section class="users">
      <header>
        <div class="content">
           
           <!--------------- header espace de chat ---------------------------------->
 

           <?php 
          $sql = $db->prepare("SELECT * FROM professeur WHERE id_prof = {$_SESSION['professeur']['id_prof']}");
          
          $sql->execute(); 
          
          
          $row = $sql->fetch(PDO::FETCH_ASSOC);
       
        ?>

    
          <img src="../images/<?php echo $_SESSION['professeur']['Image']?>" alt="">
          <div style="margin-top: 12px;" class="details">
            <span><?php echo $_SESSION['professeur']['nomPrenom_prof'] ?></span>
            <ul>
            <i><p style="font-size: 14px; display: inline;"><?php echo $row['status']; ?> </p></i>
            <i style="display: inline; margin-left:5%; padding-top:0%; color:#31CE36; font-size: 10px;" id="status-dott" class="fas fa-circle"></i></ul>
          </div>

        </div>
      </header>

        <!--------------- barre de recherche - espace de chat ---------------------------------->

        <div class="search">
          <span style="font-size: 15px;" class="text">Sélectionnez un prof pour lancer la discussion</span>
          <input type="text" placeholder="Entrez le nom pour chercher...">
          <button><i class="fas fa-search"></i></button>
        </div>

        
        <!--------------- La lise des profs enligne et hors ligne ---------------------------------->

        <div class="users-list">
         
           <?php
   
              
           ?>

      </div>
    </section>
  </div>
</div>

<!---------------------------------- navbar & sidebar menu ------------------------------------------------------------------------>


	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a  class="logo">
                <img src="images/fac.png" style="width: 100%; height: 60%; background-color: white; border-radius: 5px;" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						

						<!---------------------- icon chat ---------------------------------------------->
             
              <?php
						$sth = $db->prepare("SELECT * from messages where incoming_msg_id = {$_SESSION['professeur']['id_prof']} and Status = 1 ");
						$sth->execute(); 
						$result = $sth->fetchAll();
						$count=$sth->rowCount();
						?>

						<li class="nav-item dropdown hidden-caret">
							<a href="" class="nav-link dropdown-toggle" onclick="openNavV()" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope" ></i>
								<?php
								if ($count>0) {?>
								<span class="notification"><?= $count?></span>
									<?php }
									
									?>
							</a>
						</li>

						<!---------------------- icon notification ---------------------------------------------->


						<?php
						$sth = $db->prepare("SELECT * from notifications where Statut = 0 ");
						$sth->execute(); 
						$result = $sth->fetchAll();
						$count=$sth->rowCount();
						?>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<?php
								if ($count>0) {?>
								<span class="notification"><?= $count?></span>
									<?php }
									
									?>
								
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have <?= $count?> new notification</div>
								</li>
								<li>
									<?php foreach ($result as $result) {?>
										<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"></div>
												<div class="notif-content">
													<span class="block">
														<?= $result['Content']?>
													</span>
													<span class="time"><?= $result['DateCreation'] ?></span> 
												</div>
											</a>
										</div>
									</div>
										
									<?php } ?>
									
								</li>
								<li>
									
								</li>
							</ul>
							
						</li>
						
					
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
								<img src="../images/<?php echo $_SESSION['professeur']['Image']?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											
											<div class="u-text">
												<h4><?= $_SESSION['professeur']['nomPrenom_prof']?></h4>
												<p class="text-muted"><?= $_SESSION['professeur']['email']?></p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="profile_prof.php">My Profile</a>
										<div class="user-box"><a style="font-size: 13px;" class="btn btn-xs btn-secondary btn-sm" href="modifierMotDePasse.php">
										     Modifier Votre mot de passe</a>
										</div>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="../login/logout.php">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
						<img src="../images/<?php echo $_SESSION['professeur']['Image']?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<h3><?php echo '<strong>'.$_SESSION['professeur']['nomPrenom_prof'].'</strong>';?>
								</h3>
									<span class="user-level">Professeur</span>
									
								</span>
							</a>
							<div class="clearfix"></div>

							
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Acceuil</p>
							
							</a>
							
						</li>
						
					
						<li class="nav-item">
							<a  href="Departements_prof.php">
								<i class="fas fa-layer-group"></i>
								<p>Département</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="modules_prof.php">
								<i class="fas fa-th-list"></i>
								<p>Modules</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="equipe_pedag_prof.php">
								<i class="fas fa-users"></i>
								<p>Equipe pédagogique</p>
							</a>
						</li>
						<li class="nav-item">
							<a  href="demandeFiliere.php">
								<i class="fas fa-plus-square"></i>
								<p>Accréditation d'une filière</p>
							</a>
						</li>
						<li class="nav-item">
							<a  href="brouillon.php">
							<i class="fa fa-trash"></i>
								<p>Brouillons</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-check-square"></i>
								<p>Espace de vote</p>
							</a>
						</li>
						
						
						
						<li class="nav-item">
							<a >
                            <div class="digital-clock" style=" margin: auto;width: 200px;height: 60px;border: 2px solid #999;border-radius: 4px;text-align: center;font: 50px/60px 'DIGITAL', Helvetica;">00:00:00</div></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				
                
                <div class="container-fluid pt-3">
                <div class="card">
                    <div class="card-body">
                    <div class=row>
                        <div class="col-md-6 border-right">
                            <h3>Nouveau module</h3>
                            <form method="post"class="needs-validation" action="InsertModule2.php">
				<div class="form-row">
					<div class="form-group col-md-4">
					<label for="IntituleModule">Intitule</label>
					<input type="text" class="form-control" required name="IntituleModule" id="IntituleModule" placeholder="Intitule module">
					</div>
					<div class="form-group col-md-4">
					<label for="NatureModule1">Nature module</label>
					<select id="NatureModule1" name="NatureModule1" required class="form-control">
					<option value="Majeur">Majeur</option>
						<option value="Complementaire">Complementaire</option>
						<option value="Outils">Outils</option>
					</select>
					</div>
					<div class="form-group col-md-4">
					<label for="Semestre">Semestre d'appartenance</label>
					<select class="form-control" name="semestre" required id="semestre">
                        <option>Semestre 1</option>
                        <option>Semestre 2</option>
                        <option>Semestre 3</option>
                        
                        
                        </select>
					</div>
				</div>
				<div class="form-row">
				<div class="form-group col-md-4">
					<label for="Departement">Departement d'attache</label>
                    <?php
                        $sth = $db->prepare("SELECT nom_dprtm,id_dprtm from departement ");
                        $sth->execute(); 
                        $row=$sth->fetchAll();     
                        ?>
					 <select class="form-control" required name="departement"  id="departement">
                         <?php foreach ($row as $row) {?>
                            <option value="<?=$row['id_dprtm']?>"><?=$row['nom_dprtm']?></option><?php } ?>
                        </select>
				</div>
                <div class="form-group col-md-4">
					<label for="Langue">Langue</label>
					<input type="text" required class="form-control" id="Langue" placeholder="Langue" name="Langue">
				</div>
				
				<div class="form-group col-md-4">
					<label for="Etablissement">Etablissement releve du module</label>
					<input type="text" required class="form-control" id="Etablissement" placeholder="Etablissement" value="fsjes ain sebaa">
				</div>
				</div>
				<div class="form-row">
				<div class="form-group col-md-4">
					<label for="Mode">Mode d'enseignement</label>
					<select id="Mode" name="Mode" required class="form-control">
						<option >Presentiel</option>
						<option>A distance</option>
						<option>Hybride</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="Alternance">Formation par alternance</label>
					<select id="Alternance" required name="Alternance" class="form-control">
					<option>Non</option>    
					<option >Oui</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="Mobilite">mobilité à l’international</label>
					<select id="Mobilite" required name="Mobilite" class="form-control">
					<option>Non</option>   
					<option >Oui</option>
					</select>
				</div>
				</div>
				<div class="form-row">
				<div class="form-group col-md-4">
				<label for="Objectifs du module">Objectifs du module</label>
				<textarea required class="form-control"name="Objectifs" id="Objectifs" rows="3"></textarea>
				</div>
				<div class="form-group col-md-4">
				<label for="Competences">Competences</label>
				<textarea class="form-control" required name="Competences" id="Competences" rows="3"></textarea>
				</div>
                <div class="form-group col-md-4">
				<label for="Prerequis">Prerequis</label>
				<textarea required class="form-control" name="Prerequis" id="Prerequis" rows="3"></textarea>
				</div>
				</div>
				<div class="form-row">
				<div class="form-groupe col-md-4">
					<label for="Equipe">Equipe pedagogique</label>
					<?php
										$sth = $db->prepare("SELECT * from equipe_pedagogique ");
										$sth->execute(); 
										$row=$sth->fetchAll(); ?>
					<select id="EquipePedagogique" required name="EquipePedagogique" class="form-control">
						<?php foreach ($row as  $row) {
						?>
						<option value="<?=$row['id_equipe']?>"><?=$row['intitule_equipe']?></option>
				
				
						<?php
						}?>
					
					</select>
					
				
					</div>
					<div class="form-groupe col-md-4">
				
					<label for="CoordModule">Coordonnateur de module</label>
					<select id="coordModule" name="coordModule" class="form-control">
					</select>
				
					</div>
					<div class="form-groupe col-md-4">
					<label for="VolumeHoraire1">Volume horaire</label>
					<input type="number" required min="45" max="50" name="VolumeHoraire1" class="form-control" id="VolumeHoraire1" placeholder="Volume horaire">
					</div>
				    </div>
                    <div class="form-row">
                     <div class="form-group col-md-6">
                     <label for="ModeEvaluation">Mode d'evaluation</label>
					<select id="ModeEvaluation" required name="ModeEvaluation" class="form-control">
					<option>Examen final de fin de semestre</option>   
					<option >Contrôles continus :</option>
					</select>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="Coefficient">Coefficient</label>
                    <input type="number" required  name="Coefficient" class="form-control" id="Coefficient" placeholder="Coefficient">
                    </div>
                </div>
				<div class="form-row">
                     <div class="form-group col-md-4">
                     <label for="pourcentageCours">Pourcentage Cours %</label>
					 <input type="number" min="1" max="100" required  name="pourcentageCours" class="form-control" id="pourcentageCours" placeholder="pourcentage du cours">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="pourcentageTD">pourcentage Td  %</label>
                    <input type="number" required min="1" max="100"  name="pourcentageTD" class="form-control" id="pourcentageTD" placeholder="pourcentage Td">
                    </div>
					<div class="form-group col-md-4">
                    <label for="pourcentageTP">pourcentage TP %</label>
                    <input type="number" required min="1" max="100"   name="pourcentageTP" class="form-control" id="pourcentageTP" placeholder="pourcentage TP">
                    </div>
                </div>
				<div class="form-row">
                     <div class="form-group col-md-4">
                     <label for="VolumeHoraireCours">VolumeHoraireCours</label>
					 <input type="number" readonly="true" required   name="VolumeHoraireCours" class="form-control" id="VolumeHoraireCours" placeholder="Volume Horaire du Cours">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="VolumeHoraireTD">Volume Horaire TD</label>
                    <input type="number" readonly="true" required   name="VolumeHoraireTD" class="form-control" id="VolumeHoraireTD" placeholder="VolumeHoraire TD">
                    </div>
					<div class="form-group col-md-4">
                    <label for="VolumeHoraireTP">VolumeHoraireTP</label>
                    <input type="number" readonly="true" required   name="VolumeHoraireTP" class="form-control" id="VolumeHoraireTP" placeholder="VolumeHoraireTP">
                    </div>
                </div>
			
	                <button type="submit" name="newModule" class="btn btn-primary btn-block">Valider</button>
		            </form class="needs-validation">
                        </div>
                        <div class="col-md-6">
                            <div class="container-fluid">
                                <h2>Listes des modules existants </h2>
                                <form  method="post" action="InsertModule2.php">
                            <div class="form-group">
                            <label for="exampleFormControlSelect1">Departement</label>
                            <?php
                            $sth = $db->prepare("SELECT nom_dprtm,id_dprtm from departement ");
                            $sth->execute(); 
                            $row=$sth->fetchAll(); ?>
					        <select required class="form-control" name="departement" id="dprtm">
							<option selected>Choose...</option>
                            <?php foreach ($row as $row) {?>
                            <option value="<?=$row['id_dprtm']?>"><?=$row['nom_dprtm']?></option><?php } ?>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="Module">Module</label>
                            <select required class="form-control" name="module" id="module">
							<option selected>Choose...</option>
                            </select>
                            </div>
                            <div class="form-group">
					<label for="Semestre">Semestre d'appartenance</label>
					<select class="form-control" name="semestreExiste" required id="semestreExiste">
                        <option value="Semestre 1">Semestre 1</option>
                        <option value="Semestre 2">Semestre 2</option>
                        <option value="Semestre 3">Semestre 3</option>
                       
                        </select>
					</div>
                    <div class="form-group">
					<label for="VolumeHoraire2">Volume horaire</label>
					<input type="number" required min="45" max="50" name="VolumeHoraire2" class="form-control" id="VolumeHoraire2" placeholder="Volume horaire">
					</div>
                    <div class="form-group">
					<label for="NatureModule">Nature module</label>
					<select id="NatureModule2" name="NatureModule2" required class="form-control">
						<option value="Majeur">Majeur</option>
						<option value="Complementaire">Complementaire</option>
						<option value="Outils">Outils</option>
						
					</select>
					</div>
					<div class="form-row">
                     <div class="form-group col-md-4">
                     <label for="pourcentageCours2">Pourcentage Cours %</label>
					 <input type="number" min="1" max="100" required  name="pourcentageCours2" class="form-control" id="pourcentageCours2" placeholder="pourcentage du cours">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="pourcentageTD2">pourcentage Td  %</label>
                    <input type="number" required min="1" max="100"  name="pourcentageTD2" class="form-control" id="pourcentageTD2" placeholder="pourcentage Td">
                    </div>
					<div class="form-group col-md-4">
                    <label for="pourcentageTP2">pourcentage TP %</label>
                    <input type="number" required min="1" max="100"   name="pourcentageTP2" class="form-control" id="pourcentageTP2" placeholder="pourcentage TP">
                    </div>
                </div>
				<div class="form-row">
                     <div class="form-group col-md-4">
                     <label for="VolumeHoraireCours2">VolumeHoraireCours</label>
					 <input type="number" readonly="true" required   name="VolumeHoraireCours2" class="form-control" id="VolumeHoraireCours2" placeholder="Volume Horaire du Cours">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="VolumeHoraireTD2">Volume Horaire TD</label>
                    <input type="number" readonly="true" required   name="VolumeHoraireTD2" class="form-control" id="VolumeHoraireTD2" placeholder="VolumeHoraire TD">
                    </div>
					<div class="form-group col-md-4">
                    <label for="VolumeHoraireTP2">VolumeHoraireTP</label>
                    <input type="number" readonly="true" required   name="VolumeHoraireTP2" class="form-control" id="VolumeHoraireTP2" placeholder="VolumeHoraireTP">
                    </div>
                </div>
			
                            
                            <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">valider</button>
                            </div>
                            
                            </form>
                            </div>
                            
                        </div>

                    </div>
  
 
  

                        </div>


				</div>
			
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		
		<!-- End Custom template -->
	</div>
     

<!------------------------------------------- second modal of chat ------------------------------------------------->

	<div style=" height: 600px !important;" class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div style="margin-left: 40%; margin-top : 4.85%; margin-bottom: 0px !important;" class="modal-dialog" role="document">
			<div style="background-color: transparent;" class="modal-content">


	<div  class="wrapperr1">
    <section sty class="chat-area">
      <header>


        <?php 
          $user_id =  $_GET['id_prof'];
          $sql = $db->prepare("SELECT * FROM professeur WHERE id_prof = {$user_id}");
          
          if($user_id){
          $sql->execute(); 
         }
          
          $count=$sql->rowCount();

          if($count > 0){
            $row = $sql->fetch(PDO::FETCH_ASSOC);
          }else{
            // header("location: users.php");
          }
        ?>


        <a href="" style="float: left; color: #2BB930;"  class="back-icon" onclick="back()"  id="href"><i class="fas fa-arrow-left"></i></a>
        <img src="../images/<?php echo $row['Image']?>" alt="">
        <div style="margin-top: 12px;"  class="details">
          <span><?php echo $row['nomPrenom_prof'] ?></span>
          <p style="font-size: 13px;"><?php echo $row['status']; ?></p>
        </div>
              		<!-- <button style="float: right;" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->

      </header>
      <div class="chat-box">

      </div>
      
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->


<!----------------------------------------------------------------------------------------------------------------------->


	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>
    <?php if (isset($_GET['message'])) {
			?>
			<script>
$(document).ready(function(){
$('#myModal').modal('show');
})
</script>
			<?php
		}?>
		<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><span class="iconify" data-icon="bx:bxs-error-alt" style="color: red;" data-width="100" data-height="100"></span></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div>
			<div class="container-fluid">
			
  <h1><?= $_GET['message']?></h1>
  


			</div>
		</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</body>


<!---------------------------------------------------------------->

 <script>
        $(document).ready(function() {

            // get the current URL

            // if the URL ends with the anchor #portfolioModal93 then we want to open the modal
            if(window.location.href.indexOf('#myModal2') != -1) {
                $('#myModal2').modal('show');
            }
        });
    </script>

     <script>
        function back() {

            if(window.location.href.indexOf('acceuil_prof') != -1) {
                $('#href').href('acceuil_prof.php');
        };

        if(window.location.href.indexOf('modules_prof') != -1) {
                $('#href').href('modules_prof.php');
        }};
    </script>


<!---------------------------------------------------------------->


	<script type="text/javascript">
		const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");

searchIcon.onclick = ()=>{
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if(searchBar.classList.contains("active")){
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
}

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "chat/search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "chat/users.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){
            usersList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 500);


	</script>

<!---------------------------------------------------------------->

<script>
function openNavV() {
  document.getElementById("mySidenavv").style.width = "450px";
}

function closeNavV() {
  document.getElementById("mySidenavv").style.width = "0";
}
</script>



<script>
function openNavVx() {
  document.getElementById("mySidenavvx").style.width = "450px";
}

function closeNavVx() {
  document.getElementById("mySidenavvx").style.width = "0";
}
</script>


<!------------------------------------------------------------->


<!---------------------------------------------------------------->

<script type="text/javascript">
    
   
   const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "chat/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "chat/get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }
  

  </script>


<!------------------------------------------------------------->





<script>
$(document).ready( function () {

    $('#myTable').DataTable();
    $('#test').hide();
	$(document).ready(function() {
  clockUpdate();
  setInterval(clockUpdate, 1000);
})

function clockUpdate() {
  var date = new Date();
  
  function addZero(x) {
    if (x < 10) {
      return x = '0' + x;
    } else {
      return x;
    }
  }

  function twelveHour(x) {
    if (x > 12) {
      return x = x - 12;
    } else if (x == 0) {
      return x = 12;
    } else {
      return x;
    }
  }

  var h = addZero(twelveHour(date.getHours()));
  var m = addZero(date.getMinutes());
  var s = addZero(date.getSeconds());

  $('.digital-clock').text(h + ':' + m + ':' + s)
}
} );
</script>
<script>
	$(document).ready(function(){

		$('#EquipePedagogique').change(function(){
		var id = $(this).find(":selected").val();
		var dataString = 'equipeId='+ id; 
		$.ajax({
		type: 'post',
        data: dataString,  
        url: 'equipeByProf.php',
		success: function(employeeData) {
            if(employeeData){
                document.getElementById("coordModule").innerHTML=employeeData;
               
            }
            else{
                alert("No users found");
            }
        },
		error:function(){
            alert("error error");
        }

		});
        });
});


</script>
<script>
	$(document).ready(function(){

		$('#dprtm').change(function(){
		var id = $(this).find(":selected").val();
		var dataString = 'dprtmId='+ id; 
       
        $.ajax({
        type: 'post',
        data: dataString,  
        url: 'moduleByDepartement.php',
        success: function(employeeData) {
            if(employeeData){
                document.getElementById("module").innerHTML=employeeData;
               
            }
            else{
                alert("No modules found");
            }
        },

        });
        });
		
});


</script>
<script>
	$(document).ready(function(){
		var filiere='<?=$_SESSION['nouvelleFiliere']['etape5']['id_filiere']?>';
		$.ajax({
		type: 'post',
        data: {filiere:filiere},  
        url: 'PercenatgeModule.php',
		success:function(data){
			alert(data);
		}
		});
	
	})



</script>
<script>
	$(document).ready(function(){
		$('#pourcentageTD').prop('disabled',true);
		$('#pourcentageTP').prop('disabled',true);
		var a=0;
		$('#pourcentageCours').keyup(function(){
	$('#VolumeHoraireCours').val($(this).val()*$('#VolumeHoraire1').val()/100);
	
	$('#pourcentageTD').prop('disabled',false);
	$("#pourcentageTD").attr({
       "max" : (100-$('#pourcentageCours').val()),        // substitute your own
       "min" : 1         // values (or variables) here
    });

	
});


$('#pourcentageTD').keyup(function(){
	

	$('#VolumeHoraireTD').val($(this).val()*$('#VolumeHoraire1').val()/100);
	$("#pourcentageTP").prop('disabled',false);
	c=100-(parseInt($('#pourcentageCours').val())+parseInt($('#pourcentageTD').val()));
	$("#pourcentageTP").attr({
       "max" : c,        // substitute your own
       "min" : 1         // values (or variables) here
    });
	
	
	
});
$('#pourcentageTP').keyup(function(){
	$('#VolumeHoraireTP').val($(this).val()*$('#VolumeHoraire1').val()/100);
});





	});


</script>
<script>
	$(document).ready(function(){
		$('#pourcentageTD2').prop('disabled',true);
		$('#pourcentageTP2').prop('disabled',true);
		var a=0;
		$('#pourcentageCours2').keyup(function(){
	$('#VolumeHoraireCours2').val($(this).val()*$('#VolumeHoraire2').val()/100);
	
	$('#pourcentageTD2').prop('disabled',false);
	$("#pourcentageTD2").attr({
       "max" : (100-$('#pourcentageCours2').val()),        // substitute your own
       "min" : 1         // values (or variables) here
    });

	
});


$('#pourcentageTD2').keyup(function(){
	

	$('#VolumeHoraireTD2').val($(this).val()*$('#VolumeHoraire2').val()/100);
	$("#pourcentageTP2").prop('disabled',false);
	c=100-(parseInt($('#pourcentageCours2').val())+parseInt($('#pourcentageTD2').val()));
	$("#pourcentageTP2").attr({
       "max" : c,        // substitute your own
       "min" : 1         // values (or variables) here
    });
	
	
	
});
$('#pourcentageTP2').keyup(function(){
	$('#VolumeHoraireTP2').val($(this).val()*$('#VolumeHoraire2').val()/100);
});





	});


</script>

</html>     
     

























  <?php
}


?>
