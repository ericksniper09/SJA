$(function () {

});

function logout() {
    $.get("../coreServices/controller.php?f=logout", function (response) {
        if (response) {
            setTimeout('window.location.href = "../"', 500);
        }
    });
}