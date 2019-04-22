Conekta.setPublicKey("key_KY4MVthAFs2NyGsoTK47qGg");

var conektaSuccessResponseHandler = function(token) {
  $("#conektaTokenId").val(token.id);
  document.getElementById("btn_submit").click();
};

var conektaErrorResponseHandler = function(response) {
  var $form = $("#card-form");
  alert(response.message_to_purchaser);
}
$(document).ready(function() {
  // Set events to form buttons
  var btn_pay = document.getElementById("btn_pay");
  btn_pay.addEventListener("click", function() {
    var $form = $("#card-form");
    Conekta.Token.create($form,
      conektaSuccessResponseHandler,
      conektaErrorResponseHandler);
  });
  /*
  $("#card-form").submit(function(e){
    e.preventDefault();

  });
  */
});
