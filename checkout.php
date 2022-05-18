<?php 
session_start();
if($_SESSION['status'] == 'Pay'){
    header('Location: cart');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="facebook-domain-verification" content="pcsv2b5fvkiu1x92zh0fpqd1qpcph3" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Hihgh CBD Drops</title>
	<!-- css -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/styles.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<div class="mh-50 row mx-0 d-flex align-content-center mt-5 pt-5">
      <div class="row col-xs-12 col-lg-8 row d-flex align-items-center justify-content-center mb-5 mx-0 px-0">
          <div class="row col-12">
                <form class="row col-12 border-0 py-5 shadow-lg" style="border-radius: 12px;" id="data-user">
                    <div class="col-12 fs-2 mb-5 pb-3 text-dark text-center">Ingresa tus datos</div>
                    <div class="separator mb-5"></div>
                    <div class="row d-flex justify-content-between px-3 py-3">
                        <div class="col-lg-3 col-xs-12 mb-2">
                            <input type="text" name="name" id="name" placeholder="Nombre(s)" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="col-lg-3 col-xs-12 mb-2">
                            <input type="text" name="last_name" id="last_name" placeholder="Apellidos" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="col-lg-2 col-xs-12 mb-2">
                            <input type="text" name="tel" id="tel" placeholder="Telefono" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="col-lg-3 col-xs-12 mb-2">
                            <input type="text" name="email" id="email" placeholder="Correo electrónico" class="form-control form-control-lg fs-6">
                        </div>
                    </div>
                    <div class="separator mb-4 mt-4"></div>
                    <div class="row d-flex justify-content-between px-3 py-3">
                        <div class="col-lg-4 col-xs-12 mb-2">
                            <input type="text" name="street" id="street" placeholder="Calle" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="col-lg-2 col-xs-12 mb-2">
                            <input type="text" name="ext" id="ext" placeholder="No. ext." class="form-control form-control-lg fs-6">
                        </div>
                        <div class="col-lg-3 col-xs-12 mb-2">
                            <input type="text" name="int" id="int" placeholder="No. int. (opcional)" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="col-lg-2 col-xs-12 mb-2">
                            <input type="text" name="cp" id="cp" placeholder="Codigo postal" class="form-control form-control-lg fs-6">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between px-3 py-3">
                        <div class="col-lg-4 col-xs-12 mb-2">
                            <input type="text" name="suburb" id="suburb" placeholder="Colonia" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="col-lg-4 col-xs-12 mb-2">
                            <input type="text" name="" id="municipality" placeholder="Municipio" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="col-lg-3 col-xs-12 mb-2">
                            <input type="text" name="" id="estate" placeholder="Estado" class="form-control form-control-lg fs-6">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center px-3 py-3 mt-4">
                        <button class="btn btn-border-success col-lg-4 col-xs-12 py-4" id="save">Continuar a pagar</button>
                    </div>
                </form>
            </div>
      </div>
      <div class="col-sm-12 col-md-4 d-flex justify-content-center align-items-center">
          <div class="w-100 py-5 my-3" style="border-radius: 10px;">
          <div class="text-center fs-2 fw-bold text-dark">
              RESUMEN
          </div>
          <div class="separator mb-5 mt-5 w-75"></div>
            <div class="row d-flex justify-content-center mb-5">
                <div class="col-4 text-start fw-bold fs-4 mb-1">Total productos</div>
                <div class="col-4 text-end fs-4" space="paint-total-p">$0</div>
            </div>
            <div class="row d-flex justify-content-center mb-5">
                <div class="col-4 text-start fw-bold fs-4 mb-1">Descuento</div>
                <div class="col-4 text-end fs-4" space="paint-total-d">$0</div>
            </div>
            <div class="separator mb-5 mt-5 w-75"></div>
            <div class="row d-flex justify-content-center mb-5">
                <div class="col-2 text-start fw-bold fs-3 mb-1">Total</div>
                <div class="col-6 text-end fs-3 fw-bold text-dark" space="paint-total">$0</div>
            </div>
                <div class="d-flex justify-content-center align-items-center mt-5 row">
                    <a href="javascript:history.back(-1);" class="btn px-5 text-danger py-3 col-md-6 col-sm-12">Salir</a>
                </div>
            </div>
      </div>
  </div>


	<!-- Core JavaScript Files -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/products-list.js?version=01"></script>
    <script src="assets/js/checkout.js?version=01"></script>
	<script src="assets/js/cart-list.js?version=01"></script>

</body>

</html>