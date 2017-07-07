$(document).ready(function () {

  // it will be Storage the permison id seleted by the user
  var PermsId=0;

  $(".js_Permison").click(function () {

    // Get Permison id
    var PermId=$(this).data("permid");

    PermsId= PermId;
    alert(PermId);

    // Add fadeIn effect 
    $("canvas").fadeIn("slow",function () {

        // Turn on the web camera and Send Arg to will be decode
        $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.play();

      });

  });

  { /* Region Decode Codes Plugin Methods */

      // Create the objte to will return the info from the code decoded. Event
      var arg = {

        resultFunction: function(result) {

          // decode Code type (Qr or Barcode etc)
          var Codetype=result.format;

          // Decode Qr code content
          var Content=result.code;

          // alert(Codetype + ': ' + Content);

          // Display notification
          alertify.set('notifier','position', 'top-left');
          alertify.success('Code Scanned '+Content +" Permison selected: "+PermsId , alertify.get('notifier','position'));

          // Add fadeOut effetc to canvas
          $("canvas").fadeOut("slow",function () {

            // Turn Off camera
            $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.stop();

          });

          { /* Region CallBack */

            { /* Region Register Permison */

              $.ajax({
                type:"POST",
                url:URL+"PermisonsController/RegiterPermison",
                data:{PERMID:PermsId, EMNUMBER:Content},
                success:function (data) {

                  // Display backend result in the dom
                  $(".js_Permresult").html(data);

                },
                error:function (hrx) {
                  alert("An error Ocurred. "+ hrx.responseText);
                  console.log(hrx.responseText);
                }

              });
              // End ajax

            } /* End Region  */

          } /* End Region */

        }
        // End resultFunction

      };
      // End rgs

  } /* End Region */

});
// End Scoope
