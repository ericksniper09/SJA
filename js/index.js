var animation = ['bounce', 'flash', 'pulse', 'rubberBand', 'shake', 'swing', 'tada', 'wobble', 'jello'];
var animFb = 'flip';
var $_count = false;

$(function () {
    //Social Media Animation
    setInterval(function () {
        $('.instagram').removeClass('jackInTheBox');
        $('.social-fb').removeClass(animFb);

        animFb = animation[Math.floor(Math.random() * 9)];

        setTimeout(function () {
            $('.instagram').addClass('jackInTheBox');
            $('.social-fb').addClass(animFb);
        }, 1000);
    }, 10000);

    $('.logo-small').hover(function(){
        
        if (!$_count) {
            $_count = true;

            $('.logo-small').removeClass('rollIn').addClass('rollOut');

            setTimeout(function() {
                $('.logo-small').removeClass('rollOut').addClass('rollIn');
                $_count = false;
            }, 1000);

        }
    });

    if (window.location.href.includes('#')) {
        switch (window.location.hash.split('#')[1]) {
            case '0x554E46':
                notifHandler(
                    'fas fa-ban',
                    'Login Failed: Error Code(0x554E46)',
                    'Verify that correct Credential has been Entered!',
                    '',
                    "danger",
                    'style="font-family: HelveticaNeue; font-size: 15px; padding-left: 7px;"'
                );
                break;
            case '0x5750':
                notifHandler(
                    'fas fa-exclamation',
                    'Login Failed: Error Code(0x5750)',
                    'Account Disabled! Contact Administrator.',
                    '',
                    "warning",
                    'style="font-family: HelveticaNeue; font-size: 15px; padding-left: 7px;"'
                );
                break;
        }
    }
})


function notifHandler(nIcon, nTitle, nMessage, nUrl, nType, nCss) {
    $.notify({
        // options
        icon: nIcon,
        title: '<strong>&nbsp;' + nTitle + '</strong>',
        message: '<p class="pl-4">' + nMessage + '</p>',
        url: nUrl,
        target: '_blank'
    }, {
            // settings
            element: 'body',
            position: null,
            type: nType,
            allow_dismiss: true,
            newest_on_top: true,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 4000,
            timer: 1000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated slideInRight',
                exit: 'animated fadeOutUp'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: function () { history.pushState('', '', '/SJA') },
            icon_type: 'class',
            template: '<div data-notify="container"' + nCss + 'class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });
}