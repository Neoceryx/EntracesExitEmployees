<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Test View</title>
  </head>
  <body>

    <h3>This is a Test View</h3>

    <a href="<?=site_url('EmployeeController/test/123')?>">TesMethod</a>

    <?php foreach ($Employees->result() as $employee ) {?>

      <p> <?=$employee->NameEmp?> </p>

    <?php  } ?>

  </body>
</html>
