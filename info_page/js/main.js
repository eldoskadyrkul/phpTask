$(document).ready(function () {
    $("#login").blur(function() {
        var name = $(this).val();
        if (name == '') {
            $('#errors').text('Заполните имя');
            $('#errors').css('display', 'block');
        } else {
            $.ajax({
                type: "POST",
                url: "admin.php",
                data: {funct: 'name', name: name},
                success: function(data) {
                    if (data == 1) {
                        $('#errors').text('Такого пользователя нет');
                        $('#errors').css('display', 'block');
                    } else {
                        $('#errors').css('display', 'none');}
                    }
                });
        }
    });
    $("#pass").blur(function() {
        var pass = $(this).val();
        var name = $("#name").val();
        if (pass == '' || name=='') {
            $('#errors').text('Заполните все поля');
            $('#errors').css('display', 'block');
        } else {
            $.ajax({
                type: "POST",
                url: "user.php",
                data: {funct: 'pass', pass: pass, name: name},
                    success: function(data) {if (data == 1) {
                        $('#errors').text('Некоректная пара логин пароль');
                        $('#errors').css('display', 'block');
                    } else {
                        $('#errors').css('display', 'none');
                        $("#submit").attr('disabled', '');
                    }}
            });
        }
    });
});