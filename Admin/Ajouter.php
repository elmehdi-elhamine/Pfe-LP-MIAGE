<?php
session_start();
include('../settings/dbconfig.php');
if (isset($_SESSION['Admin'])) {?>
<!DOCTYPE html>
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
</style>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.html" class="logo">
				<img src="img/fac.png" style="width: 100%; height: 60%; background-color: white; border-radius: 5px;" alt="navbar brand" class="navbar-brand">
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
									<div class="dropdown-title">vous avez publier  <?= $count?>  notifications</div>
								</li>
								
								<li>
									
								</li>
							</ul>
							
						</li>
						
					
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
								<img src="../images/<?php echo $_SESSION['Admin']['Image']?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											
											<div class="u-text">
												<h4><?= $_SESSION['Admin']['prenom_admin'].' '.$_SESSION['Admin']['nom_admin']?></h4>
												<p class="text-muted"><?= $_SESSION['Admin']['email']?></p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<div class="user-box"><a style="font-size: 13px;" class="btn btn-xs btn-secondary btn-sm" href="profile_admin.php">
										     Mon Profile</a>
										</div>
											<div class="user-box"><a style="font-size: 13px;" class="btn btn-xs btn-secondary btn-sm" href="modifierMotDePasse.php">
										     Modifier Votre mot de passe</a>
										</div>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="logout.php"">Déconnexion</a>
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
						<img src="../images/<?php echo $_SESSION['Admin']['Image']?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<h3><?php echo '<strong>'.$_SESSION['Admin']['prenom_admin'].' '.$_SESSION['Admin']['nom_admin'].'</strong>';?>
								</h3>
									<span class="user-level">Doyen - Administrateur</span>
									
								</span>
							</a>
							<div class="clearfix"></div>

							
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a href="index.php">
								<i class="fas fa-home"></i>
								<p>Acceuil</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i style="font-size:12px;"  class="fas fa-list"></i>
								<p style="font-weight: bold;">Liste des utilisateurs</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="chefFiliere.php"><span class="sub-item">Chefs des filieres</span></a>
									</li>
									<li>
										<a href="chefdept.php"><span class="sub-item">Chefs des departements</span></a>
									</li>
									<li>
										<a href="users.php" ><span class="sub-item">Professeurs</span></a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base2">
								<i style="font-size:12px;"  class="fas fa-list"></i>
								<p style="font-weight: bold;">Liste des filieres</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base2">
								<ul class="nav nav-collapse">
									<li>
										<a href="filieresAccredites.php"><span class="sub-item">Filieres accredites</span></a>
									</li>
									<li>
										<a href="filieresAttentes.php"><span class="sub-item">Filiers en attente d'accreditation</span></a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<div class="collapse" id="base3">
								<ul class="nav nav-collapse">
									<li>
										<a ><span class="sub-item">Chef Filiere</span></a>
									</li>
									<li>
										<a ><span class="sub-item">Chef Departement</span></a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a  href="cycles.php">
								<i style="font-size:12px;"  class="fas fa-list"></i>
								<p style="font-weight: bold;">Liste des Cycles</p></a>
						</li>
						<li class="nav-item">
							<a href="departements.php">
								<i style="font-size:12px;"  class="fas fa-list"></i>
								<p style="font-weight: bold;">Liste des Departements</p></a>
						</li>
						<li class="nav-item">
							<a href="notifications.php">
								<i style="font-size:16px;"  class="fas fa-bell" ></i>
								<p style="font-weight: bold;">Notifications</p></a>
						</li>
						<li class="nav-item active">
							<a href="acceuil_vote_admin.php">
								<img src="img/vote.png" alt="..." class="avatar-img avatar avatar-xs" style="font-size:120px;filter: grayscale(10%;">
								
								<p> &nbsp&nbsp&nbsp Acceuil vote</p>
							</a>
						</li>
						<?php
                                            $sql = " SELECT * FROM `election` WHERE STATUS='active'";
                                            $statement = $db->prepare($sql);
                                            $statement->execute();
                                            $election = $statement->fetchAll(PDO::FETCH_OBJ);
                                            if ($election) {
                                            
                                            foreach ($election as $ro) {?>
		                           
						<li class="nav-item">
							<a href="poste_liste.php?id_election=<?php echo $ro->id_election ?>">
								<i style="font-size:12px;"  class="	fa fa-briefcase"></i>
								<p style="font-weight: bold;">Liste des Poste</p></a>
						</li>
						<li class="nav-item">
							<a href="AllCandidats.php?id_election=<?php echo $ro->id_election ?>">
								<i style="font-size:12px;"  class="fas fa-users"></i>
								<p style="font-weight: bold;">Candidats</p></a>
						</li>
						<li class="nav-item">
						    <a  href="AddPoste.php?id_election=<?php echo $ro->id_election ?>">
								<i style="font-size:12px;" class="fas fa-user-plus"></i>
								<p style="font-weight: bold;">Lancer Candidature</p>					
							</a>
					    </li>
					    	<li class="nav-item">
						      <a  href="resultas.php?id_election=<?php echo $ro->id_election ?>">
								<i style="font-size:12px;" class="fas fa-chart-bar"></i>
								<p style="font-weight: bold;">Resultas Vote</p>								
							</a>
					    </li>
					    </li>
					    	<li class="nav-item">
						      <a  href="affecter_resultas_vote.php?id_election=<?php echo $ro->id_election ?>&amp;date_election=<?php echo $ro->date_election ?>">
								<i style="font-size:12px;" class="fas fa-check-square"></i>
								<p style="font-weight: bold;">Valider resultas</p>								
							</a>
					    </li>
					    <?php ;}}
                         else{?>
                        <li class="nav-item">
							<a href="" onclick="return confirm(' vous devez premièrement lancer une élection!!');">
								<i style="font-size:12px;"  class="	fa fa-briefcase"></i>
							<p style="font-weight: bold;">Liste des candidature</p></a>
						</li>						
						<li class="nav-item">
						    <a  href="" onclick="return confirm('pas des élections lancées ! vous devez premièrement lancer une élection pour ajouter une candidature');">
								<i style="font-size:12px;" class="fas fa-user-plus"></i>
								<p style="font-weight: bold;">Lancer candidature</p>		
							</a>
					    </li>
					    <li class="nav-item">
							<a href="" onclick="return confirm(' pas des candidats !!');">
								<i style="font-size:12px;"  class="fas fa-users"></i>
								<p style="font-weight: bold;">Candidats</p></a>
						</li>
					    <li class="nav-item">
						      <a  href="" onclick="return confirm('les élections sont fermées .vous pouvez consulter les résultats au site de la faculté');">
								<i style="font-size:12px;" class="fas fa-chart-bar"></i>
								<p style="font-weight: bold;">Resultas Vote</p>								
							</a>
					    </li>                   
                              <?php ;} ?>
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
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h5 class="text-white op-7 mb-2">Ajouter Cycle, Département, Filière ...</h5>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a href="departements.php" class="btn btn-secondary btn-round">Listes des départements</a>
							</div>
						</div>
					</div>
				</div>

        
				<div class="page-inner ">

		            <div class="card-body">
									<div class="table-responsive">

										<table id="add-row" class="display table  table-hover border mb-3 " cellspacing="0" width="100%" >
										
											<thead style="background-color: #f1f1f1;">
												<tr >
													<th>Elément</th>
													<th style="width: 30%">Ajouter un nouveau</th>
												</tr>
											</thead>
											
											<tbody>
											<tr>
													<td style="color:#033C8D ;font-weight: bold;">Cycle</td>
													<td>
													    <a style="background-color: #2BB930 !important; border-color: #2BB930 !important ; " href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ajouterCycle" ><span style="font-size:12px; letter-spacing: 1px;
													    font-weight: bold;" class="btn-label">
													    	<i class="fas fa-plus"></i> Ajouter </span> 
												      </a>
												  </td>
											</tr>
											<tr>
												  <td style="color:#033C8D ;font-weight: bold;"> Département</td>
												  <td>
													    <a style="background-color: #2BB930 !important; border-color: #2BB930 !important ; " href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ajouterDprtm" ><span style="font-size:12px; letter-spacing: 1px;
													    font-weight: bold;" class="btn-label">
													    	<i class="fas fa-plus"></i> Ajouter </span> 
												      </a>
												  </td>
											</tr>
											<tr>
												  <td style="color:#033C8D ;font-weight: bold;"> Filière</td>
												  <td>
													    <a style="background-color: #2BB930 !important; border-color: #2BB930 !important ; " href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ajouterFiliere" ><span style="font-size:12px; letter-spacing: 1px;
													    font-weight: bold;" class="btn-label">
													    	<i class="fas fa-plus"></i> Ajouter </span> 
												      </a>
												  </td>
											</tr>
											<tr>
												  <td style="color:#033C8D ;font-weight: bold;"> Module</td>
												  <td>
													    <a style="background-color: #2BB930 !important; border-color: #2BB930 !important ; " href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ajouterModule" ><span style="font-size:12px; letter-spacing: 1px;
													    font-weight: bold;" class="btn-label">
													    	<i class="fas fa-plus"></i> Ajouter </span> 
												      </a>
												  </td>
											</tr>
											<tr>
												  <td style="color:#033C8D ;font-weight: bold;"> Equipe pédagogique</td>
												  <td>
													    <a style="background-color: #2BB930 !important; border-color: #2BB930 !important ; " href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ajouterEquipe" ><span style="font-size:12px; letter-spacing: 1px;
													    font-weight: bold;" class="btn-label">
													    	<i class="fas fa-plus"></i> Ajouter </span> 
												      </a>
												  </td>
											</tr>
													
											</tbody>
										</table>



 <!-- Modal insert cycle-->

		   <form method="POST" action="controle/insert_cycle.php">
          <div class="modal fade" id="ajouterCycle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	           <div class="modal-dialog modal-dialog-centered" role="document">
		            <div class="modal-content">
			             <div class="modal-header">
				               <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un nouveau Cycle</h5>
				               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                <span aria-hidden="true">&times;</span>
				               </button>
			              </div>
			 
			              <div class="modal-body">
				               <div class="form-group ">
			                    <label>Cycle</label>
                          <input type="text" name="cycle" class="form-control" rows="15" value="" >
                       </div>
		              	</div>
			              <div class="modal-footer">
				               <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">annuler</button>
				               <button type="submit" name="insert_cycle" class="btn btn-primary btn-sm">Enregistrer</button>
			              </div>
		           </div>
	           </div>
         </div>
       </form>

 <!-- Modal insert departement-->

  
  	   <form method="POST" action="controle/insert_departement.php">
          <div class="modal fade" id="ajouterDprtm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	           <div class="modal-dialog modal-dialog-centered" role="document">
		            <div class="modal-content">
			             <div class="modal-header">
				               <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un nouveau département</h5>
				               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                <span aria-hidden="true">&times;</span>
				               </button>
			              </div>
			 
			              <div class="modal-body">
				               <div class="form-group ">
			                    <label>Département</label>
                          <input type="text" name="dprtm" class="form-control" rows="15" value="" >
                       </div>
		              	</div>
			              <div class="modal-footer">
				               <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">annuler</button>
				               <button type="submit" name="insert_dprtm" class="btn btn-primary btn-sm">Enregistrer</button>
			              </div>
		           </div>
	           </div>
         </div>
       </form>

 <!-- Modal insert filiere-->


      	   <form method="POST" action="controle/insert_filiere.php">
          <div class="modal fade" id="ajouterFiliere" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	           <div class="modal-dialog modal-dialog-centered" role="document">
		            <div class="modal-content">
			             <div class="modal-header">
				               <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une nouvelle filière</h5>
				               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                <span aria-hidden="true">&times;</span>
				               </button>
			              </div>
			 
			              <div class="modal-body">
				               <div class="form-group ">
			                    <label>Filière</label>
                          <input type="text" name="filiere" class="form-control" rows="15" value="" >


                          <label>Cycle</label>
                          <select class="form-control" name="cycle" id="exampleFormControlSelect1">
		              	         <option value="" selected></option>
			          
		                          <?php 
                              $sql = "SELECT * from cycle ";
                              $statement = $db->prepare($sql);
                              $statement->execute();
                              $c = $statement->fetchAll(PDO::FETCH_OBJ);
                       
								              foreach ($c as $ro) 	{?>
			                           <option value="<?php echo $ro->id_cycle ?>"><?php echo $ro->nom_cycle ?></option><?php ;}?>
		                      </select>


                          <label>Département</label>
                          <select class="form-control" name="dprtm" id="exampleFormControlSelect1">
		              	         <option value="" selected></option>
			          
		                          <?php 
                              $sql = "SELECT * from departement ";
                              $statement = $db->prepare($sql);
                              $statement->execute();
                              $d = $statement->fetchAll(PDO::FETCH_OBJ);
                       
								              foreach ($d as $ro) 	{?>
			                           <option value="<?php echo $ro->id_dprtm ?>"><?php echo $ro->nom_dprtm?></option><?php ;}?>
		                      </select>


		                      <label>Coordinateur</label>
                          <select class="form-control" name="coord" id="exampleFormControlSelect1">
		              	         <option value="" selected> </option>
			          
		                          <?php 
                              $sql = "SELECT * from professeur ";
                              $statement = $db->prepare($sql);
                              $statement->execute();
                              $c = $statement->fetchAll(PDO::FETCH_OBJ);
                       
								              foreach ($c as $ro) 	{?>
			                           <option value="<?php echo $ro->id_prof ?>"><?php echo $ro->nomPrenom_prof?></option><?php ;}?>
		                      </select>


                          <label>Langue</label>
                          <input type="text" name="Langue" class="form-control" rows="15" value="" >

                          <label>objectifs</label>
                          <textarea type="text" name="objectifs" class="form-control" rows="15" value="" ></textarea>

                          <label>competences</label>
                          <textarea type="text" name="competences" class="form-control" rows="15" value="" ></textarea>

                          <label>debouches</label>
                          <textarea type="text" name="debouches" class="form-control" rows="15" value="" ></textarea>

                          <label>conditions_acces</label>
                          <textarea type="text" name="conditions_acces" class="form-control" rows="15" value="" ></textarea>

                          <label>listeDesModules</label>
                          <textareaut type="text" name="listeDesModules" class="form-control" rows="15" value="" ></textareaut>

                          <label>moyens_logistiques</label>
                          <textarea type="text" name="moyens_logistiques" class="form-control" rows="15" value="" ></textarea>

                           <label>partenariats_cooperation</label>
                          <textarea type="text" name="partenariats_cooperation" class="form-control" rows="15" value="" ></textarea>

                           <label>pfe</label>
                          <textarea type="text" name="pfe" class="form-control" rows="15" value="" ></textarea>
                         
                            <label>stage</label>
                          <textarea type="text" name="stage" class="form-control" rows="15" value="" ></textarea>



                       </div>
		              	</div>
			              <div class="modal-footer">
				               <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">annuler</button>
				               <button type="submit" name="insert_filiere" class="btn btn-primary btn-sm">Enregistrer</button>
			              </div>
		           </div>
	           </div>
         </div>
       </form>

 <!-- Modal insert module-->

      	   <form method="POST" action="controle/insert_cycle.php">
          <div class="modal fade" id="ajouterModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	           <div class="modal-dialog modal-dialog-centered" role="document">
		            <div class="modal-content">
			             <div class="modal-header">
				               <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un nouveau module</h5>
				               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                <span aria-hidden="true">&times;</span>
				               </button>
			              </div>
			 
			              <div class="modal-body">
				               <div class="form-group ">
			                    <label>Module</label>
                          <input type="text" name="module" class="form-control" rows="15" value="" >



                          <label>Département</label>
                          <select class="form-control" name="dprtm" id="exampleFormControlSelect1">
		              	         <option value="" selected></option>
			          
		                          <?php 
                              $sql = "SELECT * from departement ";
                              $statement = $db->prepare($sql);
                              $statement->execute();
                              $d = $statement->fetchAll(PDO::FETCH_OBJ);
                       
								              foreach ($d as $ro) 	{?>
			                           <option value="<?php echo $ro->id_dprtm ?>"><?php echo $ro->nom_dprtm?></option><?php ;}?>
		                      </select>




                          <label>Langue</label>
                          <input type="text" name="Langue" class="form-control" rows="15" value="" >

                          <label>ModeEnseignement</label>
                          <input type="text" name="ModeEnseignement" class="form-control" rows="15" value="" >

                          <label>ModeEvaluation</label>
                          <input type="text" name="ModeEvaluation" class="form-control" rows="15" value="" >

                          <label>Coefficient</label>
                          <input type="text" name="Coefficient" class="form-control" rows="15" value="" >

                          <label>mobilite</label>
                          <input type="text" name="mobilite" class="form-control" rows="15" value="" >

                          <label>alternance</label>
                          <input type="text" name="alternance" class="form-control" rows="15" value="" >

                           <label>PreRequis_pedagogiques</label>
                          <textarea type="text" name="PreRequis_pedagogiques" class="form-control" rows="15" value="" ></textarea>

                           <label>Competence</label>
                          <textarea type="text" name="Competence" class="form-control" rows="15" value="" ></textarea>

                           <label>Objectifs</label>
                          <textarea type="text" name="Objectifs" class="form-control" rows="15" value="" ></textarea>


                       </div>
		              	</div>
			              <div class="modal-footer">
				               <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">annuler</button>
				               <button type="submit" name="insert_module" class="btn btn-primary btn-sm">Enregistrer</button>
			              </div>
		           </div>
	           </div>
         </div>
       </form>

 <!-- Modal Modifier equipe-->

      	   <form method="POST" action="controle/insert_equipe.php">
          <div class="modal fade" id="ajouterEquipe" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	           <div class="modal-dialog modal-dialog-centered" role="document">
		            <div class="modal-content">
			             <div class="modal-header">
				               <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un nouveau Equipe pédagogique</h5>
				               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                <span aria-hidden="true">&times;</span>
				               </button>
			              </div>
			 
			              <div class="modal-body">
				               <div class="form-group ">
			                    <label>Equipe pédagogique</label>
                          <input type="text" name="equipe" class="form-control" rows="15" value="" >
                       </div>
		              	</div>
			              <div class="modal-footer">
				               <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">annuler</button>
				               <button type="submit" name="insert_equipe" class="btn btn-primary btn-sm">Enregistrer</button>
			              </div>
		           </div>
	           </div>
         </div>
       </form>

 <!-- ---------------------->



									</div>
								</div>

							</div>

				</div>
			
		</div>
		
		
						
		
		<!-- Custom template | don't include it in your project! -->
		
		<!-- End Custom template -->
	
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
</body>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
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
</html>
<?php	
}
else {
    header('location:../login/index.php?message=must login');
}
?>