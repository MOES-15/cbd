<?php
session_start();
unset($SESSION['status']);
$SESSION['status'] = 'New';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-6XT8Q1F1ZK"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-6XT8Q1F1ZK');
	</script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Carrito | Highcbd</title>
	<!-- css -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/styles.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="dist/output.css?v=cefb8d63421948f29e909c4a8d73a1a4">
	<?php include 'template/favicon.html'; ?>
	<meta name="facebook-domain-verification" content="lpb1lcu0mlyilagglacmvx48v1c0py" />
	<script>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '337006811906536');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=337006811906536&ev=PageView&noscript=1" /></noscript>
	<script src="https://www.google.com/recaptcha/api.js?render=6LfUpPkfAAAAAGU_b-Y8mh7HKXvbiWv_Jey_HyVX"></script>
</head>


<body class="h-screen w-screen p-0">
	<?php include 'template/header-web-dark.html'; ?>
	<!-- <div class="mh-50 row mx-0 py-5" style="background-image: url(img/fondo-estrellas.png); /* background-repeat: no-repeat; */ background-position: top; background-size: 100%; background-attachment: fixed;"> -->
	<div class="grid grid-cols-5 mx-0 mt-20 z-10">
		<div class="md:col-span-3 col-span-5 row flex items-center justify-center mb-5 mt-3 mx-0 px-0">
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
	<script src="assets/js/products-list.js?v=cefb8d63421948f29e909c4a8d73a1a401"></script>
	<script src="assets/js/cart-list.js?v=cefb8d6342s948f29e909c4a8d73a1a401"></script>

	<script>
		$('#close-menu').on('click', function() {
			$('#menu-mobile').hide()
		})
		$('#open-menu').on('click', function() {
			$('#menu-mobile').show()
		})
	</script>

</body>

</html>