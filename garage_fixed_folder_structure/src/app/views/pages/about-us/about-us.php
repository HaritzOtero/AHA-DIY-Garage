<!-- Head -->
<?php
$TITLE = "About us";
$CSS_PATH = "./about.css";
include_once("../../../includes/head/head.php");
?>

<body>
    <!-- Navigation bar -->
    <?php
    session_start();
    include("../../../includes/navigation/navigation-bar.php");
    ?>

    <!-- Banner -->
    <div class="banner">
        <h1 class="p-2 display-1 text-light">About us</h1>
    </div>

    <!-- Cards -->
    <div class="container-fluid">
        <h2 class="text-center display-3">Information</h2>
        <div class="card-container mt-5 mb-5">
            <div class="card-deck">
                <div class="card ml-5 mr-5 animated slide-left" style="width: 18rem;">
                    <img src="../../../../assets/images/garage/inside.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Lift</h5>
                        <p class="card-text">There are different types of lifts in the garage, perfect for any vehicle,independent of it's size.</p>
                    </div>
                </div>
                <div class="card ml-5 mr-5 animated slide-bottom" style="width: 18rem;">
                    <img src="../../../../assets/images/garage/inside.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Tools</h5>
                        <p class="card-text">AHA has all the tools you'll need, all in one place. From socket sets to hydraulic presses, you'll have the tools of the pros without the expense.</p>
                    </div>
                </div>
                <div class="card ml-5 mr-5 animated slide-right" style="width: 18rem;">
                    <img src="../../../../assets/images/garage/products.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <p class="card-text">All the products that you need for the repair available</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main information -->
    <div class="container-fluid">
        <!-- Explain what you can do -->
        <div class="container-fluid scrollEvent slide-left">
            <div class="row">
                <div class="col-sm d-flex align-items-center justify-content-center p-4">
                    <div class="w-50 text-center">
                        <h4 class="text-center display-4">Why AHA Garage Service?</h4>
                        <ul class="list-unstyled">
                            <li>
                                <h6>You can fix your own car all by yourself!</h6>
                            </li>
                            <li>
                                <h6>You can save money</h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm d-flex align-items-center justify-content-center p-4">
                <img src="../../../../assets/images/garage/outside.jpg" style="width: 40%">
            </div>
        </div>

        <!-- What tools are available -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm d-flex align-items-center justify-content-center p-4 scrollEvent slide-left">
                    <div class="w-50">
                        <h3>What tools/services are available</h3>
                        <ul class="list-unstyled">
                            <li>
                                <h6>A bay with a professional grade car lift</h6>
                            </li>
                            <li>
                                <h6>A professional grade workstation</h6>
                            </li>
                            <li>
                                <h6>Experts who can answer questions</h6>
                            </li>
                            <li>
                                <h6>Mechanics who can answer your questions</h6>
                            </li>
                            <li>
                                <h6>Professional grade tools</h6>
                            </li>
                            <li>
                                <h6>Air pressure machine</h6>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm d-flex align-items-center justify-content-center p-4 scrollEvent slide-right">
                    <div class="scroll slide-right">
                        <img src="../../../../assets/images/garage/inside.jpg" class="w-50">
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid of all the tools -->
        <!-- Location -->
        <div class="container-fluid scrollEvent fade-in">
            <div class="row">
                <div class="col-sm d-flex align-items-center justify-content-center p-4">
                    <div class="w-50 text-center">
                        <h3 class="display-3">Location</h3>
                        <h4>Eibar</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm d-flex align-items-center justify-content-center p-4">
                <img src="../../../../assets/images/garage/map.jpg" class="w-50">
            </div>
        </div>
    </div>


    <!-- Footer -->
    <?php
    include("../../../includes/footer/footer.php");
    ?>

</body>

</html>