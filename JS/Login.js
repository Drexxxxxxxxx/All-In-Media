function RecoverPassword() {
    $.post('../PHP/Handlers/LoginHandler.php?action=RecoverPassword&email=' + $('#SearchInputID').val(), function (response) {
        $('#responseid').html(response);
    });
}
