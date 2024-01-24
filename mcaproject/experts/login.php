<?php
include 'inc/header.php';
if (isset($_SESSION["1wdvhi0"]) || isset($_SESSION["1wdvhi1"])) {
  header("location:index.php");
}
?>
<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12 flex">
<div class="w-full max-w-md m-1 md:mx-auto border-slate-50 bg-black py-5 h-full">
    <div class="p-4 h-5 w-full inline">
        <img class="mx-auto" src="assets/images/ecglogo.png" alt="">
    </div>
    <form class="shadow-md rounded px-8 pt-6 pb-8 mb-4 relative" id="login_form">
        <div id="form_error" class="text-red-500 pb-8 text-center hidden">Error</div>
        <div class="mb-4">
            <label class="block text-white text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="email" name="email" type="text" placeholder="example@ecglive.com">
        </div>
        <div class="mb-6">
            <label class="block text-white text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input
                class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                id="password" name="password" type="password" placeholder="Password">
            <!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
        </div>
        <div class="flex items-center justify-between">
            <input type="button"class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-auto" id="login" value="Log In">
            <!-- <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                Forgot Password?
            </a> -->
        </div>
    </form>
    <p class="text-center text-gray-500 text-xs">
        &copy;2022 ECGLive.com_All rights reserved.
    </p>
</div>

<script>

$("#login").click(function (e) {

$('#login').val('Please wait...');
$("#login").attr('disabled', true);
$.ajax({
  url: "loginaction.php",
  type: "POST",
  data: $('#login_form').serialize(),

  success: function (result) {      
    if (!result) {
      swal("Login Successful", { 
        icon: "success",
        timer: 1000,
        buttons: false,
      })
      $('#login_form')['0'].reset();
      location.replace("index.php");

    } else {
      $('#form_error').text(result).css('display', 'block');        
    }   


    // $('#login_form')['0'].reset();
    $('#login').val('Log In');
    $("#login").attr('disabled', false);
    // location.replace("addecg.php");
  }
});

});
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>