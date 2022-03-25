var id;
 var name;
 var sku;
 var amount;
 $('[data-bs-target="#edit-coupon"]').on('click', function () {
   var ref = $(this).attr("ref");
   $('#id-cupon').val('');
   $('#cupon').val('');
   $('#descuento').val('');
   $('#tipo').val('');
   $('#fecha').val('');
   $('#list-products-coupon').addClass('d-none');
   let select_1 = document.getElementById("tipo");
   let select_2 = document.getElementById("tipo-aplica-coupon");
   $.post('post/getDataCoupon.php', {ref}, function (e){
      if(e != 'null'){
          var data = JSON.parse(e);
          $('#edit-data-product').html(data.nombre)
          $('#id-cupon').val(ref);
          $('#cupon').val(data.coupon);
          $('#descuento').val(data.amount);
          $('#tipo').val(data.type_amount);
          $('#fecha').val(data.date_due);
          select_1.value = data.type_amount;
          select_2.value = data.type;
          $.post('post/getProducts.php', {}, function (e_2){
            var template = '';
            var num = 1;
            var d = JSON.parse(e_2);
            var checked = '';
            for (const key of d) {
              if(key.coupon == '' || ref == key.coupon){
                if(ref == key.coupon){
                  checked = 'checked';
                }else{
                  checked = '';
                }
                template += `<div class="form-check py-1">
                <input class="form-check-input" name="product-edit" type="checkbox" value="${key.id}" id="product-edit-${num}" ${checked}>
                <label class="form-check-label" for="product-edit-${num}">
                ${key.nombre} $${key.precio}
                </label>
                </div>`;
                num++;
              }
            }
            $('#list-products-coupon').html(template);
            if(data.type == 'Productos'){
              $('#list-products-coupon').removeClass('d-none');
            }
          })
      }
  })
})
$('[data-bs-target="#view-products"]').on('click', function () {
  var ref = $(this).attr("ref");
  $.post('post/getProductsCoupon.php', {ref}, function (e){
     if(e != 'null'){
         var data = JSON.parse(e);
        for (const key of data) {
          template += `<div class="fs-6">- ${key.nombre}</div>`;
         }
         $('#list-products-coupon').html(template);
         $('#message').remove()
     }
 })
})
$('[action="delete-coupon"]').on('click', function () {
  var ref = $(this).attr("ref");
  $.post('post/deleteCoupon.php', {ref}, function (e){
    location.reload();
  })
})
$('[action="save-changes"]').on('click', function(){
  var id = $('#id-cupon').val();
  var coupon = $('#cupon').val();
  var amount = $('#descuento').val();
  var type = $('#tipo').val();
  var type_apply = $('#tipo-aplica-coupon').val();
  var date = $('#fecha').val();
  var products;
  var validate_product = false;
  if(type_apply == 'Productos'){
    var num = $('[name="product-edit"]').length;
    products = [];
    for(var i=1; i <= num; i++){
      if($('#product-edit-'+ i +'').is(':checked')){
        products.push($('#product-edit-'+ i +'').val())
        validate_product = true;
      }
    }
  }else{
    validate_product = true;
    products = type_apply;
  }
  console.log(products.length)
  if(validate_product == true || products.length == 0){
    if(products.length == 0 && type_apply == 'Productos'){
      type_apply = 'Toda la tienda';
    }
    $.post('post/updateDataCoupon.php', {id, coupon, amount, type, type_apply, date, products}, function (e){
      location.reload();
    })
  }else{
    $('#alert-cupon').removeClass('d-none');
    setTimeout(function (){
      $('#alert-cupon').addClass('d-none');
    }, 3000);
  }
})
$('#search-products').on('keyup', function(){
  var _this = this;
  $.each($('#table-products tr'), function(){
      if($(this).html().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1){
          $(this).addClass('d-none');
      }else{
          $(this).removeClass('d-none');
      }
      if($('#table-orders tr').not('.d-none').length != 0){
          $('[space="empty-search"]').addClass('d-none');
      }else{
          $('[space="empty-search"]').removeClass('d-none').html('No se encontraron coincidencias con <span class="border-bottom border-danger">' + $(_this).val() + '</span>');
      }
  })
});
$('#fecha-new').daterangepicker({
  singleDatePicker: true,
  showDropdowns: true,
  locale: {
    format: 'DD/MM/YYYY'
  }
});

$('[action="save-new"]').on('click', function(){
  var coupon = $('#cupon-new').val();
  var amount = $('#descuento-new').val();
  var type = $('#tipo-new').val();
  var type_apply = $('#tipo-aplica-new').val();
  var date = $('#fecha-new').val();
  var products;
  var validate_product = false;
  if(type_apply == 'Productos'){
    var num = $('[name="product"]').length;
    products = [];
    for(var i=1; i <= num; i++){
      if($('#product-'+ i +'').is(':checked')){
        products.push($('#product-'+ i +'').val())
        validate_product = true;
      }
    }
  }else{
    validate_product = true;
    products = type_apply;
  }
  if(validate_product == true){
    $.post('post/createCoupon.php', {coupon, amount, type, type_apply, date, products}, function (){
      location.reload();
    })
  }else{
    let alert = document.getElementById('alert');
    alert.classList.remove('d-none');
    setTimeout(function (){
      alert.classList.add("d-none");
    }, 3000);
  }
})
$('#tipo-aplica-new').change(function () {
  let spaceProducts = document.getElementById('list-products');
  if($(this).val() == 'Productos'){
    spaceProducts.classList.remove('d-none');
  }else{
    spaceProducts.classList.add("d-none");
  }
})
$('#tipo-aplica-coupon').change(function () {
  let spaceProducts = document.getElementById('list-products-coupon');
  if($(this).val() == 'Productos'){
    spaceProducts.classList.remove('d-none');
  }else{
    spaceProducts.classList.add("d-none");
  }
})