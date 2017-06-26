$(document).ready(function () {

  // Set the main path on the server
  let URL="http://localhost/EntracesExitEmployees/index.php/"

  // Display all employees
  $.ajax({
    type:"POST",
    url:URL+"EmployeeController/GetEmployeesList",
    data:{},
    success:function (data) {

      // Display backend result in the dom
      $(".js_EmpList").html(data);

    },
    error:function (xhr) {

      alert("Error: " +xhr.responseText);

    }
  });

  $(".js_Employee").click(function () {

    // Get Employe Id
    var EmpId=$(this).data("empid");
    debugger;

  });


});
// End Scope
