$(document).ready(function () {

  // Set the main path on the server
  let URL="http://localhost/EntracesExitEmployees/index.php/"

  // Dispplay the Entrances and Extis on the mindexview
  $.ajax({
    type:"POST",
    
    // Main server URL + ControllerName/Method
    url:URL+"EmployeeController/EntrancesExitReport",
    data:{},
    success:function (data) {

      // Display Backend results on the dom
      $(".js_ShiftResult").html(data);

    },
    error:function () {

      alert("An error ocurred");

    }
  })

});
