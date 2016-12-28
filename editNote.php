<?php

include("controller.php"); 

$noteID = $_GET["currentNoteID"]; 

echo populateEditModal($noteID);


?>