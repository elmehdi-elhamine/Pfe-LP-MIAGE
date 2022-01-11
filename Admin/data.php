<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","departements");

$sqlQuery = "SELECT COUNT(c.id_candidat) as vote ,p.nom_poste as poste,d.nom_dprtm,f.intitule_filiere as filiere ,pr.nomPrenom_Prof as candidat FROM vote v 
INNER JOIN candidats c on c.id_candidat=v.id_candidat
INNER JOIN poste p on p.id_poste=c.poste 
inner join professeur pr on pr.id_prof=c.professeur

LEFT JOIN filiere f on f.id_filiere=p.id_filiere
left join departement d on d.id_dprtm=p.id_departement
 
 WHERE f.id_filiere=24
 GROUP BY c.id_candidat";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>