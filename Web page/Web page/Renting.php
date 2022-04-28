<html>

<head>
  <title>Login / Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>

  </style>
</head>
<body>

<?php
    session_start();
?>

<?php
     if(!isset($_SESSION['name'])){
        header("Location:Login_SignUp_form.php?logeatu=logeatu");
     }
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


    
</div>

<div class="garagesDiv">

  <div class="garage">
      <div class="garageElement">
          <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ultricies commodo nisl, vel hendrerit urna posuere ut. Quisque feugiat accumsan purus tincidunt consectetur. Donec tincidunt eget libero vel congue. Nam tempus sapien in posuere dapibus. Donec porttitor convallis leo, nec semper sapien euismod eget. Sed tempor nibh eu consequat ultrices. Nulla volutpat semper sapien sed dapibus. Aenean eget metus arcu. Sed ipsum tellus, viverra id mi non, fermentum accumsan ex. Donec non eros id urna tincidunt pellentesque. Praesent nec vulputate quam.
          </p>

          <a class="nav-link" href="garage_1.php">GARAGE 1</a>

      </div>
  </div>

  <div class="garage">
      <div class="garageElement">
          <p>
          Maecenas at luctus odio. Praesent enim tellus, rhoncus sit amet nulla sit amet, scelerisque faucibus neque. Maecenas pretium vel justo eget aliquet. Nulla magna eros, consequat eget nulla eget, blandit vulputate sem. In congue sit amet dolor ac tristique. Donec consectetur accumsan diam, quis euismod magna tempus ac. Morbi dictum nunc et justo gravida pellentesque. Suspendisse sollicitudin dignissim euismod.
          </p>

          <a class="nav-link" href="#">GARAGE 2</a>

      </div>
  </div>

  <div class="garage">
      <div class="garageElement">
          <p>
          Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer varius ut velit id varius. Sed aliquet eros quam, lacinia pharetra massa tempus pulvinar. Vestibulum ullamcorper, ex eu dictum fermentum, erat odio mollis nulla, eu aliquet mi orci tristique elit. Donec eros lacus, suscipit sit amet nibh a, fringilla dignissim mi. Vivamus fringilla eu dolor ut rutrum. Duis suscipit vehicula ante, a ultricies urna sodales nec. Curabitur dui orci, tempor eu arcu eu, faucibus malesuada mauris. Pellentesque sed dignissim risus. Cras enim quam, condimentum sed orci eget, viverra dapibus lectus.
          </p>

          <a class="nav-link" href="#">GARAGE 3</a>

      </div>
  </div>
</div>



<div class="jumbotron text-center " style="margin-bottom:0; margin-top: 50px;">
        <p>Footer</p>
    </div>
</body>
</html>