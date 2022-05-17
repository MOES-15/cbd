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
                            <summary>¿Qué es el CBD?</summary>
                            <p>El CBD es un compuesto completamente natural que se encuentra en la planta del cannabis, compuesto que está siendo usado con fines medicinales, es una sustancia segura y no adictiva que en la actualidad está siendo objeto de estudio debido a su diversidad de aplicaciones médicas</p>
                        </details>
                    </div>
                    <div class="mt-5">
                        <details>
                            <summary>¿Se puede usar en niños?</summary>
                            <p>Sugerimos que nuestros productos sean usados por mayores de 15 años.</p>
                        </details>
                    </div>
                    <div class="mt-5">
                        <details>
                            <summary>¿Se puede usar en mujeres embarazadas?</summary>
                            <p>No se recomienda su uso en mujeres embarazadas, Consultar a su médico para un diagnóstico personalizado</p>
                        </details>
                    </div>
                    <div class="mt-5">
                        <details>
                            <summary>¿Causa efectos psicoactivos? </summary>
                            <p>Nuestros productos son libres de THC y no causan efectos psicoactivos, por lo que no sale positivo en las pruebas antidoping.</p>
                        </details>
                    </div>
                </div>
            </div>
            <div class="w-11/12 mt-10">
                <div class="md:text-5xl text-2xl font-bold mt-10 mb-14">ENVÍOS Y METODOS DE PAGO</div>
                <div class="md:ml-10 h-44">
                    <div class="mt-5">
                        <details>
                            <summary>¿Cuánto cuesta el envío?</summary>
                            <p>PENDIENTE</p>
                        </details>
                    </div>
                    <div class="mt-5">
                        <details>
                            <summary>¿Cuánto tarda en llegar mi pedido?</summary>
                            <p>PENDIENTE</p>
                        </details>
                    </div>
                    <div class="mt-5">
                        <details>
                            <summary>¿Con qué paqueterías trabajan?</summary>
                            <p>PENDIENTE</p>
                        </details>
                    </div>
                    <div class="mt-5">
                        <details>
                            <summary>¿Dónde consulto mi código de rastreo?</summary>
                            <p>PENDIENTE</p>
                        </details>
                    </div>
                    <div class="mt-5">
                        <details>
                            <summary>¿Qué métodos de pago ofrecen?</summary>
                            <p>Por ahora solo manejamos Mercado Pago, pero pronto incorporaremos otros métodos de pago</p>
                        </details>
                    </div>
                    <div class="mt-5">
                        <details>
                            <summary>¿Cuál es su política de devolución?</summary>
                            <p>PENDIENTE</p>
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