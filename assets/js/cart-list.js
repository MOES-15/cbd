var discount = 0;
var num = 0;
let finalCart = JSON.parse(localStorage.getItem("cart"));
    let results = finalCart.map(function(finalCart) {
        num = finalCart[0].cart_cant;
        return `
        <span class="row col-sm-11 w-11/12 d-flex justify-content-center rounded-3 my-1 shadow-lg py-3 mx-0 bg-white-b" item="${finalCart[0].id}">
        <div class="col-sm-6 col-md-2 flex justify-center items-center">
            <div class="flex justify-center my-4">
                <img src="assets/media/img/${finalCart[0].imagen}" alt="" class="w-50 rounded-3">
            </div>
        </div>
        <div class="col-sm-6 col-md-4 flex items-center justify-center">
            <a class="text-base text-black md:text-start text-center" href="product?u_ref=${finalCart[0].id}">${finalCart[0].name}</a>
        </div>
        <div class="col-sm-6 col-md-3 flex items-center justify-center px-0 my-3">
            <div class="grid grid-cols-3 d-flex align-items-center justify-content-center px-0">
                <div class="col-span-1 d-flex justify-content-center px-0">
                    <button class="btn fs-5 text-dark" delete-cart="${finalCart[0].id}">-</button>
                </div>
                <div class="col-span-1 w-1/4 d-flex justify-content-center">
                    <input type="text" class="form-control bg-transparent border text-center border-dark text-dark text-sm" disabled space="cant-${finalCart[0].id}" placeholder="${finalCart[0].cart_cant}" value="${finalCart[0].cart_cant}">
                </div>
                <div class="col-span-1 d-flex justify-content-center px-0">
                    <button class="btn fs-5 text-dark" plus-cart="${finalCart[0].id}">+</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2 fs-4 d-flex align-items-center justify-content-center" space="total-${finalCart[0].id}">
            $ ${number_format((finalCart[0].price)*(finalCart[0].cart_cant), 2)}
        </div>
        <div class="col-sm-6 col-md-1 flex items-center justify-center">
            <button class="btn fs-4 fw-bold" remove-item="${finalCart[0].id}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000" class="bi bi-x" viewBox="0 0 16 16">
                  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
        </div>
        </span>`;
    })
