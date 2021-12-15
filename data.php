<?php 
    require_once 'dbconnect.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT RGB, COUNT(RGB) as num FROM patterns GROUP BY RGB";

    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
 
        while($row = mysqli_fetch_assoc($result)) {
            
            $labels[] = $row['RGB'];
            
            $data[] = $row['num'];
        }
    }
    mysqli_close($conn);
?>
 
<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChartJs</title>
 
  </head>
  
  <body>
      
 
    <canvas id="myChart" width="400" height="200"></canvas>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
    <script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        //type: 'bar',
        //type: 'line',
        type: 'pie',
        data: {
            labels: <?=json_encode($labels)?>,
            datasets: [{
                label: 'Report',
                data: <?=json_encode($data, JSON_NUMERIC_CHECK);?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
             responsive: true,
             title: {
                display: true,
                text: 'ตัวอย่างการใช้งาน Chart Js'
            }
        }
    });
    </script>
        
  </body>
</html> -->