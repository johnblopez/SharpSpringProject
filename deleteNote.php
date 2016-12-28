<?php
include("controller.php"); 

$noteID = $_POST["noteid"];

deleteNote($noteID);

?>