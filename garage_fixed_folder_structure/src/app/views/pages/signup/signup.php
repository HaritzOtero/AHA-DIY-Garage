<!-- Head -->
<?php
$TITLE = "Sign Up";
$CSS_PATH = "./signup.css";
include_once("../../../includes/head/head.php");
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>


<body>
  <!-- Navigation bar -->
  <?php
  session_start();
  include("../../../includes/navigation/navigation-bar.php");
  ?>
  <!-- Authentication -->
  <script>
$(document).ready(function() {
  $("#confirm_password").on('keyup', function() {
    var password = $("#password").val();
    var confirmPassword = $("#confirm_password").val();
    if (password != confirmPassword){
      $("#CheckPasswordMatch").html("Password does not match !").css("color", "red");
      document.querySelector('#signupbutton').disabled = true;
    }
    else{
      $("#CheckPasswordMatch").html("Password match !").css("color", "green");
      document.querySelector('#signupbutton').disabled = false;
    }
  });
});
</script>
  <!-- signup -->
  <div class="signup-box animated fade-in">
    <div class="container">
      <div class="row justify-content-center col-md-12 col-lg-10">
        <div class="wrap">
          <div class="p-4 p-md-5">
            <div class="d-flex flex-wrap">
              <div class="img"></div>
              <!-- Signup form -->
              <form action="../../../authentication/signup.php" method="POST" class="signup-form">
                <h3 class="mb-4">Sign Up</h3>
                <!-- Name -->
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                  <p class="namevalid text-danger">Please fill your name in</p>
                </div>

                <!-- Last name -->
                <div class="form-group">
                  <label for="surname">Last Name</label>
                  <input type="text" class="form-control" name="surname" id="surname" placeholder="Last Name">
                  <p class="lastNameValid text-danger">Please fill your last name in</p>
                </div>

                <!-- E-Mail -->
                <div class="form-group">
                  <label for="email">E-Mail</label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="E-Mail">
                  <p class="emailvalid text-danger">Please fill your e-mail in</p>
                </div>

                <!-- Phone -->
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                  <p class="phonevalid text-danger">Please fill your phone number in</p>
                </div>

                <!-- Password -->
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" required class="form-control" name="password" id="password" placeholder="Enter a password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                  <p class="passwordvalid text-danger">Please fill your password in</p>
                </div>

                <!-- Password -->
                <div class="form-group">
                  <label for="conpassword">Confirm password</label>
                  <input type="password" required class="form-control" id="confirm_password" placeholder="Enter a Confirm Password">
                  <p class="conpasswordvalid text-danger">Please repeat your password</p>
                </div>

                <!-- Submit button -->
                <div class="form-group">

                <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>

                <button type="submit" class="btn btn-success bidali" id="signupbutton" disabled>Create account</button>
                </div>
              </form>
              <div style="padding-left:500px">

              
              <?php
              if (isset($_GET["erregistratu"])) {
                if ($_GET["erregistratu"] == "ez") {
              ?>
                  <p style="color:#F00">
                    <b>The email already exist! Try another one</b>
                  </p>
              <?php
                }
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