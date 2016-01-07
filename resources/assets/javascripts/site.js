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
  var response = data;  
  $.each(response, function(key, value) {
    $("[data-error-msg-for='"+ key +"']").html(value);
  });

}


$(document).ready(function() {
  //Ajax Setup
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  //Tooltip
  $('[data-toggle="tooltip"]').tooltip();
});
