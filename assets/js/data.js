var id;
 var name;
 var sku;
 var amount;
 $('[data-bs-target="#edit-data"]').on('click', function () {
   var ref = $(this).attr("ref");
   $('#id-product').val('');
   $('#cantidad-product').val('');
   $('#sku-product').val('');
   $('#name-product').val('');
   $('#price-product').val('');
   $('#coupon-apply').addClass('d-none');
   $.post('post/getDataProducts.php', {ref}, function (e){
      if(e != 'null'){
          var data = JSON.parse(e);
          $('#edit-data-product').html(data.nombre)
          $('#id-product').val(ref);
          $('#sku-product').val(data.sku);
          $('#cantidad-product').val(data.cantidad);
          $('#name-product').val(data.nombre);
          $('#price-product').val(data.precio);
          if(data.coupon != '' && data.coupon != null){
            ref = data.coupon;
            $.post('post/getDataCoupon.php', {ref}, function (e){
              var d = JSON.parse(e);
              $('#coupon-apply').removeClass('d-none');
              $('#coupon').html(d.coupon);
              $('#id-coupon').attr({
                'ref' : data.id
              });
            })
          }
          $('#price-product').val(data.precio);
      }
  })
})
$('[action="delete-coupon"]').click(function(){
  var ref = $(this).attr("ref");
  $.post('post/deleteCouponProduct.php', {ref}, function(){
    location.reload();
  })
})
$('[action="save-changes"]').on('click', function(){
    $('[space="save-changes"]').removeClass('d-none');
      id = $('#id-product').val();
      sku = $('#sku-product').val();
      amount = $('#cantidad-product').val();
      var name_p = $('#name-product').val();
      var price = $('#price-product').val();
      $.post('post/updateDataProducts.php', {id, sku, amount, name_p, price}, function (){
        location.reload();
      })
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