<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
    <div class="limiter">
      <div class="container-table100">
        <div class="wrap-table100">
          <div class="table100 ver1 m-b-110">
            <table data-vertable="ver1">
              <thead>
                <tr class"row100 head">
                  <?php
                    require_once('funzioni.php');
                    for ($j=0; $j <count($numeri) ; $j++) {
                      $num=$j+1;
                      echo "<th class=\"column100 column$num\" data-column=\"column$num\" >". form_stringa($csv[0][$numeri[$j]]). "</th>";
                    }
                  ?>
                  <th class="column100 column<?php count($numeri)?>" data-column="column<?php count($numeri)?>" >Rapporto</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  for ($i=0; $i <$giorni ; $i++) {
                ?>
                <tr class="row100">
                  <?php
                    for ($j=0; $j <count($numeri) ; $j++) {
                      $num=$j+1;
                      if($j==7){
                        $contagi[]=$csv[$size-$i][$numeri[$j]];
                      }

                      if ($j==0) {
                        echo "<td class=\"column100 column$num\" data-column=\"column$num\" >". form_data($csv[$size-$i][$numeri[$j]]). "</td>";
                        $date[]=form_data($csv[$size-$i][$numeri[$j]]);
                      }else {
                        echo "<td class=\"column100 column$num\" data-column=\"column$num\" >". $csv[$size-$i][$numeri[$j]]. "</td>";
                      }
                    }
                  ?>
                  <td class="column100 column<?php count($numeri)?>" data-column="column<?php count($numeri)?>"> <?php echo rapporto( $csv[$size-$i][6], $csv[$size-$i][14]); ?></td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <canvas id="myCanvas" width="200" height="100"></canvas>
    </div>
    <script type="text/javascript">



      var  myCanvas = document.getElementById("myCanvas").getContext('2d');
      var myLabels = <?= json_encode($date) ?>;
      var myData = <?= json_encode($contagi) ?>;
      var chart = new Chart(myCanvas, {
        type: 'line',
        data: {
          labels: myLabels,
          datasets:[{
            label: "Positivi",
            data: myData,
            backgroundColor:[
              '#0d47a1',
              '#1565c0',
              '#1976d2',
              '#1e88e5',
              '#2196f3',
              '#42a5f5',
              '#64b5f6',
              '#90caf9',
              '#bbdefb',
              '#e8eaf6'
            ],
          }]
        },
        options:{
          title:{
            display: true,
            text: "Numeri dei Posiivi",
            fontSize: 25,
            fontColor: "#36304a"
          },
          legend:{
            display: true,
            position: "right"
          }
        }
      });
    </script>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
