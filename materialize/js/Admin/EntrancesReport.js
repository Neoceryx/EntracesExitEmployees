$(document).ready(function () {

  // Search Employe
  $("#js_Srch").click(function () {

    // Get Employe Number
    var NoEmp=$("#js_NoEmp").val();

    // Iterate over Employe Records
    $(".js_EmpRecords").each(function () {

      // Get the element
      var Item = $(this);

      // Get all Employes Names from the table
      var EmpNumbrs=Item.find("td").eq(2).text();

      // Validate Search String
      if (NoEmp != EmpNumbrs ) {

        // Hide Records diferents to Search string
        Item.hide();

      }

      // Display Employees Names
      console.log(EmpNumbrs);

    });

  });

  // Download Table to excel
  $("#js_Download").click(function () {

    // Export table to excel
    $('#js_Entrances').tableExport({
      type:'xlsx',
      excelstyles:['border-bottom', 'border-top', 'border-left', 'border-right'],
      fileName:"Report"
    });

  });


});