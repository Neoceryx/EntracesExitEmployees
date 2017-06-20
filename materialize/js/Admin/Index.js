$(document).ready(function () {

  // Set the main path on the server
  let URL="http://localhost/EntracesExitEmployees/index.php/"

  $("#js_EntraceReport").click(function () {

    window.location.href=URL+"EmployeeController/EntranceReport"

  });


});
// End Scope
