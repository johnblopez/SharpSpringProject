
<?php 
  include("header.php"); 
  include("controller.php"); 


  $username = $_POST["username"];
  $userPassword = $_POST["password"];

  $uid = authenticateUser($username,$userPassword);

  if($uid > 0) {
?>

<br />

<div id="logged-label">
  Logged in as: <?php echo $username; ?>
</div>


<div id="notes-section">	
	<button type="button" class="btn btn-primary" id="new-note-id" data-toggle="modal" data-target="#addNoteModal">
      <span class="glyphicon glyphicon-plus"></span> New Note
    </button>
    <a href="logout.php" class="btn btn-primary">Logout</a>
    <br />
	<br />

<?php
	renderNotes($uid);
  } else { 
?>
</div>

<div id="notes-section">
  The username/password do(es) not match our records. <br />
   Please verify your credentials and try again.
</div>
<?php
  }
?>




<!-- Modals -->
  <div class="modal fade" id="addNoteModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Note</h4>
        </div>
        <div class="modal-body">
          <form action="dashboard.php" id="add-note-form" method="post">
          	<table>
          	  <tr>
                <td class="table-form">Title: </td><td class="table-form"><input type="text" name="note-title" id="note-title-id" /></td>
              </tr>
              <tr>
                <td class="table-form">Body: </td><td class="table-form"><textarea rows="4" cols="50" name="note-body" id="note-body-id"> </textarea></td>
              </tr>
            </table>  
            <br />
            <input type="hidden" name="uid" value= <?php echo $uid ?> />
            <button type="submit" class="btn btn-primary" id="note-add-id">
              <span class="glyphicon glyphicon-plus"></span>Add
            </button>      
          </form> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 


  <div class="modal fade" id="deleteNoteModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Note</h4>
        </div>
        <div class="modal-body">
        	<h2>Confirm Delete?</h2>
        	<br />
          <form action="dashboard.php" id="delete-note-form" method="post">
            <input type="hidden" name="noteid" id="current-note-id" value="" />
            <button type="submit" class="btn btn-primary" id="note-delete-id">
              OK
            </button>    
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>  
          </form> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 


  <div class="modal fade" id="editNoteModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Note</h4>
        </div>
        <div class="modal-body">      
          <form action="dashboard.php" id="update-note-form" method="post">
          	<table>
          	  <tr>
                <td class="table-form">Title: </td><td class="table-form"><input type="text" name="update-note-title" id="edit-note-title-id" value="" /></td>
              </tr>
              <tr>
                <td class="table-form">Body: </td><td class="table-form"><textarea rows="4" cols="50" name="update-note-body" id="edit-note-body-id" value=""> </textarea></td>
              </tr>
            </table>  
            <br />
            <input type="hidden" name="noteid" id="current-update-note-id" value="" />
            <button type="submit" class="btn btn-primary" id="note-edit-id">
              OK
            </button>    
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>  
          </form> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 


<?php 
  include("footer.php"); 
?>