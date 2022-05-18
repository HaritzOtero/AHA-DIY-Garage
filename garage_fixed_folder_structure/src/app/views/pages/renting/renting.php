<!-- Head -->
<?php
$TITLE = "Rent a garage";
$CSS_PATH = "./renting.css";
include_once("../../../includes/head/head.php");
?>

<body>
  <!-- Navigation bar -->
  <?php
  session_start();
  if (!isset($_SESSION['name'])) {
    header("Location:../signin/signin.php");
  }
  include("../../../includes/navigation/navigation-bar.php");
  ?>

  <!-- Banner -->
  <div class="banner">
    <h1 class="p-2 display-1 text-light">Rent a garage</h1>
  </div>

  <!-- <======= Main information =======> -->

  <!-- Garage 1 -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm d-flex align-items-center justify-content-center pt-5 pb-5 animated slide-left">
        <img src="../../../../assets/images/garage/garage-1.jpg" class="w-50 h-50">
      </div>
      <div class="col-sm d-flex align-items-center justify-content-center pt-5 pb-5 animated slide-left">
        <div class="w-50">
          <h1>Garage 1</h1>
          <p>This is a garage special for Car sized vehicles, it's dimensions are: 6 x 6 x 2,5m. It has some windows but also powerful lights so you can repair your car wih good illumination. It also have a vehicle elevator to repair car parts located under the car. Basic car-repair tools included in the price.</p>
          <a class="btn btn-primary" href="../../../requests/garage-1/garage.php">GARAGE 1</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Garage 2 -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm d-flex align-items-center justify-content-center pt-5 pb-5 scrollEvent slide-left">
        <img src="../../../../assets/images/garage/garage-2.jpg" class="w-50">
      </div>
      <div class="col-sm d-flex align-items-center justify-content-center pt-5 pb-5 scrollEvent slide-left">
        <div class="w-50">
          <h1>Garage 2</h1>
          <p>This is a garage special for motorbikes or bike sized vehicles, it's dimensions are: 3 x 3 x 2,5m. It has some windows but also powerful lights so you can repair your motorbike wih good illumination. There isnt any vehicle elevator, if its needed, you should rent the 1st garage. Basic motorbike-repair tools included in the price.</p>
          <a class="btn btn-primary" href="../../../requests/garage-2/garage.php">GARAGE 2</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Garage 3 -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm d-flex align-items-center justify-content-center pt-5 pb-5 scrollEvent slide-left">
        <img src="../../../../assets/images/garage/garage-3.jpg" class="w-50">
      </div>
      <div class="col-sm d-flex align-items-center justify-content-center pt-5 pb-5 scrollEvent slide-left">
        <div class="w-50">
          <h1>Garage 3</h1>
          <p>This is a garage special for vans sized vehicles, it's dimensions are: 7 x 7 x 4m. It has some windows but also powerful lights so you can repair your van wih good illumination. There is a powerful vehicle elevator, a special van adapted to van´s width. Basic van-repair tools included in the price.</p>
          <a class="btn btn-primary" href="../../../requests/garage-3/garage.php">GARAGE 3</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Footer -->
  <?php
  include("../../../includes/footer/footer.php");
  ?>
</body>