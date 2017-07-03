$(document).ready(function () {

  // Set the main path on the server
  let URL="http://192.168.1.86/EntracesExitEmployees/index.php/";

  $("#js_EntraceReport").click(function () {

    window.location.href=URL+"EmployeeController/EntranceReport"

  });

  $("#js_RegEmp").click(function () {

    window.location.href=URL+"EmployeeController/NewEmployee";

  });

  $("#js_Emp").click(function () {

    window.location.href=URL+"EmployeeController/EmployeesView";

  });

});
// End Scope
