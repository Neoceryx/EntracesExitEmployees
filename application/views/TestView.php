<!DOCTYPE html>
<html>
  <head>

    <title>Entraces And exits</title>

  </head>
  <body>

    <h3>Shift Entrances and exits</h3>

    <a href="<?=site_url('EmployeeController/test/123')?>">TesMethod</a>

    <?php foreach ($Employees->result() as $employee ) {?>

      <p> <?=$employee->NameEmp?> </p>

    <?php  } ?>

  </body>
</html>
