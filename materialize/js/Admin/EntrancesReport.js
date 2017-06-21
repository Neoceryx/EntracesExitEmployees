$(document).ready(function () {

  // Set the main path on the server
  let URL="http://localhost/EntracesExitEmployees/index.php/"


  // Search Employe
  $("#js_Srch").click(function () {

    // Get the element
    var Btn=$(this);

    // Add or remove class
    Btn.toggleClass("Show");

    // Validate Btn funcion
    if (Btn.hasClass("Show")) {

      // Makes visibles the table rows
      $("#js_Entrances").find("tr").removeAttr("style");

      // Chage Btn Text
      Btn.text("Search");

    }else {

      { /* Region Search */

        // Get Employe Number
        var NoEmp=$("#js_NoEmp").val();

        // Iterate over Employe Records (tr)
        $(".js_EmpRecords").each(function () {

          // Get the element
          var Item = $(this);

          // Get all Employes Names from the table
          var EmpNumbrs=Item.find("td").eq(2).text();

          // Validate Search String
          if (NoEmp != EmpNumbrs ) {

            // Hide Records diferents to Search string
            Item.hide();

            // Chage Btn Text
            Btn.text("Show");

          }

          // Display Employees Names
          console.log(EmpNumbrs);

        });

      } /* End Region */

    }
    // End Btn Funcion

  });
  // End click

  // Download Table to excel
  $("#js_Download").click(function () {

    // Export table to excel
    $('#js_Entrances').tableExport({
      type:'xlsx',
      excelstyles:['border-bottom', 'border-top', 'border-left', 'border-right'],
      fileName:"EntrancesReport"
    });

  });

  $.ajax({
    type:"POST",
    url:URL+"EmployeeController/GetEntrancesReportByDateRange",
    data:{},
    success:function (data) {

      // Display Bakcend Data on the DOM
      $("tbody").html(data);

    },
    error:function (xhr) {

      alert("Error: " +xhr.responseText);

    }
  })


});
