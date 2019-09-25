<?php



# Footer Component
function add_footer($page_name) {
    echo '<!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
            <small><a class="text-dark" href="https://www.facebook.com/olivier.2foix" target="_blank"><img
                    src="../resources/logoSquare.png" class="img-thumbnail">&nbsp;Powered by
                <strong>Defoix</strong>&trade;</a></small>
            </div>
        </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" onclick="logout();">Logout</a>
            </div>
            </div>
        </div>
        </div>
        <script src="https://olivierdefoix.ddns.net/myVendorApps/jquery/jquery-core/jquery.js"></script>
        <script src="https://olivierdefoix.ddns.net/myVendorApps/bootstrap/bootstrap-core-4.1.3/js/bootstrap.bundle.js"></script>
        <script src="https://olivierdefoix.ddns.net/myVendorApps/jquery/jquery-easing/jquery.easing.min.js"></script>
        <script src="https://olivierdefoix.ddns.net/myVendorApps/bootstrap/datatables-1.10/js/jquery.dataTables.js"></script>
        <script src="https://olivierdefoix.ddns.net/myVendorApps/bootstrap/datatables-1.10/js/datatables.js"></script>
        <script src="https://olivierdefoix.ddns.net/myVendorApps/bootstrap/bootstrap-core-4.1.3/js/popper.js"></script>
        <script src="https://olivierdefoix.ddns.net/myVendorApps/bootstrap/bootstrap-core-4.1.3/js/bootstrap.js"></script>
        <script src="https://olivierdefoix.ddns.net/myVendorApps/bootstrap/notify-3.1.5/bootstrap-notify.js"></script>
        <script src="https://olivierdefoix.ddns.net/myVendorApps/DefoixTrademark/js/logo.js"></script>
        <script src="../js/sb-admin.js"></script>
        <script src="../js/jsController.js"></script>';
}

function add_head($page_name) {
    echo '<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Dashboard">
        <meta name="author" content="Eric Defoix">
        <title>Bolt Manager - Dashboard</title>

        <link rel="apple-touch-icon" sizes="57x57" href="../apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="../android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
        <link rel="manifest" href="../manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" href="https://olivierdefoix.ddns.net/myVendorApps/bootstrap/bootstrap-core-4.1.3/css/bootstrap.css">
        <link href="https://olivierdefoix.ddns.net/myVendorApps/font-awesome/font-awesome-5.0.12/css/fontawesome-all.css" rel="stylesheet" type="text/css">
        <link href="https://olivierdefoix.ddns.net/myVendorApps/font-awesome/font-awesome-5.0.12/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://olivierdefoix.ddns.net/myVendorApps/font-awesome/font-awesome-5.8.1/css/all.css">
        <link rel="stylesheet" href="https://olivierdefoix.ddns.net/myVendorApps/font-awesome/font-awesome-5.8.1/css/fontawesome.css">
        <link href="https://olivierdefoix.ddns.net/myVendorApps/bootstrap/datatables-1.10/css/dataTables.bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://olivierdefoix.ddns.net/myVendorApps/just-add-water/animate.css">
        <link rel="stylesheet" type="text/css" href="https://olivierdefoix.ddns.net/myVendorApps/DefoixTrademark/css/logo.css">
        <link href="../css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>';
}