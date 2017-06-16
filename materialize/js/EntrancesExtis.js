$(document).ready(function () {

  // Set the main path on the server
  let URL="http://localhost/EntracesExitEmployees/index.php/"

  { /* Region Entrances and Exit Table */

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

  } /* End Region */


  { /* Region Decode Codes*/

      // Create the objte to will return the info from the code decoded. Event
      var arg = {

        resultFunction: function(result) {

          // decode code info
          var Codetype=result.format;

          // Code type QR or Bar Code
          var Content=result.code;

          // it place the decode val and the code type on the dom
          $('#js_Coderesult').text( Codetype + ': ' + Content );

          // #.... Call Back code

          // Get Employee Number
          var EmployeNumbr=Content;

          $.ajax({
            type:"POST",
            url:URL+"EmployeeController/RegisterEntrance",
            data:{EMPNUM:EmployeNumbr},
            success:function (data) {

              // Display the backend result on the dom
              // alert(data);

              // Append register to the table Or Refresh the Entrances table
              $(".js_ShiftResult").append("<tr><td>"+ EmployeNumbr +"</td></tr>")

              // Clear decoder result after one sec
              setTimeout(function () {

                // Clear the decoder val element
                $('#js_Coderesult').text('');

              }, 1000);

            },
            error:function () {
              alert("An error Ocurred");
            }

          });
          // End ajax call

        }

      };

      // Turn on the web camera and Send Arg to will be decode
      $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.play();

      // Turn Off.
      $("#js_Stop").click(function () {

        // Turn Off camera
        $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.stop();

      });

      $("#js_Play").click(function () {

        // Turn on the web camera and Send Arg to will be decode
        $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.play();

      });
      //
      // $("#js_Pause").click(function () {
      //
      //   // Puse the Video recoder
      //   $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.pause();
      //
      // });

  } /* End Region */

  $("#js_Coderesult").change(function () {
    alert("Change");
  });

});
