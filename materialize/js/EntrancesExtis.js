$(document).ready(function () {

  // Set the main path on the server
  let URL="http://192.168.1.86/EntracesExitEmployees/index.php/";

  // Display the Entrances and Exits Employees
  GetCurrentEntrancesExits();

  { /* Region Decode Codes Plugin Methods */

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

          { /* Region ReisterEntranceExit */

            // Get Employee Number
            var EmployeNumbr=Content;

            $.ajax({
              type:"POST",
              url:URL+"EmployeeController/RegisterEntrance",
              data:{EMPNUM:EmployeNumbr},
              success:function (data) {

                // Display the backend result on the dom
                // alert(data);


                // Update the Extrances and Extis regitser table
                GetCurrentEntrancesExits()

                // Clear decoder result after one sec
                setTimeout(function () {

                  // Clear the decoder val element
                  $('#js_Coderesult').text('');

                }, 1000);

              },
              error:function (hrx) {
                alert("An error Ocurred. "+ hrx.responseText);
                console.log(hrx.responseText);
              }

            });
            // End ajax call

          } /* End Region */

        }
        // End resultFunction

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

  function GetCurrentEntrancesExits() {

    // Dispplay the Entrances and Extis on the mindexview
    $.ajax({
        type:"POST",

        // Main server URL + ControllerName/Method
        url:URL+"EmployeeController/CurrentEntrancesExitReport",
        data:{},
        success:function (data) {

          // Display Backend results on the dom
          $(".js_ShiftResult").html(data);

        },
        error:function (xhr) {

          alert("An error ocurred");
          console.log(xhr.responseText);

        }
      })

  }
 // End

});
// End Scope
