$(document).ready(function(){

/***
    $("#note-add-id").click(function(){
    	console.log('come pingus charles mingus');
      $.post('insertNote.php', function(data, status) {
        if(status == 'success') {
          $('#addNoteModal').modal('toggle');
          //$( '.alert-success' ).slideDown( 'slow' ).delay( 1000 ).slideUp( 'slow' );
          console.log('success duke');
          location.reload(true);
        } else {
          $('#addNoteModal').modal('toggle');
          console.log('error duke');
          //$( '.alert-danger' ).slideDown( 'slow' ).delay( 1000 ).slideUp( 'slow' );
        }
      });
    }); // end ("#note-add-id").click()

***/

  /** Insert New Note **/
  var request;

  $("#add-note-form").submit(function(event){
    event.preventDefault();
    if (request) {
        request.abort();
    }
    var $form = $(this);
    // Select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    request = $.post('/insertNote.php', serializedData, function(response) {
    	$('#addNoteModal').modal('toggle');
        location.reload(true);
    });

    // Success
    request.done(function (response, textStatus, jqXHR){
      // Log a message to the console
      console.log("Success");
    });

    // Handle failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
    //Re-enable inputs
    request.always(function () {
        $inputs.prop("disabled", false);
    });
  });
/** End Insert New Note **/

  $(".list-group-item").click(function(){
    var noteID = this.id;
    $("#current-note-id").val(noteID);
  });


/** Delete Note **/
  var requestDelete;

  $("#delete-note-form").submit(function(event){
    event.preventDefault();
    if (requestDelete) {
        requestDelete.abort();
    }
    var $form = $(this);
    // Select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    requestDelete = $.post('/deleteNote.php', serializedData, function(response) {
    	$('#deleteNoteModal').modal('toggle');
        location.reload(true);
    });

    // Success
    requestDelete.done(function (response, textStatus, jqXHR){
      // Log a message to the console
      console.log("Success");
    });

    // Handle failure
    requestDelete.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
    //Re-enable inputs
    requestDelete.always(function () {
        $inputs.prop("disabled", false);
    });
  });
/** End Delete Note **/

/** Edit Note **/
  $(".edit-link").click(function(){
    var noteID = this.closest( "li" ).id;
    $("#current-update-note-id").val(noteID);
    $.getJSON("/editNote.php", {"currentNoteID":noteID}, function(response) {
    	$("#edit-note-title-id").val(response.title);
    	$("#edit-note-body-id").val(response.body);
    });
  });
/** End Edit Note **/









/** Update Note **/
  var updateRequest;

  $("#update-note-form").submit(function(event){
    event.preventDefault();
    if (updateRequest) {
        updateRequest.abort();
    }
    var $form = $(this);
    // Select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    updateRequest = $.post('/updateNote.php', serializedData, function(response) {
    	$('#editNoteModal').modal('toggle');
        location.reload(true);
    });

    // Success
    updateRequest.done(function (response, textStatus, jqXHR){
      // Log a message to the console
      console.log("Success");
    });

    // Handle failure
    updateRequest.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
    //Re-enable inputs
    updateRequest.always(function () {
        $inputs.prop("disabled", false);
    });
  });
/** End Update Note **/




















}); //end jQuery()