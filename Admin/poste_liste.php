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
						$sth =$db->prepare("SELECT * from notifications where Statut = 0 ");
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
										<div class="user-box"><a style="font-size: 13px;" class="btn btn-xs btn-secondary btn-sm" href="profile_prof.php">
										     Mon Profile</a>
										</div>
											<div class="user-box"><a style="font-size: 13px;" class="btn btn-xs btn-secondary btn-sm" href="modifierMotDePasse.php">
										     Modifier Votre mot de passe</a>
										</div>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item"  href="logout.php">Déconnexion</a>
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
										<a href="#"><span class="sub-item">Filiers en attente d'accreditation</span></a>
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
							
							<div class="ml-md-auto py-2 py-md-0">
								<a href="acceuil_vote_admin.php" class="btn btn-secondary btn-round">Acceuil de Vote</a>
							</div>
						</div>
					</div>
				</div>

				<div class="page-inner ">
					<?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
				<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Les candidatures</h4>
										<a href="addPoste.php?id_election=<?php echo $_GET['id_election']?>" role="button" class="btn btn-primary btn-round ml-auto">
											<i class="fa fa-plus"></i>
											Ajouter
										</a>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal Ajouter poste-->
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Nouvelle</span> 
														<span class="fw-light">
															candidature
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" action="">
												<div class="modal-body">
													<p class="small"></p>
													
														<div class="row">

															<div class="col-sm-12">
																<div class="form-group">
																	<label>nom de candidature</label>
										                  <input name="id_election" type="text" class="form-control" value="<?php echo $_GET['id_election'] ; ?>">
																</div>
															</div>
													        <div class="col-sm-12">
																<div class="form-group ">
																	<label>nom de candidature</label>
																	<input name="nom_poste" type="text" class="form-control">
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<label>Maximum de vote</label>
																	<input name="max_vote" type="number" class="form-control" >
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group ">
																	<label>Description</label>
																	<textarea name="description" class="form-control" rows="10" ></textarea>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group ">
																	<label>Condition de candidature</label>
																	<textarea name="condition_poste" class="form-control" rows="10" ></textarea>
																</div>
															</div>
															
														</div>
													
												</div>
												<div class="modal-footer no-bd">
													<button type="submit"  class="btn btn-primary">Ajouter</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<?php
											$election=$_GET['id_election'];
                                            $sql = "SELECT * from poste p inner join election e on p.id_election=e.id_election
                                                LEFT JOIN departement d on d.id_dprtm=p.id_departement
                                                LEFT JOIN filiere f on f.id_filiere=p.id_filiere
                                                 where e.status='active' and e.id_election='$election'and (p.id_departement is not null or p.id_filiere is not null)";
                                            $statement = $db->prepare($sql);
                                            $statement->execute();
                                            $poste = $statement->fetchAll(PDO::FETCH_OBJ);
                                           if ($poste) {?>
										<table id="add-row" class="display table  table-hover border" cellspacing="0" width="100%" >

											<thead style="background-color: #D7D9E7;">
												<tr>
													<th>candidature</th>
													<th>max vote</th>
													<th>Description de candidature</th>
													<th>condition de candidature</th>
													<th>departement/Filiere</th>
												
													<th style="width: 10%">Action</th>
													<th style="width: 10%">liste des candidats</th>
												</tr>
											</thead>
											
											<tbody>
											<?php
											
                                            foreach ($poste as $row) {?>
											<tr>
												
													<td style="font-weight: bold;"><?php echo $row->nom_poste ?></td>
													<td><?php echo $row->max_vote ?></td>
													<td>
													    <a tabindex="0" class="btn btn-light" role="button" data-toggle="modal" data-target="#voirDescription<?php echo $row->id_poste ?>"  >
													     <i class="fas fa-eye"></i>
												        </a>
                                                    </td>
													<td>
													    <a tabindex="0" class="btn btn-light" role="button" data-toggle="modal" data-target="#voirCondition<?php echo $row->id_poste ?>"  >
													     <i class="fas fa-eye"></i>
												        </a>
												    </td>
												    <td> 
												    <p style="color:#033C8D ;font-weight: bold;"><?php echo $row->nom_dprtm ?></p>
													<p style="color:#109D12 ;font-weight: bold;"><?php echo $row->intitule_filiere ?></p></td>
													<td>
														<div class="form-button-action">
<button type="button" data-toggle="modal" title="" data-target="#update_poste<?php echo $row->id_poste ?>" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<a role="button" href="delet_candidature.php?id_poste=<?php echo  $row->id_poste ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"  
																onclick="return confirm('êtes-vous sûr de vouloir supprimer ?');">
																<i class="fa fa-times"></i>
															</a>
														</div>
													</td>
													<td>
													    <a  href="candidats_liste.php?id_poste=<?php echo $row->id_poste ?>" class="btn btn-primary btn-sm" role="button"  >
													     <i class="far fa-file-alt"></i>
												        </a>
												    </td>
												</tr>
											

<!-- Modal update Poste -->
<div class="modal fade" id="update_poste<?php echo $row->id_poste ?>" tabindex="1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modifier les information de candidature</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="update_poste.php">
			<div class="modal-body">
		
		<input type="hidden" name="id_election" class="form-control" value="<?php echo $_GET['id_election']?>">	   
		<input type="hidden" name="id_poste" class="form-control" value="<?php echo $row->id_poste ;?>">
						
				<div class="form-group">
	                 <label>Candidature</label>
	       <input type="text" name="nom_poste" class="form-control" value="<?php echo $row->nom_poste ;?>">
                </div>
                <div class="form-group">
                	<?php if ( $row->nom_poste=='Chef de departement') {?>
                		
                	
		                                <label for="exampleFormControlSelect1">Département</label>
           <select class="form-control"  name="id_departement" required>           
		                                <?php 

                                                 $sql = "SELECT * FROM departement WHERE chefDepartement is null AND id_dprtm not IN( SELECT id_departement from poste WHERE id_departement is not null)";
                                                 $statement = $db->prepare($sql);
                                                 $statement->execute();
                                                 $filiere = $statement->fetchAll(PDO::FETCH_OBJ);
                                                
                                                 if (!empty($filiere)){?>
		                                
		                                	<option value="<?php echo $row->id_dprtm; ?>" selected><?php echo $row->nom_dprtm ;?></option>
                                            
			                                       
                                          <?php foreach ($filiere as $ro) 	{
			                               echo'<option value='.$ro->id_dprtm.'>';
			                                     echo $ro->nom_dprtm ;
			                               echo '</option>';}
			                                
		                              }
							
		                            else {
                                    
                                    
		                           echo "<option value=$row->id_dprtm >".$row->nom_dprtm;
		                            echo"</option>";}
		                            echo"</select>";} 
                                 else {?>

<label for="exampleFormControlSelect1">Filiere</label>
<select class="form-control" id="exampleFormControlSelect1" name="id_filiere" required>

		                                 

                                                <?php $sql = "SELECT * FROM filiere WHERE coorFiliere is null AND id_filiere not IN( SELECT id_filiere from poste WHERE id_filiere is not null)";
                                                 $statement = $db->prepare($sql);
                                                 $statement->execute();
                                                 $filiere = $statement->fetchAll(PDO::FETCH_OBJ);
                                                  if (!empty($filiere)){?>
                                                  	
                                            <option value="<?php echo $row->id_filiere; ?>" selected><?php echo $row->intitule_filiere ;?></option>
                                             <?php foreach ($filiere as $fil) 	{
			                               echo' <option value=' .$fil->id_filiere .'>';
			                                      echo $fil->intitule_filiere ;
			                                echo'</option>';}
		                                }

		                                 else {
                                    
                                    
		                           echo "<option value=$row->id_filiere>".$row->intitule_filiere;
		                            echo"</option>";}
		                            echo"</select>";} 
							
		                            ?>




	                                </div>

                <div class="form-group" >
	                <label> Maximum de vote</label>
	        <input type="number" name="max_vote" value="<?php echo $row->max_vote; ?>" class="form-control" required >
                </div>
                
			        
                    <div class="form-group ">
			            <label>Description</label>
                        <textarea name="description" class="form-control" rows="10" ><?php echo $row->description ;?></textarea>
                    </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-primary">enregistrer</button>
			</div>
		</form>
		</div>
		</div>
	</div>
</div>

<!-- Modal voir Condition-->
<div class="modal fade" id="voirCondition<?php echo $row->id_poste ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		
		<div class="modal-content">
			<div class="modal-header" style="background-color: #9CC9F1;">
				<h5 class="modal-title" id="exampleModalLongTitle">Les conditions de candidature</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"  style="background-color: #9CC9F1;">
				<div class="card" style="width: 30rem;">
	
	<ul class="list-group list-group-flush" style="font-weight: bold;"  >
		<li class="list-group-item" >Type de l'enseignant : <?php echo '<h5>'.$row->condition_type_prof.'</h5>'; ?></li>
		<li class="list-group-item">Spécialité :&nbsp;&nbsp;   <?php echo '<h5>'.$row->condition_specialite.'</h5>'; ?></li>
		<li class="list-group-item">grade : &nbsp; &nbsp; <?php echo '<h5>'.$row->condition_grade.'</h5>'; ?></li>
		<li class="list-group-item">Anciennete :&nbsp; &nbsp;  <?php echo '<h5>'.$row->condition_anciennete.'</h5>'; ?></li>
	</ul>
</div>

				<?php echo $row->condition_poste ?>
			</div>
			<div class="modal-footer" style="background-color: #9CC9F1;">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fermer</button>
				<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" data-toggle="modal" data-target="#modifierCondition<?php echo $row->id_poste ;?>" title="Condition de candidature" >Modifier</button>
			</div>
		</div>

	</div>
</div>
<!-- Modal modifier Condition-->
<div class="modal fade" id="modifierCondition<?php echo $row->id_poste ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #9CC9F1;">
				<h5 class="modal-title" id="exampleModalLongTitle">modifier condition de poste</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>

			</div>
 <div class="modal-body"> 
			<form method="POST" action="update_condition.php">
				
				<input type="hidden" name="id_election" value="<?php echo $_GET['id_election'];?>" class="">
				

			 <div class="row"> 
			 	<input type="hidden" name="id_poste" value="<?php echo $row->id_poste ?>">
	            <div class="form-group col-md-6">
												<label class="form-label">Type de l'enseignant</label>
												<div class="selectgroup selectgroup-pills">
													
												<?php 
					$chkbox=$row->condition_type_prof;
					$arr=explode(" - ",$chkbox);
					
					?>	
													
													<label class="selectgroup-item">
														<input <?php if(in_array("professeur enseignement supérieur",$arr)){echo "checked";}?> type="checkbox" name="condition_type_prof[]" value="professeur enseignement supérieur" class="selectgroup-input">
														<span class="selectgroup-button">professeur de l'enseignement superieur</span>
													</label>
													<label class="selectgroup-item">
														<input <?php if(in_array("professeur assistant",$arr)){echo "checked";}?> type="checkbox" name="condition_type_prof[]" value="professeur assistant" class="selectgroup-input">
														<span class="selectgroup-button">professeur assistant</span>
													</label>
													<label class="selectgroup-item">
														<input <?php if(in_array("professeur habilité",$arr)){echo "checked";}?> type="checkbox" name="condition_type_prof[]" value="professeur habilité" class="selectgroup-input">
														<span class="selectgroup-button">professeur habilité</span>
													</label>
													<label class="selectgroup-item">
														<input <?php if(in_array("professeur non permanent",$arr)){echo "checked";}?> type="checkbox" name="condition_type_prof[]" value="professeur non permanent" class="selectgroup-input">
														<span class="selectgroup-button">professeur non permanent</span>
													</label>
												</div>
				</div>
                <div class="form-group col-md-6">
												<label class="form-label">Grade</label>
												<div class="selectgroup selectgroup-pills">
													
													
													
															
												<?php 
					$chkbox=$row->condition_grade;
					$ar=explode(" - ",$chkbox);
					
					?>		
														
													
													<label class="selectgroup-item">
														<input <?php if(in_array("A",$ar)){echo "checked";}?>  type="checkbox" name="condition_grade[]" value="A" class="selectgroup-input">
														<span class="selectgroup-button">A</span>
													</label>
													<label class="selectgroup-item">
														<input  <?php if(in_array("B",$ar)){echo "checked";}?>  type="checkbox" name="condition_grade[]" value="B" class="selectgroup-input">
														<span class="selectgroup-button">B</span>
													</label>
													<label class="selectgroup-item">
														<input  <?php if(in_array("C",$ar)){echo "checked";}?>  type="checkbox" name="condition_grade[]" value="C" class="selectgroup-input">
														<span class="selectgroup-button">C</span>
													</label>
													<label class="selectgroup-item">
														<input  <?php if(in_array("D",$ar)){echo "checked";}?>  type="checkbox" name="condition_grade[]" value="D" class="selectgroup-input">
														<span class="selectgroup-button">D</span>
													</label>
												</div>
				</div>
                <div class="form-group col-md-6">
		            <label for="exampleFormControlSelect1">spécialité</label>
		                <select class="form-control" name="condition_specialite" id="exampleFormControlSelect1">
			                <option value="<?php echo $row->condition_specialite ?>" selected><?php echo $row->condition_specialite ?></option>

			                                        <option value=""></option>
													<option value="informatique ">informatique</option>
													<option value="economie et gestion">economie et gestion</option>
													<option value="droit arabe">droit arabe</option>
													<option value="droit français">droit français</option>
													<option value="mathématique">mathématique</option>
		                </select>
	             </div>
	            <div class="form-group col-md-6">
	                <label for="squareInput">Ancienneté</label>
	                    <input type="number" name="condition_anciennete"
	                    value="<?php echo $row->condition_anciennete?>" class="form-control input-square" id="squareInput" required >
                 </div>
	
	 </div> 
	 <div class="modal-footer" >
				<button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-success" >Enregistrer</button>
			</div>
</form>

		</div>
	</div>
</div>
</div>
<!-- Modal voir description-->
<div class="modal fade" id="voirDescription<?php echo $row->id_poste ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		
		<div class="modal-content">
			<div class="modal-header" style="background-color: #9CC9F1;">
				<h5 class="modal-title" id="exampleModalLongTitle">Description de poste</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo $row->description ;?>
			</div>
			<div class="modal-footer" style="background-color: #9CC9F1;">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fermer</button>
				<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" data-toggle="modal" data-target="#modifierDescription<?php echo $row->id_poste ?>" title="Condition de candidature">modifier</button>
			</div>
		</div>
	
	</div>
</div>
<!-- Modal modifier description-->
<div class="modal fade" id="modifierDescription<?php echo $row->id_poste ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<form method="POST" action="modifier_description.php">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #9CC9F1;">
				<h5 class="modal-title" id="exampleModalLongTitle">Modifier description de poste</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				 
				<div class="form-group ">
					<input type="hidden" name="id_poste" value="<?php echo $row->id_poste ?>">
					<input type="hidden" name="id_election" value="<?php echo $election; ?>">
			            <label>Description de poste</label>
                        <textarea name="description" class="form-control" rows="15" ><?php echo $row->description ;?></textarea>
                </div>
                
			</div>
			<div class="modal-footer" style="background-color: #9CC9F1;">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
				<button type="submit" class="btn btn-success" >Enregistrer</button>
			</div>
		</div>
		</form>
	</div>
</div>

		<?php ;}}

else { echo " <center> <strong style=color:red>vous n'avez pas encous lancer une candidature !!</strong></center>";}

		?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>	
					
				</div>

			</div>
			
		</div>	
		<!-- Custom template | don't include it in your project! -->
		
		<!-- End Custom template -->
	</div>
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
	<!-- jQuery Vector Maps -->
	<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>
	<script>$('#add-row').DataTable({
	"pageLength": 3,
});
</script>
</body>

</html>
<?php	
}
else {
    header('location:../login/index.php?message=must login');
}
?>