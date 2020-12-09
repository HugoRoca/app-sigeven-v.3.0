$('#btnLogin').on('click', function (e) {
    e.preventDefault();
    txtUserName = $('#txtUserName').val();
    txtPassword = $('#txtPassword').val();

    console.log(txtUserName, txtPassword);

    // $.post('../ajax/usuario.php?op=verificar', {
    //     'logina': logina,
    //     'clavea': clavea
    // }, function (data) {
    //     if (data != 'null') {
    //         $(location).attr('href', 'escritorio.php');
    //     } else {
        $('.alert').alert()
             
    //     }
    // });
});