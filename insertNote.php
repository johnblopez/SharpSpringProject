<?php
include("controller.php"); 

$noteTitle = $_POST["note-title"];
$noteBody = $_POST["note-body"];
$uid = $_POST["uid"];

echo $noteTitle;
echo $noteBody;
echo $uid;

insertNote($noteTitle,$noteBody,$uid);

?>