$(document).ready(function () {

  // it will be Storage the permison id seleted by the user
  var PermsId=0;

  var Desc="";

  $(".js_Permison").click(function () {

    // Get Permison id
    var PermId=$(this).data("permid");

    // Store the permid into PermId
    PermsId= PermId;

    // Validate type permison seleted
    if (PermsId == 5) {

      // Open modal
      $('#modal1').modal('open');

      $("#js_DescBtn").click(function () {

        // Get Description
        Desc=$("#js_desc").val();

        // Clear from
        $("#js_DescFrom")[0].reset();

        // Turn on the web camera and Send Arg to will be decode
        $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.play();

      });
      // End click

    }else {

      // Turn on the web camera and Send Arg to will be decode
      $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.play();

    }

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

          // Turn Off camera
          $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.stop();

          { /* Region CallBack */

            { /* Region Register Permison */

              $.ajax({
                type:"POST",
                url:URL+"PermisonsController/RegiterPermison",
                data:{PERMID:PermsId, EMNUMBER:Content, DESC:Desc},
                success:function (data) {

                  // Display backend result in the dom
                  $(".js_Permresult").html(data);


                  // Clear Desc Val
                  // Desc="";

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
