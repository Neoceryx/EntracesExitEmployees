$(document).ready(function () {

  // Set the main path on the server
  let URL="http://localhost/EntracesExitEmployees/index.php/"


  // Search Employe
  $("#js_Srch").click(function () {

    // Get start Date
    var StrtDate=moment( $("#js_StartDate").val() ).format('YYYY-MM-DD');

    // Get End Date
    var EndDate=moment( $("#js_EndDate").val() ).format('YYYY-MM-DD');;

    // Start Ajax Call
    $.ajax({
      type:"POST",
      url:URL+"EmployeeController/GetEntrancesReportByDateRange",
      data:{INITDATE:StrtDate, ENDDATE:EndDate },
      success:function (data) {

        // Display info in the DOM
        $("#js_EntrancesData").html(data);

      },
      error:function (xhr) {

        alert("Error: " +xhr.responseText);

      }

    });
    // End Ajax call


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

});
