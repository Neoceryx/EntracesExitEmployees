$(document).ready(function () {

  // Set the main path on the server
  let URL="http://localhost/EntracesExitEmployees/index.php/"

  // it will get employee id
  var EMployeId="";

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

    // add or remove deccision class
    $(this).toggleClass("Search");

    // Validate if the buttn has show class
    if ( $(this).hasClass("Search") ) {

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

      // Change button text
      $(this).text("Show");

    }else {

      // Makes visible the employees
      $(".js_Employee").show();

      // Change button text
      $(this).text("Search");

    }

  });
  // End click

  // Get Employee Detail
  $(".js_Employee").click(function () {

    // Get Employe Id
    EMployeId= $(this).data("empid");

    // Start ajax
    $.ajax({
      type:"POST",
      url:URL+"EmployeeController/GetEmployeInfo",
      data:{EMPID:EMployeId},
      success:function (data) {

        // Display backend result in the dom
        $(".js_EmpInfo").html(data);

        // Get Employee info form Controller
        var RoleId=$("#js_EmpRole").text();
        var EmpNumber=$("#js_EmpNumberR").text();
        var FstName=$("#js_FstNmeR").text();
        var Name=$("#js_empnameR").text();

        // Place Employee info in the Employee details
        $("#js_empname").val(Name);
        $("#js_FstNme").val(FstName);
        $("#js_EmpNumber").val(EmpNumber);

        // Iterate over select tag
        $("#js_RolesId").each(function() {

          // select the option white the same roelid from employee
          $(this).find('option[value="'+RoleId+'"]').prop('selected', true);

        });

      },
      error:function (xhr) {

        alert("Error: " +xhr.responseText);

      }
    });
    // End ajax

    // Open modal
    $('#js_EmpDetail').modal('open');

  });

  // Update Employee Info
  $("#js_ModifyEmpInfo").click(function () {

    // Display Employee id
    alert(EMployeId);

    // Close modal
    $('#js_EmpDetail').modal('close');

  });
  // End click

  // // Start Recibe json
  // $.ajax({
  //   type:"GET",
  //   url:URL+"EmployeeController/ReturnJson",
  //   data:{},
  //   success:function (data) {
  //
  //     // Display result in the dom
  //     $(".js_Json").html(data);
  //
  //     // Parse data in to json
  //     var json = $.parseJSON(data);
  //
  //     $(json).each(function (i,val) {
  //       $(".js_Json").append("<p class='js_t'>"+val.Id+" :: "+ val.NameEmp +"</p>")
  //
  //     });
  //
  //   },
  //   error:function (xhr) {
  //
  //     alert("Error: " +xhr.responseText);
  //
  //   }
  // });
  // // End ajax
  //
  // // Allows use elements appended
  // $(document).on('click','.js_t', function(){
  //
  //   $(this).css("background-color", "yellow");
  //
  // });

  // Qr Creates
  var element = $("#js_QrCode"); // global variable
  var getCanvas; // global variable

      $("#js_CreateQr").on('click', function () {

        // Get Employee number
        var EmpNumber=$("#js_EmpNumber").val();

        // Get Employee name and first name
        var EmName=$("#js_empname").val() +" "+ $("#js_FstNme").val();

        // Get elemt
        var Item=$(this);

        // Add or remove class
        Item.toggleClass("QrCreated");

        // Validate if the button has the class
        if ( Item.hasClass("QrCreated") ) {

          // Initilize the variable
          var qrcode="";

          {  /* Region Create Qr Code */

            // Creates Qr code in the dom whit the Employee number
            qrcode = new QRCode("js_QrCode", {
                text: EmpNumber,
                width: 170,
                height: 170,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });

          } /* End  Region*/

          { /* Region Convert div in to img */

            // Convert div in to png
            html2canvas(element, {
              onrendered: function (canvas) {

                // Display a preview
                // $("#js_QrCode").append(canvas);

                // store canvas
                getCanvas = canvas;

              }
            });

          } /* End Region */

          // Change button text
          $(this).text("DownLoad");

        }else {

          { /* Region Download Qr Generated */

              // Set donload folder
              var imgageData = getCanvas.toDataURL("image/png");

              // Now browser starts downloading it instead of just showing it
              var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");

              // Downloa the img whit the employee name
              $("#js_CreateQr").attr("download", EmName+".png").attr("href", newData);

          } /* End Region */

          // clear the code.
          $("#js_QrCode").empty();

          // Change button text
          $(this).text("Create QrCode");

        }

      });
      // End click


});
// End Scope
