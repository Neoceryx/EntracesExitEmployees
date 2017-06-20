$(document).ready(function () {

  $("#js_Srch").click(function () {

    // Get Employe Number
    var NoEmp=$("#js_NoEmp").val();

    // Iterate over Employe Records
    $(".js_EmpRecords").each(function () {

      // Get the element
      var Item = $(this);

      // Get all Employes Names from the table
      var EmpName=Item.find("td").eq(0).text();

      console.log(EmpName);

    });

  });


});
