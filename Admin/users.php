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
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
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
                                        <div>
                                           
                                        </div>
                                        <div class="ml-md-auto py-2 py-md-0">
											<button type="button" class="btn btn-secondary btn-round" data-toggle="modal" data-target="#myModal">
                                               Ajouter un professeur
                                            </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter un utilisateur</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<diV class="container-fluid">
				<form method="post" class="needs-validation" enctype="multipart/form-data" action="adduser.php">
				<div class="form-row">
															<div class="form-group col-md-4">
															<label for="NomPrenom">Nom prenom</label>
															<input type="text" name="NomPrenom" class="form-control" id="NomPrenom" placeholder="NomPrenom" required>
															</div>
															<div class="form-group col-md-4">
															<label for="Email">Email</label>
															<input type="email" name="Email" class="form-control" id="Email" placeholder="Email" required>
															</div>
															<div class="form-group col-md-4">
															<label for="CIN">CIN</label>
															<input type="text" name="CIN" class="form-control" id="CIN" placeholder="CIN" required>
															</div>
				</div>
				<div class="form-row">
															<div class="form-group col-md-6">
															<label for="Grade">Grade</label>

															<select id="Grade" name="Grade" class="form-control" required>
															<option>A</option>
															<option>B</option>
															<option>C</option>
															</select>
															</div>
															<div class="form-group col-md-6">
														<label for="Type">Type</label>

															<select id="Type" name="Type" class="form-control" required>
															<option value="professeur de l'enseignement superieur">professeur de l'enseignement superieur</option>
														<option value="professeur assistant">professeur assistant</option>
															<option value="professeur habilité">professeur habilité</option>
															<option value="professeur non permanent">professeur non permanent</option>
															</select>
														</div>
													
														
									</div>
									<div class="form-row">
															<div class="form-group col-md-6">
															<label for="Anciennete">Anciennete</label>	
														
														<input type="number" min="0" name="Anciennete" required class="form-control" id="Anciennete" placeholder="Anciennete">
														</div>
														<div class="form-group col-md-6">
														<label for="Age">Age</label>
														<input type="number"min="0" name="Age" required class="form-control" id="Age" placeholder="Age">

														</div>
														</div>
														<div class="form-row">
															<div class="form-group col">
															<label for="EquipePedagogique">Equipe Pédagogique</label>
															<select id="EquipePedagogique" required name="EquipePedagogique" class="form-control">
															<?php
															$sth = $db->prepare("SELECT * from equipe_pedagogique");
															$sth->execute(); 
															$result = $sth->fetchAll();
															foreach ($result as $result) {?>
															<option value="<?php echo $result['id_equipe'] ?>"><?= $result['intitule_equipe']?> </option>
																<?php } ?>
															
															</select>

														
														
														</div>
														</div>
											<div class="form-row">
											  <div class="form-group col-md">
														<label for="Specialite">Specialite</label>
													<select class="form-control" id="Specialite"  name="Specialitee">
													<option value="informatique ">informatique</option>
													<option value="economie et gestion">economie et gestion</option>
													<option value="droit arabe">droit arabe</option>
													<option value="droit français">droit français</option>
													<option value="mathématique">mathématique</option>
												</select>
														</div>
														




											</div>
											<div class="form-row">
											<div class="custom-file form-group col-md-6">
														 
														 <input type="file" class="custom-file-input form-control" id="Image" name="Image" accept="image/png, image/jpeg, image/jpg">
														 <label class="custom-file-label" for="document">Choose image...</label>
													 </div>
													 <div class="custom-file form-group col-md-6">
														 
														 <input type="file" class="custom-file-input form-control" id="cv" name="cv" accept="application/pdf">
														 <label class="custom-file-label" for="document">Choose CV...</label>
													 </div>




											</div>			
											<button type="submit" name="submit" class="btn btn-primary mt-3">submit</button>			
									
									

				</form>


			</div>

        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
                                        
										</div>
                                    </div>
                                </div>
                            </div>

    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-bdoy">
				<?php
			
				$sth = $db->prepare("SELECT * from professeur");
				$sth->execute(); 
				$result = $sth->fetchAll();
				
				
				?>
			<div class="table-responsive">
            <table id="myTable" class="table table-hover table-bordered">
    <thead>
      <tr class="table-primary">
		<th>Image</th>
        <th>Nom Prenom</th>
        <th>Email</th>
        <th>CIN</th>
        <th>Specialite</th>
        <th>Grade</th>
        <th>Anciennite</th>
        <th>Type</th>
        
      </tr>
    </thead>
    <tbody id="tableBody">
		<?php foreach ($result as $result) {?>
			<tr>
			<td><?php echo "<img class='rounded-circle' style='width: 100px' src='../images/".$result['Image']."'>" ?></td>
			<td><?php echo $result['nomPrenom_prof']; ?></td>
			<td><?php echo $result['email']; ?></td>
			<td><?php echo $result['CIN_prof']; ?></td>
			<td><?php echo $result['specialite']; ?></td>
			<td><?php echo $result['grade']; ?></td>
			<td><?php echo $result['anciennete']; ?></td>
			<td><?php echo $result['type_prof']; ?></td>
		
			
			



			</tr>
			<?php } ?>
          
      
    </tbody>
  </table>
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
    $('#myTable').DataTable({
		lengthMenu: [3, 5, 10, 20, 50, 100, 200, 500],
		"ordering": false,
	});
	

  clockUpdate();
  setInterval(clockUpdate, 1000);
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
	function fetch_data(){
		$.ajax({
			url:"usersListe.php",
			method:"POST",
			success:function(data){
				$("#tableBody").html(data);
			}
		});
	}

});
</script>
</html>
<?php	
}
else {
    header('location:../login/index.php?message=must login');
}
?>
