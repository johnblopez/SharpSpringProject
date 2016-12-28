<?php


function authenticateUser($uname,$pswrd) {

  //db connections
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "c1";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  //echo "Connected successfully";

  $uid = 0;
  
  //$hashedPass = password_hash($password, PASSWORD_DEFAULT);

  //echo $hashedPass;

  $sql = "SELECT id FROM users WHERE name='".$uname."' AND password='".$pswrd."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    //  echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["password"]. "<br>";
    $uid = $row["id"];
    }
  }

  $conn->close();

  return $uid;
} // end authenticateUser()


function renderNotes($userID) {

  //db connections
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "c1";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  //echo "Connected successfully";

  $auth = 0;
  
  //$hashedPass = password_hash($password, PASSWORD_DEFAULT);

  //echo $hashedPass;

  $sql = "SELECT n.id AS noteID, n.title AS title, u.name AS name, n.created AS created , n.body AS body FROM users u, notes n WHERE u.id=".$userID." AND u.id=n.user_id";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  	echo "<ul class=\"list-group\">";
    // output data of each row
    while($row = $result->fetch_assoc()) {


      echo "<li class=\"list-group-item\" id=\"".$row["noteID"]."\"> <b>".$row["title"]."</b> (Created by " .$row["name"]. ", ".date("m/d/Y l,h:ia",$row["created"]).") &nbsp; ";

      echo "<a href=\"#\" class=\"edit-link\" data-toggle=\"modal\" data-target=\"#editNoteModal\"><span class=\"glyphicon glyphicon-pencil\"></span></a> &nbsp; <a href=\"#\" data-toggle=\"modal\" data-target=\"#deleteNoteModal\"><span class=\"glyphicon glyphicon-remove\"></span></a><br />";
      echo $row["body"];
      echo "</li>";


    }
    echo "</ul></div>";
  } else {
  	echo "There are currently no notes associated with your account.";
  	echo "</div>";
  }

  $conn->close();

} // end renderNotes()



function insertNote($title, $body, $userID) {

  //db connections
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "c1";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  
  //sanitize inputs
  $title = mysqli_real_escape_string($conn, $title);
  $body = mysqli_real_escape_string($conn, $body);

  $sql = "INSERT INTO notes (title, body, user_id) VALUES ('".$title."', '".$body."', '".$userID."')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  $conn->close();
} // end insertNote()






function deleteNote($noteID) {

  //db connections
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "c1";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  
  $sql = "DELETE FROM notes WHERE id = " .$noteID;

  if (mysqli_query($conn, $sql)) {
    echo "Deleted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  $conn->close();
} // end deleteNote()



function populateEditModal($noteID) {
  //db connections
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "c1";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT n.title AS title, n.body AS body FROM notes n WHERE n.id=".$noteID;

  $result = $conn->query($sql);

  $titleBodyJson;

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $titleBodyJson = json_encode($row);
    }
  }

  $conn->close();

  return $titleBodyJson;
} // end populateEditModal()








function updateNote($title, $body, $noteID) {

  //db connections
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "c1";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  
  //sanitize inputs
  $title = mysqli_real_escape_string($conn, $title);
  $body = mysqli_real_escape_string($conn, $body);

  $sql = "UPDATE notes SET title = '".$title."', body = '".$body."' WHERE id=".$noteID;

  if (mysqli_query($conn, $sql)) {
    echo "Updated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  $conn->close();
} // end updateNote()



?>