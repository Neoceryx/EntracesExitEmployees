$(document).ready(function () {

  // Set the main path on the server
  let URL="http://localhost/EntracesExitEmployees/index.php/"


  $("#js_LoginBtn").click(function () {

    // Get Employee Number
    var EmpNumber=$("#js_EmployeeNmbr").val();

    // Get Employe Password
    var Password=$("#js_Password").val();

    // Start ajax
    $.ajax({
      type:"POST",
      url:URL+"LoginController/Login",
      data:{ EMPNUM:EmpNumber, PASS:Password },
      success:function (data) {

        // Display backend result on the DOM
        $(".Js_LgnResult").html(data).hide();

        // Get Login val. Bolean. Parse string to a number
        var LoginVal= parseInt($(".Js_LgnResult").text());

        // Validate login Val
        if (LoginVal == 1) {

          // Redirect User to the Login view
          window.location.href = URL+"LoginController/AdminPanel";

        }else {

          alert("Please Verify Employee Information");

        }

      },
      error:function (xhr) {

        alert("Error: " +xhr.responseText);
        
      }

    });
    // End ajax

  });
  // End Click

});
// End Scope
