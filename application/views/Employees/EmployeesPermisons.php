<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Productions Permisons</title>
  </head>
  <body>

    <!-- Start  -->
    <div class="row">

    </div>


    <h3 class="center-align">Production Permisons</h3>

    <!-- Start Permisons types lits -->
    <div class="row">

      <!-- Add 1 space blank to the right to center permisons types -->
      <div class="col s12 m1"></div>

      <!-- Display backend results -->
      <?php foreach ($PermisonsTypes->result() as $row) {  ?>

        <!-- Start Permison type card -->
        <div class="col s12 m2 js_a"  data-permd="<?=$row->Id?>">
          <div class="card-panel teal">

            <?php

            // Validate permison id to add the icon correct
            switch ($row->Id) {

              case 1:

                echo "
                <div class='center-align white-text'>
                <i class='material-icons medium'>&#xE63D;</i>
                </div>";

              break;

              case 2:

              echo "
              <div class='center-align white-text'>
              <i class='material-icons medium'>&#xE561;</i>
              </div>";

              break;

              case 3:

              echo "
              <div class='center-align white-text'>
              <i class='material-icons medium'>&#xE853;</i>
              </div>";

              break;

              case 4:

              echo "
              <div class='center-align white-text'>
              <i class='material-icons medium'>&#xE548;</i>
              </div>";

              break;

              default:

              echo "
              <div class='center-align white-text'>
              <i class='material-icons medium'>&#xE645;</i>
              </div>";

              break;
            }

             ?>

            <h4 class="white-text center-align"><?=$row->Description?></h4>

          </div>
        </div>
        <!-- Start Permison type card -->

      <?php } ?>
      <!-- End foreach -->



    </div>
    <!-- End Permisons types list -->

  </body>

  <!-- Jquery  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Materialize js Files -->
  <script type="text/javascript" src="<?=base_url('materialize\js\materialize.min.js')?>"></script>

  <!-- Framework effects -->
  <script type="text/javascript" src="<?=base_url("materialize\js\Main.js")?>"></script>

  <script type="text/javascript">

    // Storage the server path
    let URL="<?=base_url('index.php/')?>"

  </script>

  <!-- Aditional js -->
  <script type="text/javascript" src="<?=base_url('materialize\js\Employees\Production.js')?>"></script>


</html>
