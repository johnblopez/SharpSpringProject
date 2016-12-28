<?php
include("controller.php"); 

$noteTitle = $_POST["update-note-title"];
$noteBody  = $_POST["update-note-body"];
$noteID    = $_POST["noteid"];

echo $noteTitle;
echo $noteBody;
echo $noteID;

updateNote($noteTitle,$noteBody,$noteID);

?>