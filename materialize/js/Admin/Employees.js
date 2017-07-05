$(document).ready(function () {

  // <summary> This Script Use URL varible from the view </summary>

{ /* Region Variables */

  // it will get employee id
  var EMployeId="";

  // Initialize the varible to will storage the img path
  var ImgPath="";

  // Initialize the varible that will create the Qr code
  var QrCode="";

} /* End Region */

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

    // Get Employee Id
    EMployeId

    // Get Employe Name
    var Name = $("#js_empname").val();

    // Get Employee surname
    var Fname=$("#js_FstNme").val();

    // Get Employee Number
    var EmpNumber=$("#js_EmpNumber").val();

    // Get Employee RoleId
    var EmpRole=$("#js_RolesId").val();

    // disable fields to avoid edit employee info
    $('.js_EmpInfoForm').find("input").attr('disabled','disabled')

    // disable select tag
    $("#js_RolesId").attr("disabled","disabled");

    // Disable button
    $(this).attr("disabled","disabled");

    // Start ajax
    $.ajax({
      type:"POST",
      url:URL+"EmployeeController/UpdateEmployee",
      data:{EMPID:EMployeId, NAME:Name, FNAME:Fname, EMPNUMBER:EmpNumber, ROLEID:EmpRole},
      success:function (data) {

        // Display backend result in the dom
        $(".js_UpdateEmpResult").html(data);

      },
      error:function (xhr) {

        alert("Error: " +xhr.responseText);

      }
    })
    // End ajax


    // Close modal
    // $('#js_EmpDetail').modal('close');

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

  $("#js_CreateQr").on('click', function () {

    // Get Employee number
    var EmpNumber=$("#js_EmpNumber").val();

    // Get Employee name and first name
    var EmName=$("#js_empname").val() +" "+ $("#js_FstNme").val();

    // Get elemt
    var Item=$(this);

    // Add or remove class
    Item.toggleClass("QrCreated");

    // Validate if the button has QrCreated class
    if ( Item.hasClass("QrCreated") ) {

      // Creates Qr
      QrCode = new QRious({
        element: document.getElementById('js_QrCode'),
        value:EmpNumber,
        size: 170,
      });
      // End Qr creation

      // Change btn text
      Item.text("Download Qr Code");

      // Remove download attr. and clear href attr
      Item.removeAttr('download').attr('href','#!');;

      // Display canvas.
      $("#js_QrCode").show();

    }else {

      // Generates a vaalid img path
      ImgPath=QrCode.toDataURL('image/jpeg');

      // Add download attr and add the img pathin href attr. to allow downlad the qr code
      Item.attr('download',EmName).attr('href',ImgPath);

      // Change Btn Text
      Item.text("Create QrCode");

      // Hide canvas.
      $("#js_QrCode").hide();

    }
    // End Validation


  });
  // End click

  $("#js_Edit").click(function () {

    // Remove dissable attr to allow edit employee info
    $(".js_EmpInfoForm").find('input').removeAttr("disabled");

    // Remove disable attr from select tag
    $("#js_RolesId").removeAttr("disabled");

    // Enable Save btn
    $("#js_ModifyEmpInfo").removeAttr("disabled");

  });
  // End Click

  $("#js_Delete").click(function () {

    // Get Employee id
    EMployeId

    alert("Employee id is: "+EMployeId+ " this employee will be deleted");


  });
  // End click


});
// End Scope
