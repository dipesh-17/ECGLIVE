$("#register-patient").click(function (e) {
  e.preventDefault();
  if (ValidteForm() == false) {
    form_error = 'Please fill all manidatory fields';
    $('#form_error').text(form_error).css('display', 'block');
    return;
  }

  if($('#tandc').is(':checked')){
    console.log("Checked");  

  }else{
    console.log("Not Checked");
    tc_error = 'Accept Terma and Conditions';
    $('#form_error').text(tc_error).css('display', 'block');
    return;
  }

  $('#register-patient').val('Please wait...');
  $("#register-patient").attr('disabled', true);


  $.ajax({
    url: "signup.php",
    type: "POST",
    data: $('#registration_form').serialize(),

    success: function (result) {

      swal(result, {
        icon: "success",
        timer: 1000,
        buttons: false,
      })

      $('#registration_form')['0'].reset();
      $('#register-patient').val('Sign Up');
      $("#register-patient").attr('disabled', false);
      location.replace("upload_ecg.php");
    }
  });

});


$(document).ready(function () {

  $('#fname').blur(function (e) {
    e.preventDefault();
    var fname_filter = /^([a-zA-Z])+$/;
    var fname = $('#fname').val();
    if ($.trim(fname).length == 0) {
      error_fname = 'Enter first name'; 
      $('#error_fname').text(error_fname).css('color', 'red');
      $('#fname').css('border', '1px solid red');
    }  else if (!(fname_filter.test(fname))) {
      error_fname = 'Enter valid name';
      $('#error_fname').text(error_fname).css('color', 'red');
      $('#fname').css('border', '1px solid red');
    } else {
      error_fname = '';
      $('#error_fname').text(error_fname);
      $('#fname').css('border', '1px solid green');
    }
  });


  $('#lname').blur(function (e) {
    e.preventDefault();
    var name_filter = /^([a-zA-Z])+$/;
    var lname = $('#lname').val();
    if ($.trim(lname).length == 0) {
      error_lname = 'Enter last name';
      $('#error_lname').text(error_lname).css('color', 'red');
      $('#lname').css('border', '1px solid red');
    } else if (!(name_filter.test(lname))) {
      error_lname = 'Enter valid name';
      $('#error_lname').text(error_lname).css('color', 'red');
      $('#lname').css('border', '1px solid red');
      
    } else {
      error_lname = '';
      $('#error_lname').text(error_lname);
      $('#lname').css('border', '1px solid green');
    }
  });






  $('#dob').blur(function (e) {
    e.preventDefault();
    var dob = $('#dob').val();
    if ($.trim(dob).length == 0) {
      error_dob = 'Please select date of birth';
      $('#error_dob').text(error_dob).css('color', 'red');
      $('#dob').css('border', '1px solid red');
    } else {
      error_dob = '';
      $('#error_dob').text(error_dob);
      $('#dob').css('border', '1px solid green');
    }
  });

  $('#phone').keyup(function (e) {
    e.preventDefault();
    var verify_phone = /^(\+91[\-\s]?)?[0]?(91)?[123456789]\d{9}$/;
    var phone = $('#phone').val();
    if ($.trim(phone).length == 0) {
      error_phone = 'Please enter phone number';
      $('#error_phone').text(error_phone).css('color', 'red');
      $('#phone').css('border', '1px solid red');
    } else if (!(verify_phone.test(phone))) {
      error_phone = 'Enter Valid phone number';
      $('#error_phone').text(error_phone).css('color', 'red');
      $('#phone').css('border', '1px solid red');
    } else {
      error_phone = '';
      $('#error_phone').text(error_phone);
      $('#phone').css('border', '1px solid green');
    }
  });


  $('#email').keyup(function (e) {
    e.preventDefault();

    var email_filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var email = $('#email').val();
    if ($.trim(email).length == 0) {
      error_email = 'Please enter Email id';
      $('#error_email').text(error_email).css('color', 'red');
      $('#email').css('border', '1px solid red');
    } else if (!(email_filter.test(email))) {
      error_email = 'Please enter valid Email id';
      $('#error_email').text(error_email).css('color', 'red');
      $('#email').css('border', '1px solid red');
    } else {
      error_email = '';
      $('#error_email').text(error_email);
      $('#email').css('border', '1px solid green');
    }
  });


  $('#password').keyup(function (e) {
    e.preventDefault();
    var password = $('#password').val();
    if ($.trim(password).length == 0) {
      error_password = 'Please enter password number';
      $('#error_password').text(error_password).css('color', 'red');
      $('#password').css('border', '1px solid red');
    } else if ($.trim(password).length < 6) {
      error_password = 'Password is too short';
      $('#error_password').text(error_password).css('color', 'red');
      $('#password').css('border', '1px solid red');
    } else {
      error_password = '';
      $('#error_password').text(error_password);
      $('#password').css('border', '1px solid green');
    }
  });

  $("#confirm-password").keyup(checkPasswordMatch);

  checkmailexist();
});


