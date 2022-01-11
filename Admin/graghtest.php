<?php
$con  = mysqli_connect("localhost","root","","departements");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT COUNT(c.id_candidat) as vote ,p.nom_poste as poste,d.nom_dprtm,f.intitule_filiere as filiere ,pr.nomPrenom_Prof as candidat FROM vote v 
INNER JOIN candidats c on c.id_candidat=v.id_candidat
INNER JOIN poste p on p.id_poste=c.poste 
inner join professeur pr on pr.id_prof=c.professeur

LEFT JOIN filiere f on f.id_filiere=p.id_filiere
left join departement d on d.id_dprtm=p.id_departement
 
 WHERE f.id_filiere=24
 GROUP BY c.id_candidat";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $candidats[]  = $row['candidat']  ;
            $votes[] = $row['vote'];
        }
 
 
 }
 ?>
 
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <title>Graph</title> 
    </head>
    <body>
        <div style="width:30%;hieght:20%;text-align:center">
            <h2 class="page-header" >Analytics Reports </h2>
            <div>Product </div>
            <canvas  id="chartjs_bar"></canvas> 
        </div>


        <script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($candidats); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($votes); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>    
    </body>
</html>