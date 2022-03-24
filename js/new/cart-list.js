let finalCart = JSON.parse(localStorage.getItem("cart"));
    localStorage.getItem("card");
    let results = finalCart.map(function(finalCart) {
        return `
        <span class="row col-sm-11 d-flex justify-content-center rounded-3 my-1 shadow-lg py-3 mx-0 bg-white-b" item="${finalCart[0].id}">
        <div class="col-sm-6 col-md-2">
            <div class="text-center">
                <img src="img/${finalCart[0].imagen}" alt="" class="w-50 rounded-3">
            </div>
        </div>
        <div class="col-sm-6 col-md-4 fs-4 d-flex align-items-center justify-content-center fw-bold">
            <a class="link-baterrey text-dark" href="product?u_ref=${finalCart[0].id}">${finalCart[0].name}</a>
        </div>
        <div class="col-sm-6 col-md-3 d-flex align-items-center justify-content-center px-0">
            <div class="row d-flex align-items-center justify-content-center px-0">
                <div class="col-sm-4 col-md-2 d-flex justify-content-center px-0">
                    <button class="btn fs-5 text-dark" delete-cart="${finalCart[0].id}">-</button>
                </div>
                <div class="col-sm-4 col-md-4 d-flex justify-content-center">
                    <input type="text" class="form-control bg-transparent border text-center border-dark text-dark fs-5" disabled space="cant-${finalCart[0].id}" placeholder="${finalCart[0].cart_cant}" value="${finalCart[0].cart_cant}">
                </div>
                <div class="col-sm-4 col-md-2 d-flex justify-content-center px-0">
                    <button class="btn fs-5 text-dark" plus-cart="${finalCart[0].id}">+</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2 fs-4 d-flex align-items-center justify-content-center" space="total-${finalCart[0].id}">
            $ ${number_format((finalCart[0].price)*(finalCart[0].cart_cant), 2)}
        </div>
        <div class="col-sm-6 col-md-1 d-flex align-items-center justify-content-center">
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
} else {
    document.getElementById('list-products').innerHTML = '<div class="py-3 text-center">No tienes ningun producto agregado</div>';
}
$('[space="paint-total"]').html(paintTotal(finalCart))
function addProduct(id){
    var num_product;
    cart = JSON.parse(localStorage.getItem('cart'));
    stock = JSON.parse(localStorage.getItem('stock'));
    
    var num = cart.length;
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
            $('[space="paint-total"]').html(paintTotal(finalCart));
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
            $('[space="paint-total"]').html(paintTotal(finalCart));

        }

    }
}
function removeProduct(id){
    var num_product;
    cart = JSON.parse(localStorage.getItem('cart'));
    stock = JSON.parse(localStorage.getItem('stock'));
    
    var num = cart.length;
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
            finalCart = JSON.parse(localStorage.getItem("cart"));
            $('[space="paint-total"]').html(paintTotal(finalCart));
            console.log(num_product);
                //removeCart()

        } else {
            // no estaba en el carro de compra
            let result = stock.filter((item) => {
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
                cart.push(result[0]);
            }else{
                num_product = result[0][0].cart_cant;
            }
            localStorage.setItem("cart", JSON.stringify(cart))
            //removeCart()
            $('[space="cant-'+id+'"').val(num_product);
            $('[space="total-'+id+'"]').html('$ ' + number_format(parseInt(num_product) * parseInt(result[0][0].price), 2));
            finalCart = JSON.parse(localStorage.getItem("cart"));
            $('[space="paint-total"]').html(paintTotal(finalCart));

        }

    }
}
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
    $('[space="paint-total"]').html(paintTotal(finalCart));

    if (finalCart.length == 0) {
        $('[space="btn-pay"]').addClass('d-none');
        $('#list-products').html('<div class="py-3 text-center">No tienes ningun producto agregado</div>');
    }
    
})