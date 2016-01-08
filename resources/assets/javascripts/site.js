//Make Ajax Request
//triggerAjaxRequest(type, url, data, onSuccess(), onError())
function triggerAjaxRequest(type, url, data, onSuccess, onError) {
  $.ajax({
  	type: type,
  	url: url,
  	data: data,
  	dataType: "json",
  	success: function(data) {
      onSuccess(data);
  	},
  	error: function(data) {
      onError(data);
  	}
  });
}

//Default Ajax Error handler
function defaultAjaxErrorHandler(data) {
  if(data.responseJSON) {
    showErrorsForFormRequest(data.responseJSON);
  } else {
    showModal("Error", "Please try reloading the page.");
  }
}

//Build Form On Success
function buildFormOnSuccess(data) {
  clearErrorsForFormRequest();
  var url = data.previewURL;
  var modalData = '<div class="alert alert-success">' + data.message + '</div>';
  modalData += '<div class="row">';
  modalData += '<div class="col-md-12 text-center">';
  modalData += '<a href="' + url + '" class="btn btn-primary" id="preview_form_btn">Preview Form</a>';
  modalData += '</div>';
  showModal("Success", modalData);
}

//Get Build Field Template
function getTemplate(field_count) {
  var template = '<tr>';
  template += '<td><input type="text" name="field_name['+ field_count +']" placeholder="Friendly Name" class="form-control" required="true">';
  template += '<span class="text-danger" data-error-msg-for="field_name.'+ field_count +'"></span></td>';
  template += '<td><select  class="form-control" name="field_datatype['+ field_count +']" required="true"><option value="text">Text</option><option value="int">Number</option><option value="date">Date</option></select>';
  template += '<span class="text-danger" data-error-msg-for="field_datatype.'+ field_count +'"></span></td>';
  template += '<td><a href="javascript:void(0);" class="btn btn-sm btn-danger" id="delete_field"><i class="fa fa-trash"></i> Delete</a></td>';
  template += '</tr>';

  return template;
}

//Show Modal
function showModal(title, data) {
  // console.log(data);
  $("#modal .modal-title").html(title);
  $("#modal .modal-body").html(data);
  $("#modal").modal();
}

//Show Errors
function showErrors(data) {
  var response = JSON.parse(data);

  $.each(response.errors, function(key, value) {
    $("[data-error-msg-for='"+ key +"']").html(value);
  });

}

//Show Errors
function showErrorsForFormRequest(data) {
  clearErrorsForFormRequest();

  var response = data;
  $.each(response, function(key, value) {
    $("[data-error-msg-for='"+ key +"']").html(value);
  });

}

//Clear Errors
function clearErrorsForFormRequest() {

  $("[data-error-msg-for]").html('');

}


$(document).ready(function() {
  //Ajax Setup
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  //Tooltip
  $('[data-toggle="tooltip"]').tooltip();
});
