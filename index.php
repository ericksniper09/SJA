<?php
include_once "coreServices/entity/class_user.php";
#Session Management 
#Timestamp->30 minutes
if (isset($_SESSION['logged_user'])) {
    $date = date_create();
    $timestamp = date_timestamp_get($date);

    if ($timestamp - $_SESSION['logged_user']->timestamp > 3600) {
        $user = new User();
        if ($user->logout()) {
            header("location: /"); #Login Page!
        } else {
            $_SESSION['logged_user']->renewTimestamp();
        }
    } else {
        header("location: content/homepage.php"); #go to Homepage! 
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login Page">
    <meta name="author" content="Eric Defoix">

    <title>Bolt Manager - St John Ambulance</title>

    <link rel="stylesheet" href="https://olivierdefoix.ddns.net/myVendorApps/bootstrap/bootstrap-core-4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://olivierdefoix.ddns.net/myVendorApps/font-awesome/font-awesome-pro-5.11.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://olivierdefoix.ddns.net/myVendorApps/fonts/googleFont/googleFonts.css">
    <link rel="stylesheet" type="text/css" href="https://olivierdefoix.ddns.net/myVendorApps/just-add-water/animate.css">
    <link rel="stylesheet" type="text/css" href="https://olivierdefoix.ddns.net/myVendorApps/DefoixTrademark/css/logo.css">

    <link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>

<body class="container">
    <!-- Social Medias -->
    <div class="instagram animated jackInTheBox">
        <a class="social-fb pb-1 pt-1 pl-2 pr-2 ml-0 btn btn-primary animated flip" style="font-family: HelveticaNeue; background-color: #3b5999; border-color: #3b5999; margin-top: 10%; margin-left: 10%; color: white" href='https://www.facebook.com/stjohnmauritius/' target="_blank"><i class="pr-1 fab fa-facebook"></i>St John Ambulance</a>
    </div>
    <div class="card text-white bg-dark loginCard animated flipInY">
        <h5 class="card-header" style="font-size: 32px"><img src="resources/The-Amalfi-Cross.jpg" alt="Amalfi Cross" class="rounded-circle logo-small animated rollIn" width="40"><i class="fas fa-sign-in-alt"></i>&nbsp;Sign In</h5>
        <div class="card-body">
            <form method="POST" action=""> <!-- coreServices/domain/controller.php?f=login -->
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" name="username" aria-label="Username" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" minlength="7" name="password" aria-label="Password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary">Login&nbsp;<i class="fas fa-arrow-alt-circle-right ml-0"></i></button>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="check" id="checkRem">
                    <label class="form-check-label" for="checkRem">Remember Me!</label>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <small id="emailHelp" class="form-text text-muted">We'll never share your credentials with anyone else.</small>
        </div>
    </div>
    <!-- TradeMark -->
    <div id="logo-dropup" class="animated rollIn" style="right: 0.5rem; bottom: 0rem; position:fixed; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px"></div>
</body>

<footer>
    <script src="https://olivierdefoix.ddns.net/myVendorApps/jquery/jquery-core/jquery.js"></script>
    <script src="https://olivierdefoix.ddns.net/myVendorApps/jquery/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://olivierdefoix.ddns.net/myVendorApps/bootstrap/bootstrap-core-4.1.3/js/popper.js"></script>
    <script src="https://olivierdefoix.ddns.net/myVendorApps/bootstrap/bootstrap-core-4.1.3/js/bootstrap.js"></script>
    <script src="https://olivierdefoix.ddns.net/myVendorApps/bootstrap/bootstrap-core-4.1.3/js/bootstrap.bundle.js"></script>
    <script src="https://olivierdefoix.ddns.net/myVendorApps/password-validator/zxcvbn.js"></script>
    <script src="https://olivierdefoix.ddns.net/myVendorApps/bootstrap/notify-3.1.5/bootstrap-notify.js"></script>
    <script src="https://olivierdefoix.ddns.net/myVendorApps/font-awesome/font-awesome-pro-5.11.1/js/all.js"></script>
    <script src="https://olivierdefoix.ddns.net/myVendorApps/DefoixTrademark/js/logo.js"></script>
    <script src="js/index.js"></script>
</footer>

</html>