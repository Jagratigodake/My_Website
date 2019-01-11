<html>
    <head>
        <meta charset="UTF-8">
        <title>database connections</title>
    </head>
    <body>

  
    <?php 
include 'db_connection.php';
$conn = OpenCon();
$sql = "select * from contact_info";
?>
        <div>
            <td></td>
         <table border="1" width="100%" height="100%">
         <tr>
         <th>NAME</th>
          <th>CONTACT_NO</th>
          <th>E-MAIL</th>
          <th>SUBJECT</th>
          <th>MESSAGE</th>
        
            </tr>

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
                <td><?php echo $row['subject'] ;?></td>
                <td><?php echo $row['Message'] ;?></td>
              
            </tr>
        <?php
            }
          
             }
             CloseCon($conn); ?>

             </table>
            </div>
    </body>
</html>