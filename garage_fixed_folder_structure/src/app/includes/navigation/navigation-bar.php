<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Navbar logo -->
    <a class="navbar-brand" href="<?php __DIR__ ?>../../../../../">
        <img src="<?php __DIR__ ?>../../../../assets/images/logo/logo.png" alt="logo" style="width:100px">
    </a>

    <!-- Navbar mobile button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- collapse -->
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php __DIR__ ?>../../../../../">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php __DIR__ ?>../../../views/pages/about-us/about-us.php">ABOUT US</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php __DIR__ ?>../../../views/pages/contact/contact.php">CONTACT</a>
            </li>
            <?php
            if (isset($_SESSION['position'])) {
            ?>
                <li class="nav-item" id="loginErabiltzailea">
                    <a class="nav-link" href="<?php __DIR__ ?>../../../views/pages/manage-products/worker-product.php">MANAGE PRODUCTS</a>
                </li>
                <li class="nav-item" id="loginErabiltzailea">
                    <a class="nav-link" href="<?php __DIR__ ?>../../../views/pages/message/message-list.php">MESSAGES</a>
                </li>
                <?php
                if ($_SESSION['position'] == "Boss") {
                ?>
                    <li class="nav-item" id="loginErabiltzailea">
                        <a class="nav-link" href="<?php __DIR__ ?>../../../views/pages/workers/worker-list.php">WORKERS</a>
                    </li>

            <?php
                }
            }
            ?>
        </ul>
        <!-- Logged in -->
        <?php if (isset($_SESSION['name'])) {
            $user = $_SESSION['name']; ?>
            <div class="dropdown nav-item">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    <img src="<?php __DIR__ ?>../../../../assets/images/user/login_icon.png" alt="" class="UserIcon" style="max-width: 50px">
                    <?php echo "$user"; ?>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php __DIR__ ?>../../../views/pages/profile/profile.php">My profile</a>
                    <a class="dropdown-item" href="<?php __DIR__ ?>../../../authentication/logout.php">Log Out</a>
                </div>
            </div>
        <?php } ?>

        <!-- Logged out -->
        <?php if (!isset($_SESSION['name'])) { ?>
            <ul class="list-unstyled navbar-nav d-flex justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="<?php __DIR__ ?>../../../views/pages/signin/signin.php">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php __DIR__ ?>../../../views/pages/signup/signup.php">Sign Up</a>
                </li>
            </ul>
        <?php } ?>
    </div>
</nav>