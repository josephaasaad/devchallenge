<!DOCTYPE html>
<html>
<body>

<?php
function dbConnect($sql){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "devchallenge";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $queryResults = mysqli_fetch_all($result, MYSQLI_BOTH);
        $conn->close();
        return $queryResults;
    }
    else {
        //echo "Error getting record: " . mysqli_error($conn); 
        $conn->close();
    }
    

}
function dbConnectUpdate($sql){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "devchallenge";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $result = $conn->query($sql);

    if (mysqli_query($conn, $sql)) {
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    

}
function getBlogPosts(){

    $sql = "SELECT * FROM blogpost";
    $blogPosts = dbConnect($sql);
    return $blogPosts;
}

function getBlogPost($id){

    $sql = "SELECT * FROM blogpost where BlogID = $id+1";
    $blogPosts = dbConnect($sql);
    
    return $blogPosts;
}

function checkSharedLinks($link){
    $sql = "SELECT * FROM sharedlinks";
    $sharedlinks = dbConnect($sql);
    foreach ($sharedlinks as $links){
        if ($link == $links["SharedLinks"]){
          $id = $links["BlogID"]-1;
          $curnumshares = $links["NumShares"];
          updateNumShares($id,$curnumshares,$link);
          break;
        }
      } 
    return $id;
}

function updateNumShares($int,$curnumshares,$string){ //function parameters, two variables.
    $sql = "UPDATE sharedlinks SET NumShares = $curnumshares+1 WHERE BlogID=$int+1 and SharedLinks='$string'";
    dbConnectupdate($sql);
    
    
}

function updateSharedLinks($int,$string){ //function parameters, two variables.
    
    $sql= "INSERT INTO sharedlinks (blogid,sharedlinks) VALUES
    ($int,'$string')";
    dbConnectupdate($sql);
  
    
}

//$conn->close();
?> 


</body>
</html>