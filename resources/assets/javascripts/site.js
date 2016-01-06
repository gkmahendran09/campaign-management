//Show Modal
function showModal(data) {
  // console.log(data);
  $("#modal .modal-body").html(data.responseText);
  $("#modal").modal();
}

//Show Errors
function showErrors(data) {
  var response = JSON.parse(data.responseText);

  $.each(response.errors, function(key, value) {
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
