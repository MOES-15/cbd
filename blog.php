<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dist/output.css">
</head>
<body class="h-screen w-screen p-0">
    <?php include 'template/header-web-dark.html'; ?>
    <div class="text-center md:mt-44 mt-32 md:text-6xl text-2xl font-bold">Estudios efectuados sobre el CBD</div>
    <div class="grid grid-cols-2 mt-24">
        <div class="md:col-span-1 col-span-2">
            <img src="assets/media/img/blog-1.png" alt="">
        </div>
        <div class="md:col-span-1 col-span-2 text-black md:px-20 px-10 flex items-center flex-col">
            <div class="md:text-4xl text-2xl font-bold mt-10">5 consejos para aliviar el dolor muscular después del ejercicio</div>
            <div class="mt-5 md:mb-0 mb-10">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Erat velit scelerisque in dictum non consectetur a erat. Ut consequat semper viverra nam libero justo laoreet sit amet. Lorem donec massa sapien faucibus et molestie ac feugiat.
            </div>
            <!-- <div class="flex justify-start w-full mt-10">
                <a href="" class="bg-green-700 px-6 py-3 font-bold text-xl text-white">Leer más</a>
            </div> -->
        </div>
    </div>
    <div class="grid grid-cols-2">
        <div class="md:col-span-1 col-span-2 text-black md:px-20 px-10 flex items-center flex-col">
            <div class="md:text-4xl text-2xl font-bold mt-14 w-full">El secreto mejor guardado</div>
            <div class="mt-5 md:mb-0 mb-10">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Erat velit scelerisque in dictum non consectetur a erat. Ut consequat semper viverra nam libero justo laoreet sit amet. Lorem donec massa sapien faucibus et molestie ac feugiat.
            </div>
            <!-- <div class="flex justify-start w-full mt-10">
                <a href="" class="bg-green-700 px-6 py-3 font-bold text-xl text-white">Leer más</a>
            </div> -->
        </div>
        <div class="md:col-span-1 col-span-2">
            <img src="assets/media/img/blog-1.png" alt="">
        </div>
    </div>
    <?php include 'template/footer-web.html'; ?>
    <script src="assets/js/jquery.min.js"></script>
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