if (results.length != 0 && finalCart != null) {
    $('[space="btn-pay"]').removeClass('d-none');
    $('#list-products').html(results);
    $('[space="null"]').removeClass('d-none');
} else {
    $('[space="null"]').addClass('d-none');
    localStorage.setItem('discount', 0);
    localStorage.setItem('name-coupon', '');
    document.getElementById('list-products').innerHTML = '<div class="py-3 text-center">No tienes ningun producto agregado</div>';
}
if(num == 0){
    $('[space="paint-total"]').html(paintTotal(finalCart))
        $('#name-coupon').addClass('d-none')
        localStorage.setItem('discount', 0);
        localStorage.setItem('name-coupon', '');
}
$('[space="paint-total"]').html(paintTotal(finalCart, localStorage.getItem("discount")))
console.log(localStorage.getItem("discount"))
if(localStorage.getItem("discount") != 0){
    $('#name-coupon').removeClass('d-none').html(localStorage.getItem("name-coupon"))
    $('#space-coupon').remove();
}
function addProduct(id){
    var num_product;
    cart = JSON.parse(localStorage.getItem('cart'));
    stock = JSON.parse(localStorage.getItem('stock'));
    if (cart.length === 0) {
        // el carro estaba vacio
        let result = stock.filter((item) => {
            return id === item[0].id;
        })
        result[0][0].cant = result[0][0].cant - 1;
        localStorage.setItem("cart", JSON.stringify(result))
        addCart()
    } else {
        let chkCart = cart.some((item) => {
            return id === item[0].id;
        })
        if (chkCart) {
            // ya estaba en el carro de compra
            let result = cart.filter((item) => {
                return id === item[0].id;
            })
            if(result[0][0].cant > 0){
                result[0][0].cant = result[0][0].cant - 1;
                if(result[0][0].cant >= 0){
                    result[0][0].cart_cant = parseInt(result[0][0].cart_cant) + 1;
                    num_product = result[0][0].cart_cant;
                }
            }else{
                num_product = result[0][0].cart_cant;
            }
            localStorage.setItem('cart', JSON.stringify(cart));
            $('[space="cant-'+id+'"').val(num_product);
            $('[space="total-'+id+'"]').html('$ ' + number_format(parseInt(num_product) * parseInt(result[0][0].price), 2));
            finalCart = JSON.parse(localStorage.getItem("cart"));
            $('[space="paint-total"]').html(paintTotal(finalCart, localStorage.getItem("discount")));
                addCart()

        } else {
            // no estaba en el carro de compra
            let result = stock.filter((item) => {
                return id === item[0].id;
            })
            if(result[0][0].cant > 0){
                result[0][0].cant = result[0][0].cant - 1;
                if(result[0][0].cant >= 0){
                    result[0][0].cart_cant = parseInt(result[0][0].cart_cant) + 1;
                    num_product = result[0][0].cart_cant;
                }
                cart.push(result[0]);
            }else{
                num_product = result[0][0].cart_cant;
            }
            localStorage.setItem("cart", JSON.stringify(cart))
            addCart()
            $('[space="cant-'+id+'"').val(num_product);
            $('[space="total-'+id+'"]').html('$ ' + number_format(parseInt(num_product) * parseInt(result[0][0].price), 2));
            finalCart = JSON.parse(localStorage.getItem("cart"));
            $('[space="paint-total"]').html(paintTotal(finalCart, localStorage.getItem("discount")));

        }

    }
}
function removeProduct(id){
    var num_product;
    cart = JSON.parse(localStorage.getItem('cart'));
    stock = JSON.parse(localStorage.getItem('stock'));
    if (cart.length === 0) {
        // el carro estaba vacio
        let result = stock.filter((item) => {
            return id === item[0].id;
        })
        result[0][0].cant = result[0][0].cant + 1;
        localStorage.setItem("cart", JSON.stringify(result))
        //removeCart()
    } else {
        let chkCart = cart.some((item) => {
            return id === item[0].id;
        })
        if (chkCart) {
            // ya estaba en el carro de compra
            let result = cart.filter((item) => {
                return id === item[0].id;
            })
            if(result[0][0].cart_cant >= 0){
                if(result[0][0].cart_cant >= 1){
                    result[0][0].cant = result[0][0].cant + 1;
                    result[0][0].cart_cant = parseInt(result[0][0].cart_cant) - 1;
                    num_product = result[0][0].cart_cant;
                }else{
                    result[0][0].cant = result[0][0].cant;
                    result[0][0].cart_cant = parseInt(result[0][0].cart_cant);
                    num_product = result[0][0].cart_cant;
                }

            }else{
                num_product = result[0][0].cart_cant;
            }
            localStorage.setItem('cart', JSON.stringify(cart));
            $('[space="cant-'+id+'"').val(num_product);
            $('[space="total-'+id+'"]').html('$ ' + number_format(parseInt(num_product) * parseInt(result[0][0].price), 2));
            if(num_product == 0){
                let index = cart.findIndex(index => index[0].id === id);
                if (index >= 0) {
                    cart.splice(index, 1)
                }
                $('[item="'+id+'"]').remove()
                localStorage.setItem('cart', JSON.stringify(cart));
                addCart()
                finalCart = JSON.parse(localStorage.getItem("cart"));
                console.log(finalCart.length)
                if (finalCart.length == 0) {
                    $('[space="null"]').addClass('d-none');
                    $('[space="btn-pay"]').addClass('d-none');
                    $('#list-products').html('<div class="py-3 text-center">No tienes ningun producto agregado</div>');
                    $('[space="paint-total"]').html(paintTotal(finalCart))
                    $('#name-coupon').addClass('d-none')
                    localStorage.setItem('discount', 0);
                    localStorage.setItem('name-coupon', '');
                }else{
                    $('[space="paint-total"]').html(paintTotal(finalCart, localStorage.getItem("discount")));
                }
            }else{
                finalCart = JSON.parse(localStorage.getItem("cart"));
                $('[space="paint-total"]').html(paintTotal(finalCart, localStorage.getItem("discount")));
            }
        }

    }
}
$('[action="checkout"]').on('click', function(){
    products = JSON.parse(localStorage.getItem("cart"));
    if(products.length != 0){
       /*  $.post('posts/saveData.php', {products}, function(e) {
            const mp = new MercadoPago("TEST-edefb521-59be-44a5-8879-60dcb6f55665", {
                locale: "es-MX",
              });
              mp.checkout({
                preference: {
                  id: e,
                },
                theme: {
                    elementsColor: '#81ecec',
                    headerColor: '#c0392b'
                },
                autoOpen: true,
              });
            }) */
            window.location.href = 'checkout'
    }
})
$('[plus-cart]').on('click', function(){
    var id = $(this).attr('plus-cart');
    addProduct(id)
})
$('[delete-cart]').on('click', function(){
    var id = $(this).attr('delete-cart');
    removeProduct(id)
})
$('[remove-item]').on('click', function(){
    var id = $(this).attr('remove-item');
    console.log(id)
    let cart = JSON.parse(localStorage.getItem("cart"));
    let index = cart.findIndex(index => index[0].id === id);
    if (index >= 0) {
        cart.splice(index, 1)
    }
    $('[item="'+id+'"]').remove()
    localStorage.setItem('cart', JSON.stringify(cart));
    addCart()
    finalCart = JSON.parse(localStorage.getItem("cart"));
    if (finalCart.length == 0) {
        $('[space="null"]').addClass('d-none');
        $('[space="btn-pay"]').addClass('d-none');
        $('#list-products').html('<div class="py-3 text-center">No tienes ningun producto agregado</div>');
        $('[space="paint-total"]').html(paintTotal(finalCart))
        $('#name-coupon').addClass('d-none')
        localStorage.setItem('discount', 0);
        localStorage.setItem('name-coupon', '');
    }else{
        $('[space="paint-total"]').html(paintTotal(finalCart, localStorage.getItem("discount")));
    }
})

$('[action="coupon"]').click(function () {
    var coupon = $('#coupon').val();
    var products = JSON.parse(localStorage.getItem("cart"));
    $.post('posts/coupon.php', {coupon, products}, function (d) {
        console.log(d)
        discount = parseInt(d);
        if(discount != 0){
            localStorage.setItem('discount', discount);
            localStorage.setItem('name-coupon', coupon);
            $('#space-coupon').remove();
            $('#name-coupon').removeClass('d-none').html(coupon)
            $('[space="paint-total"]').html(paintTotal(finalCart, discount));
        }else{
            localStorage.setItem('discount', 0);
            localStorage.setItem('name-coupon', '');
        }
    })
})