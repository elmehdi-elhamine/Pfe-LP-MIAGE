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
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="../login/logout.php">Déconnexion</a>
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
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Départements </h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Gérer département</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Liste des départements</a>
							</li>
							<li>
								<a style="color: white !important; margin-left:190% !important; font-weight: 600 !important; letter-spacing: 2px; " href="Ajouter.php" class="btn btn-secondary btn-round">
									<i style="font-size: !important; padding-right: 10px !important; color:white;" class="fas fa-plus"></i> Ajouter</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									
									<div class="card-title"><?php
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
      ?></div>
									<div class="card-category"></div>
								</div>
								<div class="card-body">
									<table class="table table-typo">
										<tbody>
                 <?php 
                      
                       $sql = "SELECT d.id_dprtm , d.nom_dprtm , p.nomPrenom_prof as chef , p.id_prof as idchef FROM departement d LEFT join professeur p on d.chefDepartement = p.id_prof";

                        $statement = $db->prepare($sql);
                        $statement->execute();
                        $dprtm = $statement->fetchAll(PDO::FETCH_OBJ);
                       
						
								?>
									</tbody>
									</table>
  
<?php 
  foreach ($dprtm as $row) {
  	$dprtm = $row->id_dprtm ; 
  	

?>
<div style="" class="accordion accordion-secondary">
<div style="" class="card">
		 <div class="card-header collapsed" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo<?php echo $row->nom_dprtm ?>" aria-expanded="false" aria-controls="collapseTwo" style="background-color:#1572E8; color: white; ">
			<div class="span-icon">
				<div class="flaticon-box-1"></div>
			</div>
			<div class="span-title">
				<?php echo $row->nom_dprtm ?>
			</div>
			<div class="span-mode"></div>
		</div>


		<div id="collapseTwo<?php echo $row->nom_dprtm?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
     
      <!---------------- cycles ----------------------------->
                     
                     <?php 
                      
                       $sqlc = "SELECT * FROM  cycle  ";

                        $statementc = $db->prepare($sqlc);
                        $statementc->execute();
                        $cyc = $statementc->fetchAll(PDO::FETCH_OBJ);
                      ?>

      <?php 
         foreach ($cyc as $rowc) {
         	$cycle = $rowc->id_cycle ;

      ?>
       
      
<div class="accordion accordion-secondary">
 <div class="card" style="background-color:blue; padding: 0; margin:0;">
       
       <div style="width: 98%; background-color: #48ABF7 !important;  border-color: #48ABF7 !important; border: 0px solid !important; border-radius: 10px !important;  margin-left: 2%; margin-top: 7px; margin-bottom: 3px ; padding: 5px; padding-right: 40px; " class="card-header collapsed" id="headingThree" data-toggle="collapse" data-target="#collapseThree<?php echo $rowc->nom_cycle ?><?php echo $row->nom_dprtm ?>" aria-expanded="false" aria-controls="collapseThree" >
			    <div class="span-icon"></div>
		     	<div style="color : white; margin-left: 3%;" class="span-title">
			      	<?php echo $rowc->nom_cycle ?>
			    </div>
			    <div style="color:white;" class="span-mode"></div>
		   </div>
	   
       <div id="collapseThree<?php echo $rowc->nom_cycle?><?php echo $row->nom_dprtm ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
     
             <!---------------------- filieres ----------------------->
              
                <?php 
                  $sqlf = "SELECT * FROM  filiere f INNER join departement d on f.id_departement = d.id_dprtm INNER join cycle c on 
                           f.id_cycle = c.id_cycle INNER join professeur p on f.coorFiliere = p.id_prof where f.id_departement = '$dprtm' and f.id_cycle = '$cycle' ";
                  $statementf = $db->prepare($sqlf);
                  $statementf->execute();
                  $fil = $statementf->fetchAll(PDO::FETCH_OBJ);
                ?>

                <?php 
                  foreach ($fil as $rowf) {
                  	$filiere = $rowf->id_filiere ;
                ?>
       
      
               <div class="accordion accordion-secondary">
                <div class="card"  style="background-color:blue; padding: 0; margin:0;">
       
                  <div style="width: 96%; background-color: white !important; color: #1269DB;  border-radius: 10px !important; border-color: black !important; border: 1px solid !important; margin-left: 3.9%; margin-top: 7px; margin-bottom: 3px ; padding: 5px; padding-right: 40px; " class="card-header collapsed" id="headingThree" data-toggle="collapse" data-target="#collapseThree<?php echo 
                  $rowf->intitule_filiere ?>" aria-expanded="false" aria-controls="collapseThree" >
			              <div class="span-icon"></div>
		     	          <div style="color : #1269DB; margin-left: 2%;" class="span-title"><?php echo $rowf->intitule_filiere ?></div>
			              <div style="color:#1269DB;" class="span-mode"></div>
		              </div>
	   
                  <div id="collapseThree<?php echo $rowf->intitule_filiere?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">

     
                  <!---------------------- Semestres ----------------------->
              
                       


                            	<?php 
                                 $sqlm = "SELECT  m.intitule_module ,lm.semestre FROM liste_modules lm INNER join 
                                          module m on m.id_module=lm.id_module INNER JOIN filiere f on f.id_filiere=lm.id_filiere INNER JOIN 
                                          professeur p on p.id_prof=f.coorFiliere where f.id_filiere = '$filiere' group by lm.semestre ";

                                 $statementm = $db->prepare($sqlm);
                                 $statementm->execute();
                                 $sem = $statementm->fetchAll(PDO::FETCH_OBJ);
                              ?>	                
                   
                              <?php
								                  foreach ($sem as $result) {
								              ?>
                 
		                          
                                    
		                           
	                                       <button style="width: 93%; background-color: white !important; color: #505050; border-color: grey !important; margin-left: 7%; border-radius: 10px;
	                                       margin-top: 7px; margin-bottom: 3px ; padding: 5px;  text-align: left;" class="btn btn-primary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo $result->semestre?>" aria-expanded="false" aria-controls="collapseExample">
		                                      <div style="margin-left: 5% !important;" class="span-title"><?php echo $result->semestre ;?></div>
	                                       </button>
                   
                                      <div class="collapse" id="collapseExample<?php echo $result->semestre?>">
	                                      <div class="card card-body" >
		                                       <div class="card">
									                            <div class="card-title"><?php echo $result->semestre?> </div>
			                        <div class="card-body"  style="background-color:white  ;">
									                                 <table class="table table-hover">
										                                  <thead>
										                                  	<tr>
												                                  <th scope="col">Intitulé module</th>
												                                  <th style="text-align: center;" colspan="3" scope="col">Professeur 
												                                  	  <br> Cours / TD / TP</th>
												                                  <th style="text-align: center;">Action</th>
																				          			</tr>
									                                  	</thead>
										                                  <tbody>
																					            	<tr>
												                                
												                                  <?php 
                      
                                                          $sql = "SELECT  lm.id_module as idmod ,m.intitule_module as modul ,p.nomPrenom_prof as profc , pp.nomPrenom_prof as proft , ppp.nomPrenom_prof as proftt FROM
                                                                  liste_modules lm INNER JOIN module m on m.id_module=lm.id_module INNER JOIN
                                                                  filiere f on f.id_filiere=lm.id_filiere LEFT JOIN professeur p on lm.prof_cours=
                                                                  p.id_prof LEFT JOIN professeur pp on lm.prof_TD = pp.id_prof LEFT JOIN professeur ppp on lm.prof_TP=
                                                                  ppp.id_prof where lm.semestre='$result->semestre' AND lm.id_filiere = '$filiere'
                                                                  ";
                                                          $statement = $db->prepare($sql);
                                                          $statement->execute();
                                                          $mod = $statement->fetchAll(PDO::FETCH_OBJ);
                         
							                                        	  foreach ($mod as $modules) {?>
										                                    		
											                                     	<td><?php echo $modules->modul; ?></td>
											                                     	<td style="text-align: center;"><?php echo $modules->profc; ?></td>
											                                     	<td style="text-align: center;"><?php echo $modules->proft; ?></td>
											                                     	<td style="text-align: center;"><?php echo $modules->proftt; ?></td>
											                                     	<td>
													                              <div class="form-button-action">
															                                <button type="button" class="btn btn-link btn-primary btn-lg"  lass="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#editRowModal">
																                                      <i class="fa fa-edit"></i>
															                                </button>
										                                          <a  href="delete_notif.php?Id="  onclick="return confirm('voulez Vous  vraiment supprimer ce  champs ?');">
										          	                                   <button type="button" class="btn btn-link btn-danger" data-original-title="Remove" >
															                                           <i class="fa fa-times"></i>
															                                     </button>
															                                </a>
														                                  </div>
												                                  	</td>
												                                
												                                </tr>
											                                    <?php ;}?>

										                                 </tbody>
									                                 </table>
								                                </div>
							                               </div>
							                            </div>
			                                 </div>
                            
                            <?php ;}?>


                        








              



                  <!------------------------------------------------------->

       <div class="card-body"  style="background-color:#F8FBFC "> 
				  <div class="right"><br><br>
			 	     <center>
			 	        <a style="padding: 15px; font-weight: bold;" href="" class="badge badge-primary"data-toggle="modal" data-target="#modifierFiliere<?php echo $rowf->id_filiere?>">
			 	           Modifier la filière
			 	        </a> 

			 	        <a style="padding: 15px; font-weight: bold;" href="controle/delete_filiere.php?id_filiere=<?php echo $rowf->id_filiere?>" 
			 	        	 onclick="return confirm('êtes-vous sûr de vouloir supprimer cette filière ?');"
			 	        	 class="badge badge-danger">Supprimer la filière</a>

			 	        <a style="padding: 15px; font-weight: bold; background-color: #2BB930 ;" href="controle/delete_coord_filiere.php?id_filiere=<?php echo $rowf->id_filiere?>" 
			 	        	 onclick="return confirm('êtes-vous sûr de vouloir supprimer le coordinateur de  cette filière ?');"
			 	        	 class="badge badge-danger">Supprimer le coordinateur de la filière</a>

			 	        <a style="padding: 15px; font-weight: bold; background-color: #5C55BF ;" href="" class="badge badge-primary"data-toggle="modal" data-target="#ajouterModuleFiliere<?php echo $rowf->id_filiere?>">
			 	           Ajouter Modules
			 	        </a> 

			 	     </center>
			    </div>
			 </div>

		   <!-- Modal Modifier filiere-->

		   <form method="POST" action="controle/update_filiere.php">
          <div class="modal fade" id="modifierFiliere<?php echo $rowf->id_filiere?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	           <div class="modal-dialog modal-dialog-centered" role="document">
		            <div class="modal-content">
			             <div class="modal-header">
				               <h5 class="modal-title" id="exampleModalLongTitle">Modifier Filière</h5>
				               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                <span aria-hidden="true">&times;</span>
				               </button>
			              </div>
			 
			              <div class="modal-body">
				               <div class="form-group ">
				                  <input type="hidden" name="id_filiere" value="<?php echo $rowf->id_filiere ;?>">
			                    <label>Filiere</label>
                          <input type="text" name="filiere" class="form-control" rows="15" value="<?php echo $rowf->intitule_filiere ;?>" >



                          <label>Coordinateur</label>
                          <select class="form-control" name="coord" id="exampleFormControlSelect1">
		              	         	<option value="<?php echo $rowf->id_prof ;?>" selected><?php echo $rowf->nomPrenom_prof ;?></option>

		                          <?php 
                              $sql = "SELECT * from professeur ORDER BY nomPrenom_prof ";
                              $statement = $db->prepare($sql);

                              $statement->execute();
                              $coord = $statement->fetchAll(PDO::FETCH_OBJ);
                       
								              foreach ($coord as $ro) 	{?>
			                           <option value="<?php echo $ro->id_prof ?>"><?php echo $ro->nomPrenom_prof ?></option><?php ;}?>
		                      </select>


                          <label>Cycle</label>
                          <select class="form-control" name="cycle" id="exampleFormControlSelect1">
		              	         <option value="<?php echo $rowf->id_cycle ;?>" selected><?php echo $rowf->nom_cycle ;?></option>
			          
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
		              	         <option value="<?php echo $rowf->id_dprtm ;?>" selected><?php echo $rowf->nom_dprtm ;?></option>
			          
		                          <?php 
                              $sql = "SELECT * from departement ";
                              $statement = $db->prepare($sql);
                              $statement->execute();
                              $d = $statement->fetchAll(PDO::FETCH_OBJ);
                       
								              foreach ($d as $ro) 	{?>
			                           <option value="<?php echo $ro->id_dprtm ?>"><?php echo $ro->nom_dprtm?></option><?php ;}?>
		                      </select>
                       </div>
		              	</div>
			              <div class="modal-footer">
				               <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">annuler</button>
				               <button type="submit" name="update_filiere" class="btn btn-primary btn-sm">Enregistrer les modification</button>
			              </div>
		           </div>
	           </div>
         </div>
       </form>

       <!-- Modal Ajouter modules filiere-->

     <?php if($rowf->nom_cycle == "Licence"){?>
   
                       
          <div  class="modal fade" id="ajouterModuleFiliere<?php echo $rowf->id_filiere?>">
             <div style="margin-left: 23% !important;"  class="modal-dialog modal-xl">
                <div style="width: 140% !important; " class="modal-content">
      
        <!-- Modal Header -->
                   <div class="modal-header">
                      <h4 class="modal-title">Ajouter les modules de la filière (Licence) </h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div>
        
        <!-- Modal body -->
                   <div class="modal-body">

                                <form  method="post" action="InsertModule2.php">
                            <div class="form-group">
                            <label for="exampleFormControlSelect1">Departement</label>
                            <?php
                            $sth = $db->prepare("SELECT nom_dprtm,id_dprtm from departement ");
                            $sth->execute(); 
                            $roww=$sth->fetchAll(); ?>
					        <select required class="form-control" name="departement" id="dprtm">
							<option selected>Choose...</option>
                            <?php foreach ($roww as $roww) {?>
                            <option value="<?=$roww['id_dprtm']?>"><?=$roww['nom_dprtm']?></option><?php } ?>
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
                        <option value="Semestre 1">Semestre 4</option>
                        <option value="Semestre 2">Semestre 5</option>
                        <option value="Semestre 3">Semestre 6</option>
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

     <?php }elseif($rowf->nom_cycle == "Master"){?>

              <div  class="modal fade" id="ajouterModuleFiliere<?php echo $rowf->id_filiere?>">
             <div style="margin-left: 23% !important;"  class="modal-dialog modal-xl">
                <div style="width: 140% !important; " class="modal-content">
      
        <!-- Modal Header -->
                   <div class="modal-header">
                      <h4 class="modal-title">Ajouter les modules de la filière (Master) </h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div>
        
        <!-- Modal body -->
                   <div class="modal-body">

                                <form  method="post" action="InsertModule2.php">
                            <div class="form-group">
                            <label for="exampleFormControlSelect1">Departement</label>
                            <?php
                            $sth = $db->prepare("SELECT nom_dprtm,id_dprtm from departement ");
                            $sth->execute(); 
                            $roww=$sth->fetchAll(); ?>
					        <select required class="form-control" name="departement" id="dprtm">
							<option selected>Choose...</option>
                            <?php foreach ($roww as $roww) {?>
                            <option value="<?=$roww['id_dprtm']?>"><?=$roww['nom_dprtm']?></option><?php } ?>
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

       <?php } ?>
                 </div>
               </div>
              </div>

              <?php } ?>

             
              
             <!------------------------------------------------------->


       <div class="card-body"  style="background-color:#F8FBFC "> 
				  <div class="right"><br><br>
			 	     <center>
			 	        <a style="padding: 15px; font-weight: bold;" href="" class="badge badge-primary"data-toggle="modal" data-target="#modifierCycle<?php echo $rowc->id_cycle?>">Modifier le cycle </a> 
			 	        <a style="padding: 15px; font-weight: bold;" href="controle/delete_cycle.php?id_cycle=<?php echo $rowc->id_cycle?>" 
			 	        	 onclick="return confirm('êtes-vous sûr de vouloir supprimer ce cycle ?');"
			 	        	 class="badge badge-danger">Supprimer le cycle</a>
			 	     </center>
			    </div>
			 </div>

		   <!-- Modal Modifier cycle-->

		   <form method="POST" action="controle/update_cycle.php">
          <div class="modal fade" id="modifierCycle<?php echo $rowc->id_cycle?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	           <div class="modal-dialog modal-dialog-centered" role="document">
		            <div class="modal-content">
			             <div class="modal-header">
				               <h5 class="modal-title" id="exampleModalLongTitle">Modifier Cycle</h5>
				               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                <span aria-hidden="true">&times;</span>
				               </button>
			              </div>
			 
			              <div class="modal-body">
				               <div class="form-group ">
				                  <input type="hidden" name="id_cycle" value="<?php echo $rowc->id_cycle  ?>">
			                    <label>Cycle</label>
                          <input type="text" name="cycle" class="form-control" rows="15" value="<?php echo $rowc->nom_cycle  ?>" >
                       </div>
		              	</div>
			              <div class="modal-footer">
				               <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">annuler</button>
				               <button type="submit" name="update_cycle" class="btn btn-primary btn-sm">Enregistrer les modification</button>
			              </div>
		           </div>
	           </div>
         </div>
       </form>

       <!-- Modal Modifier cycle-->


       </div>
 </div>
</div><?php } ?>

		   <!--------------------------------------------->
		   
			 <div class="card-body"  style="background-color:#F8FBFC "> 
				  <div class="right"><br><br>
			 	     <center>
			 	        <a style="padding: 15px; font-weight: bold;" href="" class="badge badge-primary"data-toggle="modal" data-target="#modifierDprtm<?php echo $row->id_dprtm?>">Modifier le département </a> 
			 	        <a style="padding: 15px; font-weight: bold;" href="controle/delete_dprtm.php?id_dprtm=<?php echo $row->id_dprtm?>" 
			 	        	 onclick="return confirm('êtes-vous sûr de vouloir supprimer ce département ?');"
			 	        	 class="badge badge-danger">Supprimer le département</a>
			 	        <a style="padding: 15px; font-weight: bold; background-color: #2BB930 ;" href="controle/delete_chef_dprtm.php?id_dprtm=<?php echo $row->id_dprtm?>" 
			 	        	 onclick="return confirm('êtes-vous sûr de vouloir supprimer le chef du département ?');"
			 	        	 class="badge badge-danger">Supprimer le chef du département</a>
			 	     </center>
			    </div>
			 </div>

		   <!-- Modal Modifier departement-->

		   <form method="POST" action="controle/update_dprtm.php">
          <div class="modal fade" id="modifierDprtm<?php echo $row->id_dprtm?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	           <div class="modal-dialog modal-dialog-centered" role="document">
		            <div class="modal-content">
			             <div class="modal-header">
				               <h5 class="modal-title" id="exampleModalLongTitle">Modifier Département</h5>
				               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                <span aria-hidden="true">&times;</span>
				               </button>
			              </div>
			 
			              <div class="modal-body">
				               <div class="form-group ">
				                  <input type="hidden" name="id_dprtm" value="<?php echo $row->id_dprtm ;?>">
			                    <label>Département</label>
                          <input type="text" name="dprtm" class="form-control" rows="15" value="<?php echo $row->nom_dprtm ;?>" >
                          
                          <label>Chef de département</label>
                          <select class="form-control" name="chefDprtm" id="exampleFormControlSelect1">
		              	         	<option value="<?php echo $row->idchef ;?>" selected><?php echo $row->chef ;?></option>

		                          <?php 
                              $sql = "SELECT * from professeur ORDER BY nomPrenom_prof ";
                              $statement = $db->prepare($sql);

                              $statement->execute();
                              $coord = $statement->fetchAll(PDO::FETCH_OBJ);
                       
								              foreach ($coord as $ro) 	{?>
			                           <option value="<?php echo $ro->id_prof ?>"><?php echo $ro->nomPrenom_prof ?></option><?php ;}?>
		                      </select>
                       </div>
		              	</div>
			              <div class="modal-footer">
				               <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">annuler</button>
				               <button type="submit" name="update_dprtm" class="btn btn-primary btn-sm">Enregistrer les modification</button>
			              </div>
		           </div>
	           </div>
         </div>
       </form>

       <!-- Modal Modifier departement-->


		</div>
	</div>
</div>

	<?php
}
	?>






				</div>
			</div>
	   </div>
	   </div>
	   </div>
		
    </div>



								</div>
								
							</div>
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
else {
    header('location:../login/index.php?message=must login');
}
?>