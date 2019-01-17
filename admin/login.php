<?php 
include '../endpoints/db_connection.php';
$conn = OpenCon();
$un = $_POST['username'];
$pw = $_POST['password'];


$sql = "select * from admin_check where Username='".$un."' and Password='".$pw."'";

$result = $conn->query($sql);

if($result->num_rows > 0){
    $details = $result->fetch_assoc();
    session_start();
    $_SESSION['username'] = $details['Username'];
    $_SESSION['loggedin'] = true;
    // echo "come";
    header("location: ../endpoints/data.php?success=1");
}else{
    // echo "not come";
    header("location: index.php?error=1");
}
CloseCon($conn); 
?>
 