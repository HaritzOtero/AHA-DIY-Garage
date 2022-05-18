<!-- head -->
<?php
$TITLE = "AHA DIY Garage";
$CSS_PATH = "./starter-page.css";
include_once("../../../includes/head/head.php");
?>


<body>
    <!-- Navigation bar -->
    <?php
    session_start();
    include("../../../includes/navigation/navigation-bar.php");
    ?>

    <!-- Slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="../../../../assets/images/garage/pexels-andrea-piacquadio-3807226.jpg" alt="Second slide" style="height: 50vh; object-fit: cover; filter: blur(0px);" />
                <div class="carousel-caption text-align-center">
                    <h1 class="font-weight-bold">AHA DIY Garage</h1>
                    <h3>The Do Yourself Garage</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../../../../assets/images/garage/pexels-andrea-piacquadio-3807277.jpg" alt="Second slide" style="height: 50vh; object-fit: cover; filter: blur(0px);" />
                <div class="carousel-caption text-align-center">
                    <h1 class="font-weight-bold">Learn more about the DIY Garage</h1>
                    <a href="../about-us/about-us.php" class="btn btn-primary">About us!</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../../../../assets/images/garage/pexels-andrea-piacquadio-3807329.jpg" alt="Third slide" style="height: 50vh; object-fit: cover; filter: blur(0px);" />
                <div class="carousel-caption text-align-center">
                    <h1 class="font-weight-bold">Contact us!</h1>
                    <a href="../contact/contact.php" class="btn btn-primary">Contact</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Main information -->
    <!-- container information one -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm d-flex border-top align-items-center justify-content-center pt-5 pb-5 animated slide-left">
                <img src="../../../../assets/images/garage/outside.jpg" class="w-50">
            </div>
            <div class="col-sm d-flex border-top align-items-center justify-content-center pt-5 pb-5 animated slide-right">
                <div class="w-50">
                    <h1>AHA DIY Garage</h1>
                    <p>At AHA DIY Garage, we have the equipment and staff to help you take care of your vehicle when it fits your schedule and priced to save you 60% or more compared to traditional repair.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- container information two -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm d-flex border-top align-items-center justify-content-center p-4 scrollEvent slide-left">
                <div class="w-50">
                    <h1>Inside one of our cabins</h1>
                    <p>We offer a 10,000 lb lift for most cars and SUVs.Most tools required are included in your rental,including air tools and hand tools.</p>
                </div>
            </div>
            <div class="col-sm d-flex border-top align-items-center justify-content-center p-4 scrollEvent slide-right">
                <img src="../../../../assets/images/garage/inside.jpg" class="w-50">
            </div>
        </div>
    </div>

    <!-- container information renting -->
    <div class="container-fluid scrollEvent scrollEvent slide-left">
        <div class="d-flex align-items-center justify-content-center p-4">
            <div class="text-center">
                <h1>Rent now!</h1>
                <a href="../renting/renting.php"><img src="../../../../assets/images/garage/rent.png" style="border-top-radius: 10px;"></a>
                <p>👆Go to rentings!👆</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
    include("../../../includes/footer/footer.php");
    ?>

</body>

</html>