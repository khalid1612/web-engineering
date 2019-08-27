$(document).ready(function() {
    $('#register').click(function (e) {
      e.preventDefault();

      var error = false;

      // check input field
      var name = $('#name').val();
      if (name == '') {
        error = true;
        $('#name').addClass("is-invalid");
      }else{
        $('#name').removeClass("is-invalid");
      }

      var email = $('#email').val();
      if (email == '') {
        error = true;
        $('#email').addClass("is-invalid");
        $('#emailErrMsg').text("Email is required");
      }else{
        if (!isValidEmailAddress(email)) {
          error = true;
          $('#email').addClass("is-invalid");
          $('#emailErrMsg').text("Please Enter a valid email");
        }
        else{
          $('#email').removeClass("is-invalid");
        }
      }


      var sid = $('#sid').val();
      if (sid == '') {
        error = true;
        $('#sid').addClass("is-invalid");
        $('#sidErrMsg').text("Student ID is required");
      }else{
          $('#sid').removeClass("is-invalid");
      }

      var slot = $('#slot').val();
      if (slot == '') {
        error = true;
        $('#slot').addClass("is-invalid");
        $('#slotErrMsg').text("Choose your slot");
      }else{
        $('#slot').removeClass("is-invalid");
      }


      if (error) {
        return;
      }

      $.post("php/register.php",{
        name: name,
        email: email,
        sid: sid,
        slot: slot
      },
      function (data) {
        //alert(data);

        if (data == "Student ID already exists") {
          $('#sid').addClass("is-invalid");
          $('#sidErrMsg').text(data);
        }else if (data == "Email already exists") {
          $('#sid').removeClass("is-invalid");
          $('#email').addClass("is-invalid");
          $('#emailErrMsg').text(data);
        }else if (data == "Successfully register") {
          $('#email').removeClass("is-invalid");
          $('#result').html(data);// show php return msg
          $('#result').addClass("alert-success");
          $('#form')[0].reset();//reset form data
        }else if (data == "Something wrong! Please try again") {
          $('#email').removeClass("is-invalid");
          $('#results').html(data);// show php return msg
          $('#results').addClass("alert-danger");
        }


      });


   });
});


function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}
