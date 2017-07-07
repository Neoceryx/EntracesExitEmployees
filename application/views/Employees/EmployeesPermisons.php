<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Productions Permisons</title>

    <!-- Alertfy css Files -->
    <link rel="stylesheet" href="<?=base_url("materialize\Plugins\alertifyjs\css\alertify.min.css")?>">
    <link rel="stylesheet" href="<?=base_url("materialize\Plugins\alertifyjs\css/themes\default.min.css")?>">

  </head>
  <body>

    <h3 class="center-align">Production Permisons</h3>

    <!-- Start Permisons types lits -->
    <div class="row">

      <!-- Add 1 space blank to the right to center permisons types -->
      <div class="col s12 m1"></div>

      <!-- Display backend results -->
      <?php foreach ($PermisonsTypes->result() as $row) {  ?>

        <!-- Start Permison type card -->
        <div class="col s12 m2 js_Permison"  data-permid="<?=$row->Id?>">
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

    <!-- Start qr reader container -->
    <div class="row">

      <!-- Add 1 blank sapace to the lef to adjust the Qr reader and table permisons -->
      <div class="col s12 m1"></div>

      <!-- Start Web Cam container -->
      <div class="col s12 m5">

        <!-- Start web cam controlls -->
        <div>

          <button id="js_Play"type="button" name="button" class="btn waves-effect waves-light">
            <i class="material-icons left">&#xE038;</i>
            Play
          </button>

          <button id="js_Stop" type="button" name="button" class="btn red waves-effect waves-light">
            <i class="material-icons left">&#xE047;</i>
            Stop
          </button>

        </div>
        <!-- End web cam controlls -->


        <!-- Web Cam Decoder -->
        <canvas style="margin-top:2%"></canvas>

        <!-- Display the code val decoded -->
        <div id="js_Coderesult"></div>

      </div>
      <!-- Start Web Cam container -->


      <div class="col s12 m5">

        Table Permisons

      </div>



    </div>
    <!-- End qr reader container -->

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

  <!-- Codes Decoder js files -->
  <script type="text/javascript" src="<?=base_url('materialize\Plugins\webcodecamjs-master\js\qrcodelib.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('materialize\Plugins\webcodecamjs-master\js\webcodecamjquery.js')?>"></script>

  <!-- Alertfy js -->
  <script src="<?=base_url("materialize\Plugins\alertifyjs\alertify.min.js")?>"></script>


</html>
