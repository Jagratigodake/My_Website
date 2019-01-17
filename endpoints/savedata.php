<?php 
include 'db_connection.php';
// define variables and set to empty values
$name = $contactno = $email= $Age = $subject = $Message = "";

$id = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6);
//echo "id is".$id;
 


$conn = OpenCon();
 
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $name = test_input($_GET["name"]);
  $contactno = test_input($_GET["contactno"]);
  $email = test_input($_GET["email"]);
  $Age  =  test_input($_GET["age"]);
  $subject = test_input($_GET["subject"]);
  $Message = test_input($_GET["Message"]);

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "insert into contact_info(id,name,contact_no,email,age,subject,Message) values('$id','$name','$contactno','$email','$Age','$subject','$Message')";

// $sql="INSERT INTO contact_info (id,name, email, subject, Message) VALUES ('".$id."',''".$name."','".$email."','".$subject."', '".$Message."');
 
 
if(!$result = $conn->query($sql)){
 die('There was an error running the query [' . $conn->error . ']');
//header("location: ../index.php?message=0");
}
else
{
 // header("location: ../index.php?message=1");
echo "thanku";
}
// else
// {
// echo "Please fill Name and Email";
// }
 echo $name;
 echo $contactno;
 echo $email;
 echo $Age;
 echo $subject;
 echo $Message;

CloseCon($conn);

?>

