$(document).ready(function () {

  // Set the main path on the server
  let URL="http://localhost/EntracesExitEmployees/index.php/"

  // Emuns
  var LOGIN={ISTRUE:1, ISADMIN:1, ISNORMAL:2};

  // Const
  let LOGINARRAY={SES:0, EMPPART:1};



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
        $(".Js_LgnResult").html(data)

        // Get Login val. Bolean. Parse string to a number
        var LoginVal= $(".Js_LgnResult").text();

        // Separate LiginValues
        var LoginValSeparated=LoginVal.split(":");
        debugger

        // Login Validations
        if (LoginVal == 0) {

          // Display User Notification
          alertify.alert(
            'Waring',
            'User or Password incorrect. Please Verify the information',
            // Call back
            // function(){ alertify.success('Ok'); }
          );


        }else {

          // Validate login Val and if teh user is admin
          if (  LoginValSeparated[LOGINARRAY.SES] == LOGIN.ISTRUE && LoginValSeparated[LOGINARRAY.EMPPART]==LOGIN.ISADMIN ) {

            // Redirect User to the Admin DashBoard
            window.location.href = URL+"LoginController/AdminPanel";

          }else {

            // Validate Normal User
            if (LoginValSeparated[LOGINARRAY.SES] == LOGIN.ISTRUE && LoginValSeparated[LOGINARRAY.EMPPART]==LOGIN.ISNORMAL) {

              // Redirect user to NormalUser view

              // Display User Notification
              alertify.notify('Welcome Normal User', 'success', 2,);

            }

          }

        }
        // End Login Validations

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
