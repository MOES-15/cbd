var cart = [];
var stock = [];
$.post('posts/post.php', {}, function(e){
    console.log(e)
    var d = JSON.parse(e);
    var num = d.length;
    for (var i = 0; i < num; i++){
        stock[i] = [{ name: d[i].nombre, id: d[i].id, cant: d[i].cantidad, price: d[i].precio, cart_cant : '1', imagen: d[i].imagen}];
    }
    if (!JSON.parse(localStorage.getItem("stock"))) {
        localStorage.setItem("stock", JSON.stringify(stock))
    }
    if (!JSON.parse(localStorage.getItem("cart"))) {
        localStorage.setItem("cart", JSON.stringify(cart))
    }
})
$('[add-cart]').on("click", function(e){
    e.preventDefault();
    var id = $(this).attr('add-cart');
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
                result[0][0].cart_cant = parseInt(result[0][0].cart_cant) + 1;
            }
                localStorage.setItem('cart', JSON.stringify(cart));
                addCart()
        } else {
            // no estaba en el carro de compra
            let itemNuevo = stock.filter((item) => {
                return id === item[0].id;
            })
            if(itemNuevo[0][0].cant > 0){
                itemNuevo[0][0].cant = itemNuevo[0][0].cant - 1;
                cart.push(itemNuevo[0]);
            }
            localStorage.setItem("cart", JSON.stringify(cart))
            addCart()
        }

    }
})

function del(id) {
    let cart = JSON.parse(localStorage.getItem("cart"));
    let result = cart.filter((item) => {
        return id === item.id;
    })
    result[0].cant = result[0].cant - 1;
    localStorage.setItem('cart', JSON.stringify(cart));
    reload();
}
function number_format(amount, decimals) {

    amount += '';
    amount = parseFloat(amount.replace(/[^0-9\.]/g, ''));
    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);
    amount = '' + amount.toFixed(decimals);
    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;
    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');
    return amount_parts.join('.');
}

function total(cart) {
    let suma = 0;
    cart.map(item => {
        return suma = suma + (item[0].price * item[0].cart_cant)
    });
    return suma;
}

function paintTotal(cart) {
    let suma = total(cart);
    console.log(suma);
    let results = `$ ${number_format(suma, 2)}`
    return results
}
function addCart(){
    let finalCart = JSON.parse(localStorage.getItem("cart"));
    let num = 0;
    console.log(finalCart);
    if(finalCart != null){
        let results = finalCart.map(function(finalCart) {
            num += parseInt(finalCart[0].cart_cant)
        })
    }else{
        num = 0;
    }
    $('[space="num_cart"]').html(num)
}
function removeCart(){
    let finalCart = JSON.parse(localStorage.getItem("cart"));
    let num = 0;
    console.log(finalCart);
    if(finalCart != null){
        let results = finalCart.map(function(finalCart) {
            num += parseInt(finalCart[0].cart_cant - 1)
        })
    }else{
        num = 0;
    }
    console.log(num)
    $('[space="num_cart"]').html(num)
}
addCart();
function deleteItem(id) {
    let cart = JSON.parse(localStorage.getItem("cart"));
    let index = cart.findIndex(index => index.id === id);
    if (index >= 0) {
        cart.splice(index, 1)
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    reload();
}