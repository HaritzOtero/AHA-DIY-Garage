<!-- Head -->
<?php
$TITLE = "Contact";
$CSS_PATH = "./contact.css";
include_once("../../../includes/head/head.php");
?>

<body>
  <!-- Navigation bar -->
  <?php
  session_start();
  include("../../../includes/navigation/navigation-bar.php");
  ?>

  <!-- Banner -->
  <div class="banner">
    <h1 class="p-2 display-1 text-light">Contact</h1>
  </div>

  <!-- Contact -->
  <div class="contact-box animated fade-in">
    <div class="container">
      <div class="row justify-content-center col-md-12 col-lg-10">
        <div class="wrap">
          <div class="p-4 p-md-5">
            <div class="d-flex flex-wrap">
              <div class="img"></div>
              <!-- contact form -->
              <form action="./contact-message.php" method="POST" class="contact-form">
                <h3 class="mb-4">Contact Us!</h3>
                <!-- Name -->
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>

                <!-- E-Mail -->
                <div class="form-group">
                  <label for="email">E-Mail</label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="E-Mail">
                </div>

                <!-- Phone -->
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                  <p class="phonevalid text-danger">Please fill your phone number in</p>
                </div>

                <!-- Message -->
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea class="form-control" name="comment" id="message" rows="5" maxlength="500" placeholder="Enter your message"></textarea>
                </div>

                <!-- Submit button -->
                <div class="form-group">
                  <button type="submit" id="submitbtn" class="form-control btn btn-primary rounded submit px-3">
                    Send message
                  </button>
                </div>
              </form>
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