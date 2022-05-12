<?php 
session_start();
$SESSION['status'] = 'New';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="facebook-domain-verification" content="pcsv2b5fvkiu1x92zh0fpqd1qpcph3" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Hihgh CBD Drops</title>
	<!-- css -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/styles.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="dist/output.css">
</head>


<body class="h-screen w-screen p-0">
	<?php include 'template/header-web-dark.html'; ?>
	<!-- <div class="mh-50 row mx-0 py-5" style="background-image: url(img/fondo-estrellas.png); /* background-repeat: no-repeat; */ background-position: top; background-size: 100%; background-attachment: fixed;"> -->
	<div class="grid grid-cols-5 mx-0 mt-20 z-10">
      <div class="md:col-span-3 col-span-5 row flex items-center justify-center mb-5 mt-3 mx-0 px-0" >
        <div class="col-sm-11 px-5 fs-2 text-dark">
            Estos son los productos de tu carrito
        </div>
        <div class="separator border-dark mb-2"></div>
        <div class="row col-sm-12 flex justify-center px-0" id="list-products">
        </div>
      </div>
	  <div class="row md:col-span-2 col-span-5 flex justify-center">
		  <div class="row col-sm-12 col-lg-6">
			  <div class="w-100 py-5 my-3" style="border-radius: 10px;">
				  <div class="text-center fw-bold fs-2 text-dark mt-5 mb-4 pt-5">Total por pagar</div>
				  <div class="text-center fs-3 mt-4 mb-5" space="paint-total">$0</div>
				  <div class="text-center fs-2 text-dark mt-5 mb-4 pt-5 d-none" id="name-coupon"></div>
					<div class="input-group mt-3 d-none" space="null" id="space-coupon">
						<input type="text" name="" id="coupon" placeholder="¿Tienes un cupón?" class="text-center form-control text-md">
						<button class="input-group-text bg-green-600 text-white  text-xs" action="coupon">Aplicar</button>
					</div>
				  <div class="d-flex justify-content-center align-items-center mt-5 d-none row d-none" space="btn-pay">
						  <button class="btn btn-border-success px-5 shadow py-4 text-md col-lg-12 col-sm-12 d-none" action="checkout" space="null">Pagar ahora</button>
					</div>
					<div class="d-flex justify-content-center align-items-center mt-3 row">
						<a href="javascript:history.back(-1);" class="btn px-5 text-dark py-3 col-lg-12 col-sm-12">Volver</a>
					</div>
				</div>
		  </div>
	  </div>
  </div>
	<?php include 'template/footer-web.html'; ?>
	<!-- Core JavaScript Files -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/products-list.js"></script>
	<script src="assets/js/cart-list.js"></script>

	<script>
        $('#close-menu').on('click', function(){
            $('#menu-mobile').hide()
        })
        $('#open-menu').on('click', function(){
            $('#menu-mobile').show()
        })
	</script>

</body>

</html>