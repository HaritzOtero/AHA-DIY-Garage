<html>

<head>
    <title>AHA DIY Garage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>

        /* body{
        background-image: url('background.jpg');
    } */

    </style>
</head>

<body>
<?php
    session_start();
    include("../include/nav-bar.php");
?>

    <div class="container" style="margin-top:30px; background-color: white;">
        <div class="row">
            <div class="col-sm">
                <div>
                    <h6 class="underLine">CONTACT</h6>
                </div>
                <div class="mt-3">
                    <p>Email: ahagarage@gmail.com</p>
                    <p>Phone number: 633457021</p>
                    <p>Location: Eibar</p>
                </div>
                <div>
                    <h6 class="underLine">SOCIAL MEDIA</h6>
                </div>
                <div class="container">
                    <!--Instagram-->
                    <div class="row mt-3">
                        <div class="col-sm">
                            <img src="../images/instagram.webp" style="width: 50px; height: 50px;">
                        </div>
                        <div class="col-sm mt-3 mr-5">
                            <p class="socialMedia">@ahaGarage</p>
                        </div>
                    </div>
                    <!--Twitter-->
                    <div class="row mt-3">
                        <div class="col-sm">
                            <img src="../images/twitter.png" style="width: 50px; height: 50px;">
                        </div>
                        <div class="col-sm mt-3 mr-5">
                            <p class="socialMedia">@ahaGarage</p>
                        </div>
                    </div>
                    <!--Facebook-->
                    <div class="row mt-3">
                        <div class="col-sm">
                            <img src="../images/facebook.png" style="width: 50px; height: 50px;">
                        </div>
                        <div class="col-sm mt-3 mr-5">
                            <p class="socialMedia">@ahaGarage</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <img src="../images/logo.png" style="width: 550px; height: 300px;">
            </div>
            <div class="col-sm">
                <div>
                    <h6 class="underLine">SCHEDULE</h6>
                </div>
                <div class="mt-3">
                    <p>MONDAY: 8:00-22:00</p>
                    <p>TUESDAY: 8:00AM-22:00</p>
                    <p>WEDNESDAY: 8:00-22:00</p>
                    <p>THURSDAY: 8:00-22:00</p>
                    <p>FRIDAY: 8:00-22:00</p>
                    <p>SATURDAY: 8:00-22:00</p>
                    <p>SUNDAY: CLOSED</p>
                </div>
            </div>
        </div>
    </div>

    <!--Send a message-->
    <div class="container mt-5">
        <div>
            <div>
                <h2>Send a message</h2>
            </div>
            <div class="mt-3">
                <form action="/action_page.php">
                    <div class="container">
                        <!--1.row-->
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" placeholder="Enter name" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control" placeholder="Enter email" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="email">Phone number:</label>
                                    <input type="number" class="form-control" placeholder="Enter number" id="phone">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="comment">Message:</label>
                                    <textarea class="form-control" placeholder="Enter message" rows="5" id="comment"></textarea>
                                </div>
                                <div align="right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="jumbotron text-center " style="margin-bottom:0; margin-top: 50px;">
        <p>Footer</p>
    </div>

</body>

</html>