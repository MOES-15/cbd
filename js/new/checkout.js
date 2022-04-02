let checkout = JSON.parse(localStorage.getItem("cart"));
if (checkout != null) {
    $('[space="paint-total"]').html(paintTotal(checkout))
} else {
    window.location.href = "cart"
}
/* const mp = new MercadoPago("TEST-edefb521-59be-44a5-8879-60dcb6f55665", {
    locale: "es-MX",
  });
  // Inicializa el checkout
  mp.checkout({
    preference: {
      id: '730391541-86f9d42c-5b36-4373-a918-ffa397c517c3'                  ,
    },
    autoOpen: true
  }); */
var click = false;
$('#save').click(function(e){
    e.preventDefault();
    if(validateData() == true){
        var name = $('#name').val();
        var last_name = $('#last_name').val();
        var tel = $('#tel').val();
        var email = $('#email').val();
        var street = $('#street').val();
        var suburb = $('#suburb').val();
        var munici = $('#municipality').val();
        var estate = $('#estate').val();
        var cp = $('#cp').val();
        var ext = $('#ext').val();
        var int = $('#int').val();
        $.post('posts/saveData.php', {name, last_name, tel, email, street, suburb, munici, estate, cp, ext, int, checkout}, function(e) {
            console.log(e)
            window.location.href = e;
        })
    }else{
        $(this).removeClass('shadow')
        click = true;
    }
})
$('form').keyup(function(){
    if(click == true){
        if(validateData() == true){
            $('#save').addClass('shadow')
        }else{
            $('#save').removeClass('shadow')
        }
    }
})
function validateData() {
    var validate_cp = false;
    var validate_email = false;
    var validate_name = false;
    var validate_cp = false;
    var validate_tel = false;
    var validate_street = false;
    var validate_municipality = false;
    var validate_suburb = false;
    var validate_state = false;
    var validate_ne = false;
    var validate_ni = true;
    var format_text = /^([a-zA-Z0-9.À-ÿ\u00f1\u00d1 ])+$/;
    var format_email = /^([a-zA-Z0-9À-ÿ\u00f1\u00d1_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var format_tel = /^([0-9]{10,11})+$/;
    var format_cp = /^([0-9]{4,5})+$/;
    var format_num = /^([0-9]{1,20})+$/;
    var name = $('#name').val();
    var last_name = $('#last_name').val();
    var tel = $('#tel').val();
    var email = $('#email').val();
    var street = $('#street').val();
    var suburb = $('#suburb').val();
    var munici = $('#municipality').val();
    var estate = $('#estate').val();
    var cp = $('#cp').val();
    var ext = $('#ext').val();
    var int = $('#int').val();
    if (name != '' && format_text.test(name)) {
        $('#name').removeClass('invalid');
        validate_name = true;
    } else {
        $('#name').addClass('invalid');
        validate_name = false;
    }
    if (last_name != '' && format_text.test(last_name)) {
        $('#last_name').removeClass('invalid');
        validate_name = true;
    } else {
        $('#last_name').addClass('invalid');
        validate_name = false;
    }
    if (tel != '' && format_tel.test(tel)) {
        $('#tel').removeClass('invalid');
        validate_tel = true;
    } else {
        $('#tel').addClass('invalid');
        validate_tel = false;
    }
    if (street != '' && format_text.test(street)) {
        $('#street').removeClass('invalid');
        validate_street = true;
    } else {
        $('#street').addClass('invalid');
        validate_street = false;
    }
    if (munici != '' && format_text.test(munici)) {
        $('#municipality').removeClass('invalid');
        validate_municipality = true;
    } else {
        $('#municipality').addClass('invalid');
        validate_municipality = false;
    }
    if (estate != '' && format_text.test(estate)) {
        $('#estate').removeClass('invalid');
        validate_state = true;
    } else {
        $('#estate').addClass('invalid');
        validate_state = false;
    }
    if (ext != '' && format_num.test(ext)) {
        $('#ext').removeClass('invalid');
        validate_ne = true;
    } else {
        $('#ext').addClass('invalid');
        validate_ne = false;
    }
    if(int != ''){
        if (format_num.test(int)) {
            $('#int').removeClass('invalid');
            validate_ni = true;
        } else {
            $('#int').addClass('invalid');
            validate_ni = false;
        }
    }else{
        $('#int').removeClass('invalid');
        validate_ni = true;
    }
    if (suburb != '' && format_text.test(suburb)) {
        $('#suburb').removeClass('invalid');
        validate_suburb = true;
    } else {
        $('#suburb').addClass('invalid');
        validate_suburb = false;
    }
    if (cp != '' && format_cp.test(cp) && (cp.length == 5 || cp.length == 4)) {
        validate_cp = true;
        $('#cp').removeClass('invalid');
    } else {
        validate_cp = false;
        $('#cp').addClass('invalid');
    }
    if (!format_email.test(email) || email == '') {
        $('#email').addClass('invalid');
        validate_email = false;
    } else {
        $('#email').removeClass('invalid');
        validate_email = true;
    }
    if (validate_name == true && validate_tel == true && validate_email == true && validate_street == true && validate_municipality == true && validate_state == true && validate_cp == true && validate_ne == true && validate_suburb == true && validate_ni == true) {
        return true;
    } else {
        return false;
    }
}