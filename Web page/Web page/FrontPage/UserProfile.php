<html>

<head>
  <title>Login / Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
       #login {
            margin-left: 1300px;
       }
      .UserProfile{
          margin: auto;
          margin-top: 100px;
          width:1000px;
          height: 600px;
          border: 1px solid red;
          display: flex;
      }

      .profileDiv{
          width: 500px;
          border: 1px solid black;
          display: flex;
          justify-content: center;
          align-items: center;
      }

      .UserInformation{
        border:1px solid blue;
        width: 400px;
        height: 600px;
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .privateInformation{
          width: 100%;
          border: 1px solid black;
          display: flex;
          justify-content: center;
          align-items: center;
      }

      .imageAndOptions{
        border:1px solid blue;
        width: 400px;
        height: 600px;
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      .image{
        border:1px solid green;
        width: 300px;
        height: 300px;
      }
      .ProfileUserIcon{
          width:100%;
          height:100%;
      }
      .options{
        border:1px solid orange;
        width: 400px;
        height: 300px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
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
include("nav-bar.php");
?>

    

<div class="UserProfile">

    <div class="profileDiv">
        <div class="imageAndOptions">
            <div class="image">
                <img src="./images/login_icon.png" alt="" class="ProfileUserIcon">
            </div>
            <div class="options">
                <div>
                <a href="LogOut.php">
                    <button type="button" class="btn btn-primary">Log Out</button>
                </a>
                </div>
            <div>
                <button type="button" class="btn btn-danger">Delete account</button>
            </div>
            
            </div>
        </div>
    </div>

    <div class="profileDiv">
        <div class="UserInformation">
            
<?php
        include("Connect.php");
        $link=KonektatuDatuBasera();
        $userID = $_SESSION['userID'];
        $name = $_SESSION['name'];
        

        $surname = mysqli_query($link,"select surname from client where client_id = '$userID'");
        $surname = mysqli_fetch_array($surname);
        $surname = $surname[0];

        $email = mysqli_query($link,"select email_address from client where client_id = '$userID'");
        $email = mysqli_fetch_array($email);
        $email = $email[0];

        $phone = mysqli_query($link,"select phone_number from client where client_id = '$userID'");
        $phone = mysqli_fetch_array($phone);
        $phone = $phone[0];

        $password = mysqli_query($link,"select password from client where client_id = '$userID'");
        $password = mysqli_fetch_array($password);
        $password = $password[0];
        ?>

            <div class="privateInformation">
                <p>
                    Your name: 
                    <?php
                    echo "$name";
                    ?>
                </p>
            </div>
            <div class="privateInformation">
                <p>
                Your surname: 
                    <?php
                    echo "$surname";
                    ?>
                </p>
            </div>
            <div class="privateInformation">
                <p>
                    Your email: 
                    <?php
                    echo "$email";
                    ?>
                </p>
            </div>
            <div class="privateInformation">
                <p>
                    Your phone:
                    <?php
                     
                    echo "$phone";
                    ?>
                </p>
            </div>
            <div class="privateInformation">
                <p>
                    Your password:
                    <?php
                    echo "$password";
                    ?>
                </p>
            </div>
        
        </div>
    </div>

</div>


<div class="jumbotron text-center " style="margin-bottom:0; margin-top: 50px;">
        <p>Footer</p>
    </div>
</body>
</html>