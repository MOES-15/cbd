<?php 
session_start();
if(isset($_SESSION['s']) || isset($_SESSION['s']['i'])){
  header('Location: index');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión | Highcbdd</title>
    <link href="../assets/css/styles.min.css" rel="stylesheet">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <meta name="facebook-domain-verification" content="pckd73x79n48e756cwua3m4j18n33m" />
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-dark">
    <div class="row col-12 col-md-4">
        <div class="card col-11 col-md-12 shadow border-0 mx-auto mb-5" style=" border-radius: 10px;">
            <div class="card-title text-center mt-4 mb-3 fw-bold fs-3">Inicia sesión</div>
            <div class="card-body">
                <div class="col-12 col-lg-10 mx-auto mb-2">
                    <input type="text" name="email" id="sku-product" placeholder="Correo electrónico" class="form-control text-center py-2">
                </div>
                <div class="col-12 col-lg-10 mx-auto mb-2">
                    <input type="password" name="password" id="sku-product" placeholder="Contraseña" class="form-control text-center py-2">
                </div>
                <div class="col-12 d-flex justify-content-center mt-4 mb-4">
                    <button type="button" class="btn btn-border-success px-5" action="login">Iniciar sesión</button>
                </div>
                <div class="col-12 text-center pb-3 d-none" space="alert-session"><div class="text-light-danger" space="text-alert"></div></div>
            </div>
        </div>
    </div>
    <div class="position-absolute text-center mx-auto bottom-0 mb-3 text-white">&copy; Desarrollado en <a href="https://madigen.mx" class="text-white">Madigen</a> por Pablo Moreno</div>
    <script src="../assets/js/styles.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/valid.js"></script>
</body>
</html>