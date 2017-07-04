$(document).ready(function () {

  $("#js_EntraceReport").click(function () {

    // Get URL val from the view. and redirect user to the mehtod in the EmployeeController
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