function checkPasswordMatch() {
  var password = $("#password").val();
  var confirmPassword = $("#confirm-password").val();
  if (password != confirmPassword) {
    error_confirm_password = 'Password not matched';
    $('#error_confirm-password').text(error_confirm_password).css('color', 'red');
    $('#confirm-password').css('border', '1px solid red');

  } else {
    error_confirm_password = 'Password matched!';
    $('#error_confirm-password').text(error_confirm_password).css('color', 'green');
    $('#confirm-password').css('border', '1px solid green');
  }
}

function checkmailexist() {
  // Check Email Exist
  $("#email").blur(function () {
    var email = $('#email').val();

    // if email field is null then return
    if (email == "") {
      return;
    }

    // send ajax request if email is not empty
    $.ajax({
      url: 'signup.php',
      type: 'post',
      data: {
        'email': email,
        'email_check': 1,
      },

      success: function (response) {
        // clear span before error message
        $("#email_err").remove();
        $("#email").after("<span id='email_err' class='text-danger'>" + response + "</span>");
        return response;
      },

      error: function (e) {
        $("#error_email").html("Something went wrong");
      }

    });
  });

}

const ValidteForm = () => {

  var fname = $("#fname").val();
  var lname = $("#lname").val();
  var dob = $("#dob").val()
  var gender = $("#gender").val();
  var phone = $("#phone").val();
  var email = $("#email").val();
  var password = $("#password").val();
  var confirm = $("#confirm-password").val();
  var verify_phone = /^(\+91[\-\s]?)?[0]?(91)?[6789]\d{9}$/;


  if ($.trim(fname).length == 0) {
    error_fname = 'Enter first name';
    $('#error_fname').text(error_fname).css('color', 'red');
    $('#fname').css('border', '1px solid red');
    return false;
  } else {
    error_fname = '';
    $('#error_fname').text(error_fname);
    $('#fname').css('border', '1px solid green');
  }
  // Lname
  if ($.trim(lname).length == 0) {
    error_lname = 'Enter last name';
    $('#error_lname').text(error_lname).css('color', 'red');
    $('#lname').css('border', '1px solid red');
    return false;
  } else {
    error_lname = '';
    $('#error_lname').text(error_lname);
    $('#lname').css('border', '1px solid green');
  }

  if ($.trim(dob).length == 0) {
    error_dob = 'Please select date of birth';
    $('#error_dob').text(error_dob).css('color', 'red');
    $('#dob').css('border', '1px solid red');
    return false;
  } else {
    error_dob = '';
    $('#error_dob').text(error_dob);
    $('#dob').css('border', '1px solid green');
  }

  if ($.trim(phone).length == 0) {
    error_phone = 'Please enter phone number';
    $('#error_phone').text(error_phone).css('color', 'red');
    $('#phone').css('border', '1px solid red');
    return false;
  } else if (!(verify_phone.test(phone))) {
    error_phone = 'Enter Valid phone number';
    $('#error_phone').text(error_phone).css('color', 'red');
    $('#phone').css('border', '1px solid red');
    return false;
  } else {
    error_phone = '';
    $('#error_phone').text(error_phone);
    $('#phone').css('border', '1px solid green');
  }

  var email_filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if ($.trim(email).length == 0) {
    error_email = 'Please enter Email id';
    $('#error_email').text(error_email).css('color', 'red');
    $('#email').css('border', '1px solid red');
    return false;
  } else if (!(email_filter.test(email))) {
    error_email = 'Please enter valid Email id';
    $('#error_email').text(error_email).css('color', 'red');
    $('#email').css('border', '1px solid red');
    return false;
  } else {
    error_email = '';
    $('#error_email').text(error_email);
    $('#email').css('border', '1px solid green');
  }

  if ($.trim(password).length == 0) {
    error_password = 'Please enter password number';
    $('#error_password').text(error_password).css('color', 'red');
    $('#password').css('border', '1px solid red');
    return false;
  } else if ($.trim(password).length < 6) {
    error_password = 'Password is too short';
    $('#error_password').text(error_password).css('color', 'red');
    $('#password').css('border', '1px solid red');
    return false;
  } else {
    error_password = '';
    $('#error_password').text(error_password);
    $('#password').css('border', '1px solid green');
  }

  if (password != confirm) {
    error_confirm_password = 'Password not matched';
    $('#error_confirm-password').text(error_confirm_password).css('color', 'red');
    $('#confirm-password').css('border', '1px solid red');
    return false;
  }
  return true;
}
