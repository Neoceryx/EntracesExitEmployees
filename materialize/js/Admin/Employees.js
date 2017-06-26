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
    console.log( typeof(Srchstring) );

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

  });
  // End click

});
// End Scope
