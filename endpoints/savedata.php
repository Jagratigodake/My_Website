
<?php
// define variables and set to empty values
$name = $email = $subject = $Message = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $name = test_input($_GET["name"]);
  $email = test_input($_GET["email"]);
  $subject = test_input($_GET["subject"]);
  $Message = test_input($_GET["Message"]);

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
echo $name;
echo $email;
echo $subject;
echo $Message;

?>

