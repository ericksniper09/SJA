<?php
require_once "../includes/component.php";
require_once "../includes/class_user.php";

#Session Management 
#Timestamp->30 minutes
if (isset($_SESSION['logged_user'])) {
  $date = date_create();
  $timestamp = date_timestamp_get($date);

  if ($timestamp - $_SESSION['logged_user']->timestamp > 3600) {
    $user = new User();
    if ($user->logout()) {
      header("location: ../"); #Login Page!
    } else {
      $_SESSION['logged_user']->renewTimestamp();
    }
  }
} else {
  header("location: ../"); #Login Page!
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
  add_head("Dashboard");
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../"><img src="../resources/The-Amalfi-Cross.jpg" alt="Amalfi Cross" class="rounded-circle head-logo">St John Ambulance</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="sideNavAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="#">
            <i class="fas fa-home"></i></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <!--Database Collapse-->
        <li class="nav-item" data-toggle="#" data-placement="right" title="Database">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseDatabase" data-parent="#sideNavAccordion">
            <i class="fas fa-database"></i>
            <span class="nav-link-text">&nbsp;Database</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseDatabase">
            <li>
              <a href="#"><i class="fas fa-table"></i>&nbsp;Division Table</a>
            </li>
            <li>
              <a href="#"><i class="fas fa-table"></i>&nbsp;Member Table</a>
            </li>
            <li>
              <a href="#"><i class="fas fa-table"></i>&nbsp;Subscription Table</a>
            </li>
            <li>
              <a href="#"><i class="fas fa-table"></i>&nbsp;Duty Table</a>
            </li>
          </ul>
        </li>
        <!--Administration Collapse-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Administration">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAdministration" data-parent="#sideNavAccordion">
            <i class="fab fa-superpowers"></i>
            <span class="nav-link-text">Administration</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseAdministration">
            <li>
              <a href="#"><i class="fas fa-plus-circle"></i>&nbsp;New Division</a>
            </li>
            <li>
              <a href="#"><i class="fas fa-plus-circle"></i>&nbsp;New Member</a>
            </li>
            <li>
              <a href="#"><i class="fas fa-plus-circle"></i>&nbsp;New Subscription</a>
            </li>
            <li>
              <a href="#"><i class="fas fa-plus-circle"></i>&nbsp;New Duty</a>
            </li>
          </ul>
        </li>
        <!--Request Collapse-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Request">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseRequest" data-parent="#sideNavAccordion">
            <i class="fas fa-handshake"></i>
            <span class="nav-link-text">Request</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseRequest">
            <li>
              <a href="#"><i class="fas fa-star-of-life"></i>&nbsp;Duty Request</a>
            </li>
          </ul>
        </li>
        <!-- Links -->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="https://www.facebook.com/stjohnmauritius/" target="_blank">
            <i class="fab fa-facebook-f"></i>
            <span class="nav-link-text">&nbsp;St John Mauritius</span>
          </a>
        </li>
      </ul>
      <!--Side Nav Bar-->
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <!--Log out Button-->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--Body-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1>Blank</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
        </div>
      </div>
    </div>
    <?php
      add_footer("Dashboard");
    ?>
  </div>
</body>

</html>