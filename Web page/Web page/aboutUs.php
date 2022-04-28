<html>

<head>
    <title>AHA DIY Garage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    </style>
</head>

<body>
<?php
    session_start();
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="./index.php">
            <img src="./images/logo.png" alt="logo" style="width:150px; height: 100px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./aboutUs.php">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contact.php">CONTACT</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <?php
                if(!isset($_SESSION['name'])){
                ?>
                    <li class="nav-item" id="loginErabiltzailea">
                        <a class="nav-link" href="./Login_SignUp_form.php">LOG-IN / SIGN UP</a>
                    </li>

                    <?php
                }
                ?>
                   <?php
                         if(isset($_SESSION['name'])){
                            $user = $_SESSION['name'];
                ?>

                <li class="nav-item dropleft" id="loginErabiltzailea">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                <img src="./images/login_icon.png" alt="" class="UserIcon">
                                    <?php
                           echo "$user";
                          ?>
                                </a>
                                <div class="dropdown-menu">
                                     <a class="dropdown-item" href="UserProfile.php">My profile</a>
                                     <a class="dropdown-item" href="LogOut.php">Log Out</a>
                                </div>

                </li>
                            <?php
                  }
                ?>
                </ul>
        </div>
    </nav>

    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm">
                <h2>About Us</h2>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm">
                <div><img src="./images/taller.jpg" style="width: 550px; height: 300px;"></div><br>
            </div>
            <div class="col-sm">
                <h5>
                    Come to AHA Service Garage, fix your car yourself, save money, and Be Your Own Mechanic!
                </h5>
                <p>
                    At AHA Service Garage you get:
                </p>
                <p>
                    -A bay with a professional grade car lift<br> -A professional grade workstation<br> -Experts who can answer questions<br> -A professional grade set of tools included in each bay<br> -Air tools<br> -Located in Eibar,Gipuzkoa
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm">
                <img src="./images/liftDef.jpg" style="width: 300px; height: 200px;">
                <h6 class="mt-2">LIFTS</h6>
                <p>There are ifferent types of lifts in the garage,perfect for any vehicle,independent of it's size.</p>
            </div>
            <div class="col-sm">
                <img src="./images/tools.jpg" style="width: 300px; height: 200px;">
                <h6 class="mt-2">TOOLS</h6>
                <p>AHA has all the tools you'll need, all in one place. From socket sets to hydraulic presses, you'll have the tools of the pros without the expense.</p>
            </div>
            <div class="col-sm">
                <img src="./images/products.jpg" style="width: 300px; height: 200px;">
                <h6 class="mt-2">PRODUCTS</h6>
                <p>All the products that you need for the repair available.</p>
            </div>
        </div>
    </div>

    <div class="jumbotron text-center footer" style="margin-bottom:0">
        <p>Footer</p>
    </div>

</body>

</html>