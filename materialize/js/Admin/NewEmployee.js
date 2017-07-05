$(document).ready(function () {

  // <summary> This Script Use URL varible from the view </summary>

  // Constant
  let YES=1;

  // Validate From
  $("#js_FormRegEmp").validate({

    // fields Rules Validations
    rules:{

      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side

      jv_Name:{required:true, minlength:4},
      jv_FstName:{required:true, minlength:4},
      jv_EmpNum:{required:true, number: true, minlength:4},
      js_EmpPass:{required:true, minlength:4},
      jv_EmpRole:"required"

    }

  })

  // Register New Employees
  $("#js_SaveEmp").click(function () {

    // Call fields form Validations
    if ( $("#js_FormRegEmp").valid() ) {

      // Get Employee Name
      var Name=$("#js_Name").val();

      // Get Employe FirstName
      var FstName=$("#js_FstName").val();

      // Get Employee Number
      var EmpNumbr=$("#js_EmpNumbr").val();

      // Get Emp Pass
      var EmpPass=$("#js_Pass").val();

      // Get Employee Role Id
      var EmpRoleId=$("#js_EmpRole").val();

      // Start ajax
      $.ajax({
        type:"POST",
        url:URL+"EmployeeController/AddNewEmployee",
        data:{NAME:Name, FSTNAME:FstName, EMPNUMBR:EmpNumbr, EMPASS:EmpPass, EMPROLEID:EmpRoleId},
        success:function (data) {

          // Display bakenc data in the DOM'
          $(".js_Result").html(data);

          // Get the repeats Employee
          var IsRegister=parseInt( $(".js_Result").text() );

          // Validation
          if (IsRegister >= YES) {

            // Set screen position notification
            alertify.set('notifier','position', 'top-left');

            // Display notification
            alertify.notify(
              "This Employe is allready Registered",
              'error',
              4,
              alertify.get('notifier','position')
            );

          }else {

            // Set screen position notification
            alertify.set('notifier','position', 'top-left');

            // Display notification
            alertify.notify(
              "Employee has been registered",
              'success',
              4,
              alertify.get('notifier','position')
            );

            // Clear Field from
            $('#js_FormRegEmp')[0].reset();

          }
          // End Validation

        },
        error:function (xhr) {

          alert("Error: " +xhr.responseText);

        }

      });
      // End ajax

    }
    // End Valiadtion fields rules

  });
  // End click



});
