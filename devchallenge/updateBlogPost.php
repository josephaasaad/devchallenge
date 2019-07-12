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

$blogid = $_GET['id'] +1;
$title = $_GET["title"];
$author= $_GET["author"];
$previewtext=$_GET["preview_text"];
$body=$_GET["body"];

$sql = "UPDATE blogpost SET Title='$title' , Author='$author', PreviewText='$previewtext', Body='$body' WHERE BlogID=$blogid";
 
if (mysqli_query($conn, $sql)) {
    header('Location: ./myhome.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}


$conn->close();
?>

</body>

</html>