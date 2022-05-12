<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntas frecuentes | highcbd</title>
    <link rel="stylesheet" href="dist/output.css">
</head>
<body class="h-screen w-screen p-0">
    <?php include 'template/header-web-dark.html'; ?>
    <div class="grid grid-cols-3 md:mt-36 mt-14">
        <div class="md:col-span-2 col-span-3 h-full text-black justify-center flex items-end flex-col">
            <div class="w-11/12 mt-10">
                <div class="md:text-5xl text-2xl font-bold mt-10 mb-14">PREGUNTAS FRECUENTES</div>
                <div class="md:ml-10 h-44">
                    <div class="mt-5">
                        <details>
                            <summary>Lorem ipsum dolor sit amet,</summary>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </details>
                    </div>
                    <div class="mt-5">
                        <details>
                            <summary>Lorem ipsum dolor sit amet,</summary>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </details>
                    </div>
                    <div class="mt-5">
                        <details>
                            <summary>Lorem ipsum dolor sit amet,</summary>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </details>
                    </div>
                    <div class="mt-5">
                        <details>
                            <summary>Lorem ipsum dolor sit amet,</summary>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </details>
                    </div>
                </div>
            </div>
            <div class="w-11/12 mt-10">
                <div class="md:text-5xl text-2xl font-bold mt-10 mb-14">ENVÍOS Y METODOS DE PAGO</div>
                <div class="md:ml-10 h-44">
                    <div class="mt-5">
                        <details>
                            <summary>Lorem ipsum dolor sit amet,</summary>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </details>
                    </div>
                    <div class="mt-5">
                        <details>
                            <summary>Lorem ipsum dolor sit amet,</summary>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </details>
                    </div>
                    <div class="mt-5">
                        <details>
                            <summary>Lorem ipsum dolor sit amet,</summary>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </details>
                    </div>
                    <div class="mt-5">
                        <details>
                            <summary>Lorem ipsum dolor sit amet,</summary>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        </details>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-1 col-span-3 flex justify-end md:mt-0 mt-10">
            <img src="assets/media/img/questions.png" alt="" width="400px">
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