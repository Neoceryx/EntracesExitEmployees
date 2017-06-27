$(document).ready(function () {

  // Set the main path on the server
  let URL="http://localhost/EntracesExitEmployees/index.php/"

  // Redirect to Employee Details View
  $(".js_Employee").click(function () {

    // Get Employe Id
    var EmpId=$(this).data("empid");

    // Get Employe name in lower case
    var EmName=$(this).find("#js_EmpName").text().toLowerCase();

  });

  // Seacrh
  $("#js_SrchBtn").click(function () {

    // Get and convert the search string val to lowercase
    var Srchstring=$("#js_SrchString").val().toLowerCase();

    // add or remove deccision class
    $(this).toggleClass("Search");

    // Validate if the buttn has show class
    if ( $(this).hasClass("Search") ) {

      // Iterates over Employees list
      $(".js_Employee").each(function () {

        // Get the element
        var Item=$(this);

        // Get and convert the employees names to lower case
        var NamesFull=$(this).find(".js_EmpName").text().toLowerCase();

        // Separate the FstNme to the Name
        var SplitNames=NamesFull.split(" ");

        // Get only the name part
        var NamePart=SplitNames[0];

        // Validate Employees names
        if (NamePart != Srchstring) {

          // Hide the element.
          Item.hide();

        }

      });
      // End each

      // Change button text
      $(this).text("Show");

    }else {

      // Makes visible the employees
      $(".js_Employee").show();

      // Change button text
      $(this).text("Search");

    }

  });
  // End click

  $(".js_Employee").click(function () {

    // Get Employe Id
    var EMployeId= $(this).data("empid");

    // Open modal
    $('#js_EmpDetail').modal('open');

  });

});
// End Scope
