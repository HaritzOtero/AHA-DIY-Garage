<!-- Head -->
<?php
$TITLE = "Profile";
$CSS_PATH = "./profile.css";
include_once("../../../includes/head/head.php");
?>

<body>
  <!-- Navigation bar -->
  <?php
  session_start();
  $userID = $_SESSION['userID'];
  include("../../../includes/navigation/navigation-bar.php");
  ?>
    <script>
function Info() {
    document.getElementById('userInformation').style.display='block';
    document.getElementById('userInformationForm').style.display='none';
}
function Form() {
    document.getElementById('userInformation').style.display='none';
    document.getElementById('userInformationForm').style.display='block';
}
</script>


  <!-- Banner -->
  <div class="banner">
    <h1 class="p-2 display-1 text-light">Profile</h1>
  </div>

  <!-- Profile -->
  <div class="profile-box animated fade-in">
    <div class="container">
      <div class="row justify-content-center col-md-12 col-lg-10">
        <div class="wrap">
          <div class="p-4 p-md-5">
            <div class="d-flex flex-wrap">
              <div class="img"></div>
              <!-- Profile form -->
              <div class="userInformatoin">              
              <?php
                include("Location:../../../../../module/connection.php");
                $link = KonektatuDatuBasera();
                if (isset($_SESSION['position'])) {
                    $erregistroa = mysqli_query($link,"select * from employee where employee_id = $userID");
                    $erregistroa = mysqli_fetch_array($erregistroa);
                    printf("
                <div class='privateInformation'>
                    <p>
                        ID: %s
                    </p>
                </div>
                <div class='privateInformation'>
                    <p>
                        Name: %s
                    </p>
                </div>
                <div class='privateInformation'>
                    <p>
                        Surname: %s
                    </p>
                </div>
                <div class='privateInformation'>
                    <p>
                        Address: %s
                    </p>
                </div>
                <div class='privateInformation'>
                    <p>
                        Phone number: %s
                    </p>
                </div>
                <div class='privateInformation'>
                    <p>
                        Age: %s
                    </p>
                </div>
                <div class='privateInformation'>
                    <p>
                        Salary: %s
                    </p>
                </div>
                <div class='privateInformation'>
                    <p>
                        Position: %s
                    </p>
                </div>
                <div class='privateInformation'>
                    <p>
                        Password: %s
                    </p>
                </div>
", $erregistroa["employee_id"], $erregistroa["name"], $erregistroa["surname"], $erregistroa["adress"], $erregistroa["phone_number"], $erregistroa["age"], $erregistroa["salary"], $erregistroa["position"], $erregistroa["password"]);

                } else {
                    $erregistroa = mysqli_query($link,"select * from client where client_id = $userID");
                    $erregistroa = mysqli_fetch_array($erregistroa);
                    printf("
                    <div id='userInformation' style='display:block;'>
                    <div class='form-group'>
                    <label>Name:</label>
                    <input type='text' class='form-control' id='izena' placeholder='Name' value='%s' name='name' disabled>
                    </div>
                    <div class='form-group'>
                    <label>Surname:</label>
                    <input type='text' class='form-control' id='izena' placeholder='Name' value='%s' name='surname' disabled>
                    </div>
                    <div class='form-group'>
                    <label>Email address:</label>
                    <input type='text' class='form-control' id='izena' placeholder='Name' value='%s' name='email_address' disabled>
                    </div>
                    <div class='form-group'>
                    <label>Phone number:</label>
                    <input type='number' class='form-control' id='izena' placeholder='Name' value='%d' name='phone_number' disabled>
                    </div>
                    <div class='form-group'>
                    <label>Password:</label>
                    <input type='text' class='form-control' id='izena' placeholder='Name' value='%s' name='password' disabled>
                    </div>
                        <button style='display:block' class='btn btn-warning' type='button' onclick='Form()'>Edit</button>
                    </div>                    
", $erregistroa["name"], $erregistroa["surname"], $erregistroa["email_address"], $erregistroa["phone_number"], $erregistroa["password"]);

printf("
<div id='userInformationForm' style='display:none'>
    <form action='./edit-user.php' method='post'>

    <input style='display:none' type='text' class='form-control' id='izena' placeholder='ID' value='%s' name='client_id' required>

    <div class='form-group'>
    <label>Name:</label>
    <input type='text' class='form-control' id='izena' placeholder='Name' value='%s' name='name' required>
    </div>
    <div class='form-group'>
    <label>Surname:</label>
    <input type='text' class='form-control' id='izena' placeholder='Name' value='%s' name='surname' required>
    </div>
    <div class='form-group'>
    <label>Email address:</label>
    <input type='text' class='form-control' id='izena' placeholder='Name' value='%s' name='email_address' required>
    </div>
    <div class='form-group'>
    <label>Phone number:</label>
    <input type='number' class='form-control' id='izena' placeholder='Name' value='%d' name='phone_number' required>
    </div>
    <div class='form-group'>
    <label>Password:</label>
    <input type='text' class='form-control' id='izena' placeholder='Name' value='%s' name='password' required>
    </div>
    <div style='display:flex'>
    <button class='btn btn-secondary' type='button'  onclick='Info()'>Close</button>
    <button type='submit' style='margin-left:5px;' class='btn btn-success bidali'>Apply changes</button>
    </div>
    </form>
    
    
</div>
",$erregistroa["client_id"], $erregistroa["name"], $erregistroa["surname"], $erregistroa["email_address"], $erregistroa["phone_number"], $erregistroa["password"]);

                }
                ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php
  include("../../../includes/footer/footer.php");
  ?>
</body>