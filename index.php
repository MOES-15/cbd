<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dist/output.css">
</head>
<body class="p-0">
    <?php include 'template/header-web.html'; ?>
    <section class="w-screen bg-black md:mt-0 mt-10">
        <video autoplay class="pt-20">
            <source src="assets/media/video/High-CBD.mp4" type="video/mp4">
            <source src="assets/media/video/High-CBD.mp4" type="video/mp4">
        </video>
    </section>
    <section class="w-screen" style="background-image: url(assets/media/img/FONDO-1.png); background-size: cover;">
        <div class="w-full flex items-center justify-center text-center pt pt-28 md:text-5xl text-xl font-bold md:px-0 px-5">
            <div class="md:w-9/12 w-full">Los mejores productos hechos a base de CBD en México</div>
        </div>
        <div class="grid grid-cols-2 pt-20">
            <div class="md:col-span-1 col-span-2 flex justify-center">
                <img src="assets/media/img/BOTELLAS-CBD.png" alt="" srcset="" width="70%">
            </div>
            <div class="md:col-span-1 col-span-2 flex justify-center items-center pb-20 md:mt-0 mt-10">
                <div class="md:w-8/12 w-11/12">
                    <div class="md:text-6xl text-2xl font-bold text-center">Con Aceite de MCT</div>
                    <div class="md:text-4xl text-xl mt-10 mx-auto md:w-11/12 w-10/12">Todos nuestros productos estan hechos con productos 100% naturales, todo por tu salud.</div>
                    <div class="flex justify-center mt-16">
                        <button class="bg-black text-white px-14 py-5 md:text-2xl text-base mx-auto font-bold">CONOCELOS</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="w-screen md:pt-20 pt-0" style="background-image: url(assets/media/img/fondo.png); background-size: cover;">
        <div class="grid grid-cols-2 pt-20">
            <div class="md:col-span-1 col-span-2 flex justify-center items-center md:pb-20">
                <div class="md:w-8/12 w-11/12">
                    <div class="md:text-6xl text-2xl font-bold text-center">Conoce nuestra linea PET</div>
                    <div class="md:text-4xl text-xl mt-10 mx-auto md:w-11/12 w-10/12">Te ofrecemos productos de CBD hechos especialmente para tus mascota</div>
                    <div class="flex justify-center mt-16">
                        <button class="bg-black text-white px-14 py-5 md:text-2xl text-base font-bold">¡ADQUIERELO YA!</button>
                    </div>
                </div>
            </div>
            <div class="md:col-span-1 col-span-2 flex h-full items-end justify-end md:mt-0 mt-14">
                <img src="assets/media/img/perrogato.png" alt="" srcset="" width="80%">
            </div>
        </div>
    </section>
    <section class="w-screen md:h-96 h-40 pt-0">
        <ul id="slider" class="relative md:h-full">
            <li class="visible absolute top-0">
                <img src="assets/media/img/slider.png" alt="">
            </li>
            <li class="invisible absolute top-0">
                <img src="assets/media/img/slider.png" alt="">
            </li>
            <li class="invisible absolute top-0">
                <img src="assets/media/img/slider.png" alt="">
            </li>
        </ul>
    </section>
    <section class="flex flex-col md:pt-44 -mt-5">
        <div class="w-screen" style="background-image: url(assets/media/img/FONDO-1.png); background-size: cover;">
            <div class="text-center md:text-6xl text-2xl font-bold pt-20">NOSOTROS</div>
            <div class="text-center md:text-3xl text-base mt-6">Conoce más acerca de HIGH CBD</div>
            <div class="grid md:grid-cols-3 grid-cols-1 md:mt-20 justify-center">
                <div class="md:mx-10 mx-5 bg-gray-300 text-center font-bold md:mt-0 mt-10">
                    <div class="mt-10 flex justify-center items-center h-48">
                        <img src="assets/media/img/objetivos.png" alt="" width="150px">
                    </div>
                    <div class="my-8 md:text-3xl text-xl">MISIÓN</div>
                    <div class="md:h-56 md:mb-0 mb-10 md:text-xl text-base w-9/12 mx-auto leading-10">Que nuestros clientes puedan mejorar su estado de salud gracias a los complementos naturales que ponemos a su disposición</div>
                </div>
                <div class="md:mx-10 mx-5 bg-gray-300 text-center font-bold md:mt-0 mt-10">
                    <div class="mt-10 flex justify-center items-center h-48">
                        <img src="assets/media/img/icono-vision.png" alt="" width="150px">
                    </div>
                    <div class="my-8 md:text-3xl text-xl">VISIÓN</div>
                    <div class="md:h-56 md:mb-0 mb-10 md:text-xl text-base w-9/12 mx-auto leading-10">Ser una empresa reconocida por la calidad de sus productos de CBD consiguiendo asi ser la marca lider en el mercado nacional</div>
                </div>
                <div class="md:mx-10 mx-5 bg-gray-300 text-center font-bold md:mt-0 mt-10">
                    <div class="mt-10 flex justify-center items-center h-48">
                        <img src="assets/media/img/porque-elegirnos.png" alt="" width="110px">
                    </div>
                    <div class="my-8 md:text-3xl text-xl">PORQUE ELEGIRNOS</div>
                    <div class="md:h-56 md:mb-0 mb-10 md:text-xl text-base w-9/12 mx-auto leading-10">Todos nuestros productos cuentan con la más altos estandares de calidad asegurando el mayor nivel de pureza en cada producto</div>
                </div>
            </div>
        </div>
    </section>
   <?php include 'template/footer-web.html'; ?>
<script src="assets/js/jquery.min.js"></script>
<script>
    $('#close-menu').on('click', function(){
        $('#menu-mobile').hide()
    })
    $('#open-menu').on('click', function(){
        $('#menu-mobile').show()
    })
       let slider = () => {
            var item = $('#slider li'),
                space = item.filter('.visible');
            setInterval(function() {
                var nextSpace = space.next();
                item.removeClass('visible')
                item.addClass('invisible')
                if (nextSpace.length) {
                    space = nextSpace.addClass('visible').removeClass('invisible');
                } else {
                    space = item.first().addClass('visible').removeClass('invisible');
                }
            }, 4000)
        }
        slider()
</script>
</body>
</html>