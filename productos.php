<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Highcbd</title>
    <link rel="stylesheet" href="dist/output.css?v=cefb8d63421948f29e909c4a8d73a1a4">
</head>
<body class="h-screen w-screen p-0" style="background-image: url(assets/media/img/FONDO.jpg); background-size: cover; background-attachment: fixed;">
    <?php include 'template/header-web-dark.html'; ?>
    <div class="md:pt-56 pt-32 text-black">
        <div class="md:px-32 px-10 mb-40">
            <div class="md:text-5xl text-4xl font-bold md:mt-10 mb-20 text-center">PRODUCTOS</div>
            <div class="mt-28 grid grid-cols-2">
                <?php include 'template/products.php'; ?>
            </div>
            <!-- <div class="mt-28 grid grid-cols-2">
                <div class="col-span-1 px-6">
                    <div class="w-full flex justify-center">
                        <img src="assets/media/img/200-HIGH-CBD.png" alt="" width="300px">
                    </div>
                    <div class="mt-10 mb-10 text-center text-4xl font-bold">Aceite HIGH CBD PET 100% natural 200 mg CBD/30ml aceite de MCT</div>
                    <div class="grid grid-cols-2">
                        <div class="col-span-1">
                            <button class="text-lg bg-white border-4 border-black hover:bg-black w-full h-16 my-2 hover:text-white rounded-full font-bold">MAS INFORMACIÓN</button>
                            <button class="text-lg bg-white border-4 border-black hover:bg-black w-full h-16 my-2 hover:text-white rounded-full font-bold">AGREGAR AL CARRITO</button>
                        </div>
                        <div class="col-span-1 flex items-center justify-center text-7xl font-bold">
                            $360
                        </div>
                    </div>
                </div>
                <div class="col-span-1 px-6">
                    <div class="w-full flex justify-center">
                        <img src="assets/media/img/200-HIGH-CBD.png" alt="" width="300px">
                    </div>
                    <div class="mt-10 mb-10 text-center text-4xl font-bold">Aceite HIGH CBD 100% natural 1500 mg CBD/30ml aceite de MCT</div>
                    <div class="grid grid-cols-2">
                        <div class="col-span-1">
                            <button class="text-lg bg-white border-4 border-black hover:bg-black w-full h-16 my-2 hover:text-white rounded-full font-bold">MAS INFORMACIÓN</button>
                            <button class="text-lg bg-white border-4 border-black hover:bg-black w-full h-16 my-2 hover:text-white rounded-full font-bold">AGREGAR AL CARRITO</button>
                        </div>
                        <div class="col-span-1 flex items-center justify-center text-7xl font-bold">
                            $1,500
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <a href="cart" class="fixed md:top-60 top-48 md:right-20 right-2 fs-5 mt-3 fw-bold">
        <div class="absolute md:right-0 right-10 md:bottom-14 bottom-10 font-bold" space="num_cart">0</div>
        <img src="assets/media/img/carrito.png" class="md:w-auto w-8/12"alt="">
    </a>
    <?php include 'template/footer-web.html'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/products-list.js"></script>
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