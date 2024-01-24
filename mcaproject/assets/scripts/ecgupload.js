$(document).ready(() => {

  var date = new Date();

  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();

  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;

  var today = year + "-" + month + "-" + day;
  // console.log(today)
  $("#ecgdate").attr("value", today);

  const ValidteForm = () => {
    let day = $("#ecgdate").val();
    if (day > today) {
      alert("Date must be todays date or previous")
      return false;
    }
    let ecgpdf = $("#ecgpdf")[0].files[0];
    if (ecgpdf !== undefined) {
      if (ecgpdf.name.substr(-3, 3) !== 'pdf') {
        alert("File format must be pdf")
        return false;
      }
    }
    if (!imageCheck($("#ecgimage1"))) {
      return false
    }
    if (!imageCheck($("#ecgimage1"))) {
      return false
    }
    if (!imageCheck($("#ecgimage1"))) {
      return false
    }
    // One is must be filled.
    let filesFlag = false;
    $("input[type='file']").filter(function () {
      if ($(this)[0].files[0] !== undefined) {
        filesFlag = true;
      }
    });
    if (filesFlag == false) {
      // alert("One file input must be filled.");
      // swal("Please upload ECG PDF OR Images")
      swal({
        // title: "Are you sure?",
        text: "Please upload ECG PDF OR Images!",
        icon: "warning",
        // buttons: true,
        dangerMode: true,
      })
      // .then((value) => {
      //   swal(`The returned value is: ${value}`);
      // });
      return false;
    }
    return true;
  }

  function imageCheck(item) {

    image1 = item[0].files[0];
    if (image1 !== undefined) {
      let ext = image1.name.substr(-3, 3).toLowerCase();
      console.log(ext)
      if (ext !== 'jpg' && ext !== 'jpeg' && ext !== 'png' && ext !== 'peg') {
        alert("Only JPEG, JPG, PNG files ")

        item.val('');
        return false;
      }
    }
    return true;
  }


  $('#submitbtn').click((event) => {
    event.preventDefault();

    if (ValidteForm() == false) {
      return;
    }

    window.swal({
      title: "Uploading Files...",
      text: "Please wait",
      imageUrl: "assets/images/15-min.jpg",
      buttons: false,
      closeOnClickOutside: false
    });

    $('#submitbtn').val('Please wait...');
    // $('#submitbtn').style('background: #ff9a003d');
    $("#submitbtn").attr('disabled', true);

    let date = document.getElementById('ecgdate').value;

    let symptoms = [];
    $.each($("#symptoms:checked"), function () {
      symptoms.push($(this).val());
    });
    chStr1 = symptoms.toString();

    let pre_illness = [];
    $.each($("#pre_illness:checked"), function () {
      pre_illness.push($(this).val());
    });
    chStr2 = pre_illness.toString();
    console.log("validation passed", date, chStr1, chStr2)


    var filename = $("#file").val();
    let formData = new FormData();
    formData.append('ecgdate', date);
    formData.append('symptoms', chStr1);
    formData.append('pre_illness', chStr2);
    formData.append('ecgpdf', $("#ecgpdf")[0].files[0])
    formData.append('image1', $("#image1").val())
    formData.append('image2', $("#image2").val())
    formData.append('image3', $("#image3").val())
    $.post({
      enctype: 'multipart/form-data',
      url: "./upload_process.php",
      data: formData,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      success: function (data) {


        swal(data, {
          icon: "success",
          timer: 1000,
          buttons: false,
        })
  
        // $("#reset").click();
        $('#submitbtn').val('Submit');
        $("#submitbtn").attr('disabled', false);
        location.replace("reports.php");



        // if (data == 'failed') {
        //   alert('upload failed');
        // } else {
        //   alert(data)
        // }
        
      },
      error: function (e) {
        console.log("ERROR : ", e);
      }
    });

  });
});



let imageName = '';
oFReader = new FileReader();

oFReader.onload = function (oFREvent) {

  var img = new Image();
 
  img.onload = function () {
   
    var canvas = document.createElement("canvas");
    var ctx = canvas.getContext("2d");
    let new_width = 1000;
    let new_height = 10;
    let width = img.width;
    let height = img.height;
    if (width > height && width > 1000) {
      new_width = 1000;
      new_height = Math.ceil(height * new_width / width);
    } else if (width < height || new_height > 1000) {
      new_height = 1000;
      new_width = Math.ceil(width * new_height / height);
    } else {
      new_width = width;
      new_height = height;
    }

    canvas.width = new_width;
    canvas.height = new_height;

    ctx.drawImage(img, 0, 0, new_width, new_height);
    //     newpreview.appendChild(canvas);
    // var target=document.getElementById("previewecg" + imageName);
    // var oldpreview=target.children[0];
    // target.replaceChild(newpreview,oldpreview);
   
    document.getElementById("previewecg" + imageName).append(canvas);

    console.log(imageName);

    document.getElementById(imageName).value = canvas.toDataURL();
  }
  img.src = oFREvent.target.result;
};

function loadImageFile(value) {
  if (document.getElementById("ecg" + value).files.length === 0) { return; }
  var oFile = document.getElementById("ecg" + value).files[0];
  imageName = value;

  oFReader.readAsDataURL(oFile);



}

