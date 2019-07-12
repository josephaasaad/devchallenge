<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "devchallenge";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$title = $_GET["title"];
$author= $_GET["author"];
$previewtext=$_GET["preview_text"];
$body=$_GET["body"];
$sql= "INSERT INTO blogpost (title, author, previewtext, body) VALUES
('$title','$author','$previewtext','$body')";
 
 if ($conn->query($sql) === TRUE) {
    header('Location: ./myhome.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>

</body>

</html>