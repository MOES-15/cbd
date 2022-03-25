var validate_password = false;
var validate_email = false;
var p = '';
var e = '';
var format_email = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
function t(this_){
    p = $(this_).val().length;
    if(p == 0 || p < 6) {
        validate_password = false;
        $(this_).addClass('invalid');
    }else{
        validate_password = true;
        $(this_).removeClass('invalid');
    }
}
function s(this_){
    e = $(this_).val();
    if (!format_email.test(e)) {
        $(this_).addClass('invalid');
        validate_email = false;
    } else {
        $(this_).removeClass('invalid');
        validate_email = true;
    }
}
$('[name="email"]').on('keyup', function(){
    s(this);
})
$('[name="password"]').on('change', function(){
    t(this);
})
$('[name="password"]').on('keyup', function(){
    p = $(this).val().length;
    if(p == 0 || p < 6) {
        validate_password = false;
    }else{
        validate_password = true;
        $(this).removeClass('invalid');
    }
})

$('[action="login"]').on('click', function(){
    if(validate_password == true && validate_email == true){
        $.post('post/login.php', {p, e}, function(e){
            $('[space="alert-session"]').addClass('d-none');
            if(e != 'null_e'){
                if(e != 'null_p'){
                    if(e == 'true'){
                        window.location.href = "orders";
                    }else{
                        location.reload();
                        //inicio de sesion icorrecto
                    }
                }else{
                    $('[space="alert-session"]').removeClass('d-none');
                    $('[space="text-alert"]').html('Contraseña incorrecta');
                    //contraseña incorrecta
                }
            }else{
                $('[space="alert-session"]').removeClass('d-none');
                $('[space="text-alert"]').html('El correo no existe o es incorrecto');
                //correo incorrecto
            }
        })
    }else{
        t('[name="password"]');
        s('[name="email"]');
    }
})