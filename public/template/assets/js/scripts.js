$(function () {
    if (window.location.hash && window.location.hash == '#_=_') {
        if (window.history && history.pushState) {
            window.history.pushState("", document.title, window.location.pathname);
        } else {
            // Prevent scrolling by storing the page's current scroll offset
            var scroll = {
                top: document.body.scrollTop,
                left: document.body.scrollLeft
            };
            window.location.hash = '';
            // Restore the scroll offset, should be flicker free
            document.body.scrollTop = scroll.top;
            document.body.scrollLeft = scroll.left;
        }
    }

    $('form[name="faleconosco"]').submit(function (e) {
        e.preventDefault();

        const form = $(this);
        const action = form.attr('action')
        const name = form.find('input[name="name"]').val();
        const email = form.find('input[name="email"]').val();
        const mensagem = form.find('textarea[name="mensagem"]').val();

        $.post(action, {
            email: email,
            password: password
        }, function (response) {
            if (response.message) {
                ajaxMessage(response.message, 3);
            }
            if (response.redirect) {
                window.location.href = response.redirect;
            }

        }, 'json');
    });


});

Storage.prototype.setObj = function (key, obj) {
    return this.setItem(key, JSON.stringify(obj))
}
Storage.prototype.getObj = function (key) {
    return JSON.parse(this.getItem(key))
}



var app = (function () {

    function message(titulo, mensagem, tipo, time) {

        $.toast({
            heading: titulo,
            text: mensagem,
            loader: true,
            icon: tipo,
            hideAfter: time,
            position: 'top-center',
        });
    }

    function SoundOn() {
        sessionStorage.setObj("sound", true);
    }

    function SoundOff() {
        sessionStorage.setObj("sound", false);
    }

    function ThemeDarkOn() {
        sessionStorage.setObj("dark", true);

        $("body").attr('data-leftbar-theme', 'dark');
        $("#light-style").attr('disabled', 'disabled');
        $("#dark-style").removeAttr('disabled');
    }

    function ThemeDarkOff() {
        sessionStorage.setObj("dark", false);

        $("body").attr('data-leftbar-theme', 'light');
        $("#dark-style").attr('disabled', 'disabled');
        $("#light-style").removeAttr('disabled');
    }

    function LoadSound() {

        var sound = sessionStorage.getObj("sound");

        if (sound == null) {
            SoundOn();
            $("#sound").attr('checked', true);
        }
        else if (sound == true) {
            $("#sound").attr('checked', true);
        } else {
            $("#sound").prop('checked', false);
        }
    }

    function LoadThemeDark() {

        var theme = sessionStorage.getObj("dark");

        if (theme == null) {
            ThemeDarkOff();
            $("#theme").attr('checked', true);
        }
        else if (theme == true) {
            ThemeDarkOn();
            $("#theme").attr('checked', true);
        } else {
            ThemeDarkOff();
            $("#theme").prop('checked', false);
        }
    }

    function MenuAjuda()
    {
        // valor disabled
        var menu_Ajuda = sessionStorage.getObj("menu_ajuda");

        if(menu_Ajuda == null) {
            $("#modal_ajuda").modal("show");
        } else {
        }
    }

    function DisabledAjuda() 
    {
        sessionStorage.setObj("menu_ajuda", false);
        $("#top-modal").modal("hide");
    }


    function init() {

    }

    return {
        init: init,
        message: message,
        SoundOn: SoundOn,
        SoundOff: SoundOff,
        LoadSound: LoadSound,
        ThemeDarkOn: ThemeDarkOn,
        ThemeDarkOff: ThemeDarkOff,
        LoadThemeDark: LoadThemeDark,
        MenuAjuda: MenuAjuda,
        DisabledAjuda: DisabledAjuda,
    };
}());

