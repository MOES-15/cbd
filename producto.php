<?php

if(isset($_GET['_ref'])){
  include_once('config/config.php');
  $id = s($_GET['_ref'], 'STRING');
  $get = $conn->prepare("SELECT * FROM products WHERE id=?");
  $get->bind_param('s', $id);
  $get->execute();
  $result = $get->get_result();
  $row = $result->num_rows;
  if($row != 0){
    $data = $result->fetch_assoc();
    $vista = $data['vistas'] + 1;
    $update = $conn->prepare("UPDATE products SET vistas=? WHERE id=?");
    $update->bind_param('is', $vista, $data['id']);
    $update->execute();
    if($data['cantidad'] == 0){
		$text_amount = 'Agotado';
        $btn = '';
      }else{
		$text_amount = 'Disponibles';
        $btn = '
        <button class="text-lg bg-white border-4 border-black hover:bg-black mx-auto w-10/12 h-16 my-2 hover:text-white rounded-full font-bold" add-cart="' . $data['id'] . '" id="buy-product">COMPRAR</button>
        <button class="text-lg bg-white border-4 border-black hover:bg-black mx-auto w-10/12 h-16 my-2 hover:text-white rounded-full font-bold" add-cart="' . $data['id'] . '">AGREGAR AL CARRITO</button>';
      }
  }else{
    header('Location: index');
  }
}else{
  header('Location: index');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['nombre']; ?> | Highcbd</title>
    <link rel="stylesheet" href="dist/output.css?v=cefb8d63421948f29e909c4a8d73a1a4">
</head>
<body class="h-screen w-screen p-0" style="background-image: url(assets/media/img/FONDO.jpg); background-size: cover; background-attachment: fixed;">
    <?php include 'template/header-web-dark.html'; ?>
    <div class="md:pt-56 pt-32 text-black">
        <div class="md:px-32 px-10 mb-40">
            <div class="mt-28 grid grid-cols-2">
                <div class="md:col-span-1 col-span-2 md:px-6">
                    <div class="w-full flex justify-center">
                        <img src="assets/media/img/productos/<?php echo $data['imagen']; ?>" alt="" width="350px">
                    </div>
                </div>
                <div class="md:col-span-1 col-span-2 px-6">
                <div class="text-start text-xl md:mt-0 mt-10"><?php echo $text_amount; ?>: <?php echo $data['cantidad']; ?></div>
                    <div class="mt-10 mb-10 text-4xl font-bold"> <?php echo $data['nombre']; ?></div>
                    <div class="grid grid-cols-2">
                        <div class="md:col-span-1 col-span-2 flex items-center justify-center text-6xl font-bold flex-col">
                            $<?php echo number_format($data['precio'], 0, '.', ','); ?>
                        </div>
                        <div class="md:col-span-1 col-span-2 md:mt-0 mt-10 flex justify-center flex-col">
                            <?php echo $btn; ?>
                        </div>
                    </div>
                    <div class="flex justify-center mt-20">
                        <a href="productos" class="bg-black px-10 py-3 text-white rounded-full">Volver</a>
                    </div>
                </div>
            </div>
            <div class="w-full mt-20 text-2xl font-bold">
                <?php echo $data['descripcion']; ?>
            </div>

        </div>
    </div>
    <a href="cart" class="fixed md:top-60 top-48 md:right-20 right-2 fs-5 mt-3 fw-bold">
        <div class="absolute md:right-0 right-10 md:bottom-14 bottom-10 font-bold" space="num_cart">0</div>
        <img src="assets/media/img/carrito.png" class="md:w-auto w-8/12"alt="">
    </a>
    <?php include 'template/footer-web.html'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/products-list.js?version=01"></script>
    <script>
        $('#close-menu').on('click', function(){
            $('#menu-mobile').hide()
        })
        $('#open-menu').on('click', function(){
            $('#menu-mobile').show()
        })
      if($('#buy-product').length != 0){
		  console.log('Existe')
        $('#buy-product').on('click', function() {
          console.log('entra')
          window.location.href = "cart";
        })
      }
    </script>
</body>
</html>