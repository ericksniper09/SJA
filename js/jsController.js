$(function () {

});

function logout() {
    $.get("../includes/controller.php?f=logout", function (response) {
        if (response) {
            setTimeout('window.location.href = "../"', 500);
        }
    });
}