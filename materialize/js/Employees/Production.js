$(document).ready(function () {

  $(".js_Permison").click(function () {

    // Get Permison id
    var PermId=$(this).data("permid");
    alert(PermId);

    // Turn on the web camera and Send Arg to will be decode
    $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.play();


  });

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

          // Display notification
          alertify.set('notifier','position', 'top-left');
          alertify.success('Code Scanned ', alertify.get('notifier','position'));


          // #.... Call Back code

        }
        // End resultFunction

      };
      // End rgs

  } /* End Region */

  { /* Region Web Cam controlls */

    // Turn Off.
    $("#js_Stop").click(function () {

      // Turn Off camera
      $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.stop();

    });

    $("#js_Play").click(function () {

      // Turn on the web camera and Send Arg to will be decode
      $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.play();

    });


  } /* End Region */

});
// End Scoope
