<?php
session_start();
if(isset($_GET['u'])){
    $name = base64_decode($_GET['u']);
}else{
    $name = 'Cliente';
}
if(isset($_GET['das876f67dsf87sff67'])){
    $status = 'Pending';
}else if (isset($_GET['34hf7sf8g8sdf8d7f'])){
    $status = 'Pay';
}
$_SESSION['status'] = 'Pay';

?>
<!DOCTYPE html>
<html lang="en">

<head>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6XT8Q1F1ZK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6XT8Q1F1ZK');
</script>
	<meta name="facebook-domain-verification" content="pcsv2b5fvkiu1x92zh0fpqd1qpcph3" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="facebook-domain-verification" content="pckd73x79n48e756cwua3m4j18n33m" />

	<title>Hihgh CBD Drops</title>

	<!-- css -->
	<link rel="stylesheet" href="dist/output.css?v=cefb8d63421948f29e909c4a8d73a1a4">
	<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '337006811906536');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=337006811906536&ev=PageView&noscript=1"
/></noscript>
</head>


<body>
	<!-- Section: home slide -->
	<?php include 'template/header-web.html'; ?>
	<!-- <div class="mh-50 row mx-0 py-5" style="background-image: url(img/fondo-estrellas.png); /* background-repeat: no-repeat; */ background-position: top; background-size: 100%; background-attachment: fixed;"> -->
	<div class="h-screen flex items-center">
      <div class="h-80 w-full flex items-center justify-center flex-col mb-5 mt-48 mx-0 px-0" >
            <div class="mt-40 px-5 text-4xl text-dark text-center font-bold">
                <?php 
                        if($status == 'Pay'){
                            echo '¡Gracias por tu compra!';
                        }else{
                            echo '¡Gracias por generar tu pedido!';
                        }
                ?>
            </div>
            <div class="flex justify-center px-0 fs-4 mt-5 text-center">
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
	<?php include 'template/footer-web.html'; ?>
	<!-- Core JavaScript Files -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/products-list.js?v=cefb8d63421948f29e909c4a8d73a1a4"></script>
</body>

</html>