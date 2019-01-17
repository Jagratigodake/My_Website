<?php

session_start();

if($_SESSION['loggedin'] != true){
    header("location: ../admin/index.php");
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>database connections</title>
        <meta name="viewport" content="width=device-width, initial-scale=2">
        <!-- Latest compiled and minified CSS -->
        <script src="../Chart.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




    </head>
    <body>

    <?php
		if(isset($_GET['success'])){
			if($_GET['success'] == 1){
				?>
				<script type='text/javascript'>alert('Logged in');</script>
				<?php
			}
		}
	?>
  
    <?php 
include 'db_connection.php';
$conn = OpenCon();
$sql = "select * from contact_info";
?>
         <div class="container">
         <canvas id= "barChart"></canvas>
        <center><h2 >All Contacts</h2></center>
         <table class="table table-striped  table-hover table-responsive nowrap"  border="1" width="100%" height="100%">
         
         <thead class="thead-dark">
         <tr>
         <th>NAME</th>
          <th>CONTACT_NO</th>
          <th>E-MAIL</th>
          <th> AGE</th>
          <th>SUBJECT</th>
          <th>MESSAGE</th>
        
            </tr>
            </thead>
</div>
        <?php
        $result = $conn->query($sql);
        if($result->num_rows  > 0){

            while($row= $result->fetch_assoc())
            {

            
// Fetch each row from signup Table  -->

             
                ?>
                 
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['contact_no']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['subject'] ;?></td>
                <td><?php echo $row['Message'] ;?></td>
              
            </tr>
        <?php
            }
          
             }
             ?>

             </table>
            </div>
    </body>
   <?php
   

     $query = "select age from contact_info where age BETWEEN 1 and 30";
    $sql = "select age from contact_info where age BETWEEN 31 and 60";
    $res = "select age from contact_info where age BETWEEN 60 and 100;";
    
    // (mysqli__query($conn, $query)) ;
    // (mysqli__query($conn, $sql));
    // (mysqli__query($conn, $result)); 


$result = mysqli_query($query)  or die(mysql_error());
$result1 = mysqli_query($sql) or die(mysql_error());
$result2 = mysqli_query($res)  or die(mysql_error()); 
    
    // $mysqli_query($result);
    // $mysqli_query($query);
    // $mysqli_query($sql);
    // $mysqli_query($result);
  
    $row_cnt = $result->num_rows;
    $row_cnt1 = $result->num_rows;
    $row_cnt2 = $result->num_rows;
//    rowcount=  $mysqli_query->num_rows;
//    rowcount1 = int $mysqli_sql->num_rows;
//     rowcount2= int $mysqli_result->num_rows;

    //execute query
    CloseCon($conn); 
  ?> 
    <script> 
    var v1 = (<?php echo $query; ?>);
    var v2 =(<?php echo $sql; ?>);
    var v3 =(<?php echo $result; ?>);
     console.log{v1};
    var canvas = document.getElementById("barChart");
var ctx = canvas.getContext('2d');

// Global Options:
 Chart.defaults.global.defaultFontColor = 'black';
 Chart.defaults.global.defaultFontSize = 16;

var data = {
    labels: ["1-30,","31-60","61 above"],
      datasets: [
        {
            fill: true,
            backgroundColor: [
                'red','yellow','powderblue'],
            data: [v1,v2,v3],
// Notice the borderColor 
            borderColor:	['black', 'black'],
            borderWidth: [2,2]
        }
    ]
};

// Notice the rotation from the documentation.

var options = {
        title: {
                  display: true,
                  text: 'What happens when you lend your favorite t-shirt to a girl ?',
                  position: 'top'
              },
        rotation: -0.7 * Math.PI
};


// Chart declaration:
var myBarChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options
});

// Fun Fact: I've lost exactly 3 of my favorite T-shirts and 2 hoodies this way :

    </script>
</html>