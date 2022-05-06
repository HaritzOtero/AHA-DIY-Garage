<html>

<head>
    <title>AHA DIY Garage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>

        body {
            background: url(../images/background.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>

<body>
<?php
    session_start();
    include("./include/nav-bar-index.php");
?>


    <div class="container" style="margin-top:30px; background-color: white;">
        <div class="row">
            <div class="col-sm-6">
                <br>
                <h2>AHA DIY Garage</h2>
                <h5>The Do Yourself Garage</h5>

                <div><img src="./images/outside.jpg" style="width: 550px; height: 300px;"></div><br>
                <p style="text-align: center;">Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                    by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                <h3>Characteristics of our garage:</h3>
                <p>
                    - Nam sed nisi commodo, molestie urna id, consequat risus.<br> - Suspendisse fringilla quam vitae placerat scelerisque.<br> - Donec iaculis augue non enim pulvinar, vel condimentum dolor consectetur.<br> - Praesent in sapien non arcu
                    pretium condimentum nec in massa.<br> - In consectetur turpis et fermentum laoreet.<br> - Nullam a urna vitae metus vulputate interdum.<br>
                </p>

                <hr class="d-sm-none">
            </div>
            <div class="col-sm-6">
                <br>
                <h2>Inside one of our cabins</h2><br>
                <div><img src="./images/inside.jpg" style="width: 550px; height: 300px;"></div>
                <p style="text-align: center;">Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor</p>
                <p style="text-align: center;">Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                <br>
                <br>
                <br>
                <div style="margin-left: 150px;">
                    <a href="./FrontPage/Renting.php"><img src="./images/rent.png" style="border-radius: 10px;"></a>
                </div>
                <p style="margin-left: 205px;">👆Go to rentings!👆</p>
            </div>
        </div>
    </div>

    <div class="jumbotron text-center " style="margin-bottom:0; margin-top: 50px;">
        <p>Footer</p>
    </div>

</body>

</html>