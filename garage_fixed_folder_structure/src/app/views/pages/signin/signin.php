<!-- Head -->
<?php
$TITLE = "Sign In";
$CSS_PATH = "./signin.css";
include_once("../../../includes/head/head.php");
?>

<body>
  <!-- Navigation bar -->
  <?php
  session_start();
  include("../../../includes/navigation/navigation-bar.php");
  ?>
  <!-- Authentication -->

  <!-- Login -->
  <div class="login-box animated fade-in">
    <div class="container">
      <div class="row justify-content-center col-md-12 col-lg-10">
        <div class="wrap">
          <div class="p-4 p-md-5">
            <div class="d-flex flex-wrap">
              <div class="img"></div>
              <!-- Login form -->
              <form action="../../../authentication/signin.php" method="POST" class="login-form">
                <h3 class="mb-4">Sign In</h3>
                <!-- E-Mail -->
                <div class="form-group">
                  <label for="email">E-Mail</label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="E-Mail">
                  <p class="emailvalid text-danger">Please fill your e-mail in</p>
                </div>
                <!-- Password -->
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  <p class="passwordvalid text-danger">Please fill your password in</p>
                </div>

                <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                    Sign In
                  </button>
                </div>
              </form>
              

            </div>
            <div style="display:flex;flex-direction:column; ">
            <div>

            
            <?php
              if (isset($_GET["okerra"])) {
                if ($_GET["okerra"] == "bai") {
              ?>

                  <p style="color:#F00; float:right;">
                    <b>Incorrect email or password</b>
                  </p>
              <?php
                }
              }
              ?>
              </div>
              <div >

              
            <a href="../signup/signup.php"><p style="float:right">Or create an account</p></a>
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

</html>