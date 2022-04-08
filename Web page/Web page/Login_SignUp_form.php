<html>

<head>
  <title>Login / Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>

      #login {
            margin-left: 1300px;
        }
      #loginSignUp{
          display:flex;
          width:850px;
          margin:auto;
          margin-top:200px;
          /* border:1px solid red; */
      }

      #loginForm{
          width:300px;
          padding-right:125px;
          margin-right:125px;
          border-right:1px solid black;
          /* border: 1px solid black; */
      }

      #SignUpForm{
          width:300px;
          /* border: 1px solid black; */
      }
      .UserIcon{
            width: 30px;
            height: 30px;
        }

        #erabiltzailea{
            border:1px solid red;
            margin-left: 1300px;
        }
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
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./aboutUs.php">ABOUT US</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./contact.php">CONTACT</a>
                </li>

                <?php
                if(!isset($_SESSION['izena'])){
                ?>
                <li class="nav-item" id="login">
                    <a class="nav-link" href="./Login_SignUp_form.php">LOG-IN / SIGN UP</a>
                </li>

                <?php
                }
                ?>

                <?php
                         if(isset($_SESSION['izena'])){
                            $user = $_SESSION['izena'];
                ?>
               
               <li class="nav-item dropdown" id="erabiltzailea">
                      
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


<div id="loginSignUp">
           <!-- LOGIN -->
<div id="loginForm">
    <h2>Logeatu</h2>
<form action="Login.php" method="post">
  

  <div class="form-group">
    <label>Helbide elektronikoa:</label>
    <input type="email" class="form-control" id="izena" placeholder="Helbide elektronikoa" name="email">
  </div>

  <div class="form-group">
    <label>Pasahitza:</label>
    <input type="password" class="form-control" id="pasahitza" placeholder="Pasahitza" name="password">
  </div>

  <button type="submit" class="btn btn-primary bidali">Bidali</button>
  <button type="reset" class="btn btn-primary">Ezabatu</button>
</form>

                <!-- LOGIN DATUAK SARTU ONDOREN -->
<?php
            if(isset($_GET["okerra"])){
                if($_GET["okerra"]=="bai"){
                    ?>

                    <p style="color:#F00">
                        <b>Datuak txarto sartu dituzu</b></p>
                    <?php
                }
            }
            ?>
            
</div>



            <!-- SIGN UP -->
<div id="SignUpForm">
<h2>Izena eman</h2>
<form action="SignUp.php" method="post">
  

  <div class="form-group">
    <label>Izena:</label>
    <input type="text" class="form-control" id="izena" placeholder="Izena" name="name" required>
  </div>

  <div class="form-group">
    <label>Abizena:</label>
    <input type="text" class="form-control" id="izena" placeholder="Abizena" name="surname" required>
  </div>

  <div class="form-group">
    <label>Helbide elektronikoa:</label>
    <input type="email" class="form-control" id="izena" placeholder="adibidea@email.com" name="email" required>
  </div>  

  <div class="form-group">
    <label>Telefono zenbakia:</label>
    <input type="text" class="form-control" id="izena" placeholder="Telefono zenbakia" name="phone" required>
  </div>

  <div class="form-group">
    <label>Pasahitza:</label>
    <input type="password" class="form-control" id="pasahitza" placeholder="Pasahitza" name="password" required>
  </div>

  <button type="submit" class="btn btn-primary bidali">Bidali</button>
  <button type="reset" class="btn btn-primary">Ezabatu</button>
</form>



                <!-- SIGN UP DATUAK SARTU ONDOREN -->

<?php
            if(isset($_GET["erregistratu"])){
                if($_GET["erregistratu"]=="ez"){
                    ?>

                    <p style="color:#F00">
                        <b>Email hori existitzen da, erabili beste bat</b></p>
                    <?php
                }
            }
            ?>
            <?php
            if(isset($_GET["erregistratu"])){
                if($_GET["erregistratu"]=="bai"){
                    ?>

                    <p style="color:#0F0">
                        <b>Datuak ondo sartu dituzu</b></p>
                    <?php
                }
            }
?>
</div>
</div>

<div class="jumbotron text-center " style="margin-bottom:0; margin-top: 50px;">
        <p>Footer</p>
    </div>
</body>
</html>