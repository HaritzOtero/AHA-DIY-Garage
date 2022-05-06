<html>
    <body>
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
                    <a class="nav-link" href="./FrontPage/aboutUs.php">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./FrontPage/contact.php">CONTACT</a>
                </li>
                <?php
                if(isset($_SESSION['position'])){
                ?>
                    <li class="nav-item" id="loginErabiltzailea">
                        <a class="nav-link" href="./worker/worker_product.php">MANAGE PRODUCTS</a>
                    </li>

                    <?php
                }
                ?>

            </ul>

            <ul class="navbar-nav">
                <?php
                if(!isset($_SESSION['name'])){
                ?>
                    <li class="nav-item" id="loginErabiltzailea">
                        <a class="nav-link" href="./FrontPage/Login_SignUp_form.php">LOG-IN / SIGN UP</a>
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
                                     <a class="dropdown-item" href="./FrontPage/UserProfile.php">My profile</a>
                                     <a class="dropdown-item" href="./login/LogOut.php">Log Out</a>
                                </div>

                </li>
                            <?php
                  }
                ?>
                </ul>
        </div>
    </nav>
    </body>
</html>