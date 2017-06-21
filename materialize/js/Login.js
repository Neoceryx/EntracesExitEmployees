$(document).ready(function () {

  // Set the main path on the server
  let URL="http://localhost/EntracesExitEmployees/index.php/"

  // Emuns
  var LOGIN={ISTRUE:1, ISADMIN:1};

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
        var LoginVal= $(".Js_LgnResult").text();

        // Separate LiginValues
        var LoginValSeparated=LoginVal.split(":");

        // Validate login Val and if teh user is admin
        if (  LoginValSeparated[0] == LOGIN.ISTRUE && LoginValSeparated[1]==LOGIN.ISADMIN ) {

          // Redirect User to the Admin DashBoard
          window.location.href = URL+"LoginController/AdminPanel";

        }else {

          alert("User or Password incorrect. Please Verify your information");

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
