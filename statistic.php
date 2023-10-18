<?php 
session_start();
if(isset($_SESSION['username'])){
  include 'adminheader.php';?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Date', 'UserID'],
          <?php 
          @$conn=mysqli_connect("localhost","root","","notreshop");
          $sql = "SELECT * FROM users";
          $fire= mysqli_query($conn,$sql);
          while($result= mysqli_fetch_assoc($fire)){
            echo "['".$result['Date']."',".$result['UserID']."],";
          }
          ?>
        ]);

        var options = {
          title: 'Users per day'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['date', 'id'],
          <?php 
          @$conn=mysqli_connect("localhost","root","","notreshop");
          $sql = "SELECT * FROM orders";
          $fire= mysqli_query($conn,$sql);
          while($result= mysqli_fetch_assoc($fire)){
            echo "['".$result['date']."',".$result['id']."],";
          }
          ?>
        ]);

        var options = {
          title: 'Orders per day'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <H1 class="text-center">Statistics</H1>
    <div id="piechart" style="width: 670px; height: 500px;float:left;"></div>
    <div id="piechart2" style="width: 670px; height: 500px;float:right;"></div>
   <style>
    .text-center{
		text-align: center;
		padding-bottom: 2rem;
		padding-top: 3rem;
		font-size: 65px;
		font-weight: bold;
		color: #bac34e;
    }
	
  
	.text-center:hover{
		color: #1d243d;
	
	}
   </style>
  </body>
</html>
<?php }else{
    header('Location:adminlogin.php');
    exit(); 
}


