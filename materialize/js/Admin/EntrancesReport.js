$(document).ready(function () {

  // Set the main path on the server
  let URL="http://192.168.1.86/EntracesExitEmployees/index.php/";


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

        // Get the row number
        var rowCount = $('#js_EntrancesData tr').length;

        // Validate if the table has records
        if ( rowCount == 0 ) {

          // Set Notification Screen Position
          alertify.set('notifier','position', 'top-left');

          // Display Notification
          alertify.error('No records found', alertify.get('notifier','position'));

        }


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
