<?php 
if(isset($_GET['u'])){
    $name = base64_decode($_GET['u']);
}else{
    $name = 'Cliente';
}
if(isset($_GET['das876f67dsf87sff67'])){
    $status = 'Pay';
}else if (isset($_GET['34hf7sf8g8sdf8d7f'])){
    $status = 'Pending';
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
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="css/styles.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>


<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<div id="stlChanger">
		<div class="blockChanger bgChanger">
			<div class="chBody">
				<div class="stBlock text-center">
					<a class="s_1" target="_blank" href="tel:#"><img src="img/whatsapp.svg" alt="Whatsapp"></a>
				</div>
			</div>
		</div>
	</div>
	<!-- Section: home slide -->
	<?php include 'template/header.php'; ?>
	<!-- <div class="mh-50 row mx-0 py-5" style="background-image: url(img/fondo-estrellas.png); /* background-repeat: no-repeat; */ background-position: top; background-size: 100%; background-attachment: fixed;"> -->
	<div class="mh-50 row mx-0 py-5 h-70vh d-flex align-items-center">
      <div class="mb-5 mt-3 mx-0 px-0" >
            <div class="px-5 fs-1 mt-3 text-dark text-center fw-bold">
                <?php 
                        if($status == 'Pay'){
                            echo '¡Gracias por tu compra!';
                        }else{
                            echo '¡Gracias generar tu pedido!';
                        }
                ?>
            </div>
            <div class="d-flex justify-content-center px-0 fs-4 mt-5">
                <?php 
                    if($status == 'Pay'){
                        echo $name . ', has realizado tu pago con exito, muy pronto nos estaremos comunicando contigo.';
                    }else{
                        echo $name . ', estaremos en espera de tu pago, en cuanto lo hagas nos comunicaremos contigo.';
                    }
                ?>
            </div>
      </div>
  </div>
	<?php include 'template/footer.php'; ?>
	<!-- Core JavaScript Files -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/new/products-list.js"></script>
</body>

</html>