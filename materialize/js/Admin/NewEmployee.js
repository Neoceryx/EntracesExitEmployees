$(document).ready(function () {

  // Set the main path on the server
  let URL="http://localhost/EntracesExitEmployees/index.php/"

  // Register New Employees
  $("#js_SaveEmp").click(function () {

    // Get Employee Name
    var Name=$("#js_Name").val();

    // Get Employe FirstName
    var FstName=$("#js_FstName").val();

    // Get Employee Number
    var EmpNumbr=$("#js_EmpNumbr").val();

    // Get Emp Pass
    var EmpPass=$("#js_Pass").val();

    // Get Employee Role Id
    var EmpRoleId=$("#js_EmpRole").val();

    // Start ajax
    $.ajax({
      type:"POST",
      url:URL+"EmployeeController/AddNewEmployee",
      data:{NAME:Name},
      success:function (data) {

        // Display bakenc data in the DOM'
        $(".js_Result").html(data);

      },
      error:function (xhr) {

        alert("Error: " +xhr.responseText);

      }

    });
    // End ajax

  });


});
