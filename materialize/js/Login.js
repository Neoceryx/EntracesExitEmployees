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
      success:function (data) {debugger

        // Display backend result on the DOM
        $(".Js_LgnResult").html(data);

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
