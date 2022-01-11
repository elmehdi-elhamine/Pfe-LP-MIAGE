<?php
session_start();
include('../settings/dbconfig.php');
if (isset($_SESSION['professeur'])) {?>
	


<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Page PROFESSEUR</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<!-- Fonts and icons -->
	<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
	<script src="/assets/js/plugin/webfont/webfont.min.js"></script>
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

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
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
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
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
									<div class="dropdown-title">You have <?= $count?> new notification</div>
								</li>
								<li>
									<?php foreach ($result as $result) {?>
										<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<img src="images/notif.png" style="width:40px; 
												height:40px; margin-top: 15px;" class="notif-icon notif-primary"></img>
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
										<div class="user-box"><a style="font-size: 13px;" class="btn btn-xs btn-secondary btn-sm" href="profile_prof.php">
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
							<a  href="acceuil_prof.php">
								<i class="fas fa-home"></i>
								<p>Acceuil</p>
								<span class="caret"></span>
							</a>
							
						</li>

						<li class="nav-item">
							<a  href="Departements_prof.php">
								<i class="fas fa-layer-group"></i>
								<p style="font-weight: bold;">Département</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="modules_prof.php">
								<i class="fas fa-th-list"></i>
								<p style="font-weight: bold;">Modules</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="equipe_pedag_prof.php">
								<i class="fas fa-users"></i>
								<p style="font-weight: bold;">Equipe pédagogique</p>
							</a>
						</li>
						<li class="nav-item">
							<a  href="demandeFiliere.php">
								<i class="fas fa-plus-square"></i>
								<p style="font-weight: bold;">Accréditation d'une filière</p>
							</a>
						</li>
							<li class="nav-item">
							<a  href="brouillon.php">
							<i class="fa fa-trash"></i>
								<p>Brouillons</p>
							</a>
						</li>
						<li class="nav-item">
							<a  href="acceuil_vote.php">
								<img src="images/voteimg.jpg" alt="..." class="avatar-img rounded avatar avatar-xs" style="font-size:120px;color:white;">

								<p style="font-weight: bold;">&nbsp&nbsp&nbspEspace de vote</p>
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
                            <div class="panel-header bg-primary-gradient">
                                <div class="page-inner py-5">
                                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">

                                        <div>
                                            <h2 class="text-white pb-2 fw-bold">Ecpace de vote</h2>
                                        </div>
                                        <div class="ml-md-auto py-2 py-md-0">
								                <a href="acceuil_vote.php" class="btn btn-secondary btn-round">Acceuil de vote</a>
							            </div>
                                    </div>
                                </div>
                            </div>


    
        
    <div class="card text-center">
	<div class="card-header">
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

	
	</div>
	
								<div class="card-header" style="background-color:#EAF2F9;">
									<div class="card-title" >Espace de vote</div>
								</div>
								<div class="card-body col-md-10 ml-auto mr-auto ">
									<?php
									       $date =date("Y-m-d") ; 
									     
                                           $election=$_GET['id_election'];
                                           $date_election=$_GET['date_election'];
											 $coord=$_SESSION['professeur']['id_prof'];
                                                                                 $sql = "SELECT
    *
FROM
    poste p
INNER JOIN election e ON
    p.id_election = e.id_election
INNER JOIN candidats c ON
    c.poste = p.id_poste
LEFT JOIN filiere f ON
    f.id_filiere = p.id_filiere
LEFT JOIN departement d ON
    d.id_dprtm = p.id_departement
WHERE
    p.id_departement IN(
    SELECT
        d.id_dprtm
    FROM
        liste_modules lm
    INNER JOIN filiere f ON
        lm.id_filiere = f.id_filiere
    INNER JOIN departement d ON
        d.id_dprtm = f.id_departement
    WHERE
        lm.prof_cours='$coord' or lm.prof_TD='$coord' or lm.prof_TD='$coord'
    GROUP BY
        d.id_dprtm
) OR p.id_filiere IN(
    SELECT
        f.id_filiere
    FROM
        liste_modules lm
    INNER JOIN filiere f ON
        lm.id_filiere = f.id_filiere
    INNER JOIN departement d ON
        d.id_dprtm = f.id_departement
    WHERE
       lm.prof_cours='$coord' or lm.prof_TD='$coord' or lm.prof_TD='$coord'
    GROUP BY
        f.id_filiere
) AND
STATUS
    = 'active' AND e.id_election = '$election' AND p.id_poste NOT IN(
    SELECT
        c.poste
    FROM
        poste p
    INNER JOIN candidats c ON
        c.poste = p.id_poste
    WHERE
       c.professeur='$coord' or c.professeur='$coord' or c.professeur='$coord'
)
GROUP BY
    p.id_poste";
                                            $statement = $db->prepare($sql);
                                            $statement->execute();
                                            $poste = $statement->fetchAll(PDO::FETCH_OBJ);
                                            if ($date_election===$date) {?>
                                      <div class="table-responsive">      	
									<table id="add-row" class="table  table-bordered table-hover" cellspacing="0" width="100%" >
										<thead>
											<tr style="background-color:#EEF5FA;">
												<th scope="col" >Poste</th>
												<th scope="col">Département/Filiere</th>
												<th scope="col">maximum de vote</th>
												<th scope="col">espace vote</th>
												
											</tr>
										</thead>
										<tbody>
											
                                           <?php foreach ($poste as $row) {?>
											<tr>
												
												
												<td style="background-color: "><h4><?php echo $row->nom_poste ?></h4></td>
												 <td> 
												    <p style="color:#033C8D ;font-weight: bold;"><?php echo $row->nom_dprtm ?></p>
													<p style="color:#109D12 ;font-weight: bold;"><?php echo $row->intitule_filiere ?></p>
												</td>
												<td><?php echo $row->max_vote ?></td>
												<td style="background-color: #EEF5FA  "><a href="espace_vote.php?id_poste=<?php echo $row->id_poste ?>&amp;id_election=<?php echo $election ?>&amp;date_election=<?php echo $date_election ?>" role="button" class="btn btn-info">Voter</button></td>
											</tr>
											<?php ;}} else { ?>
	
	<?php 
echo "<strong >  pas encore diponible !</strong> </br> 
<strong style=color:red> disponible le : ".$_GET['date_election'];
                                        	;}?>	
										</tbody>
									</table>
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
	<script>$('#add-row').DataTable({
	"pageLength": 5,
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