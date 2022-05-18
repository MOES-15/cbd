<?php
$url = 'http://www.highcbdd.com/';
if (isset($_GET['p_ref'])) {
    include_once('config/config.php');
    $id = s($_GET['p_ref'], 'STRING');
    $get = $conn->prepare("SELECT * FROM blog WHERE titulo=?");
    $get->bind_param('s', $id);
    $get->execute();
    $result = $get->get_result();
    $row = $result->num_rows;
    if ($row != 0) {
        $data = $result->fetch_assoc();
        $vista = $data['vistas'] + 1;
        $update = $conn->prepare("UPDATE blog SET vistas=? WHERE id=?");
        $update->bind_param('is', $vista, $data['id']);
        $update->execute();
    } else {
        header('Location: blog');
    }
} else {
    header('Location: blog');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6XT8Q1F1ZK"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-6XT8Q1F1ZK');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['titulo']; ?> | Highcbd</title>
    <meta name="description" content="<?php echo $data['descripcion_corta']; ?>">

    <meta property="og:url" content="<?php echo $url . '/post?p_ref=' . urlencode($data['titulo']); ?>">
    <meta property="og:title" content="<?php echo $data['titulo']; ?>">
    <meta property="og:description" content="<?php echo $data['descripcion_corta']; ?>">
    <meta property="og:type" content="article">
    <meta property="og:locale" content="es_MX" />
    <meta property="og:updated_time" content="2021-07-15T17:20:50">
    <meta property="og:image" content="<?php echo $url . '/img/post/' . $data['imagen']; ?>">
    <meta property="fb:app_id" content="1114034795464057">
    <meta name="og:site_name" content="@madigenmarketingdigital">
    <meta name="article:author" content="https://www.facebook.com/madigenmarketingdigital">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo $url . '/post?p_ref=' . urlencode($data['titulo']); ?>">
    <meta name="twitter:site" content="@madigenmarketi1">
    <meta name="twitter:creator" content="@CharleaksRuiz">
    <meta name="twitter:title" content="<?php echo $data['titulo']; ?>">
    <meta name="twitter:description" content="<?php echo $data['descripcion_corta']; ?>">
    <meta name="twitter:image" content="<?php echo $url . '/img/post/' . $data['imagen']; ?>">
    <link rel="stylesheet" href="dist/output.css?v=cefb8d63421948f29e909c4a8d73a1a4">
    <meta name="facebook-domain-verification" content="pckd73x79n48e756cwua3m4j18n33m" />
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '337006811906536');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=337006811906536&ev=PageView&noscript=1" /></noscript>
    <script src="https://www.google.com/recaptcha/api.js?render=6LfUpPkfAAAAAGU_b-Y8mh7HKXvbiWv_Jey_HyVX"></script>
</head>

<body class="h-screen w-screen p-0">
    <?php include 'template/header-web-dark.html'; ?>
    <div class="grid grid-cols-6 md:mx-10 mx-1 mt-20 md:mb-48">
        <div class="md:col-span-4 col-span-6 md:w-10/12 w-11/12 mx-auto">
            <div class="md:mt-32 mb-10 flex md:justify-between md:flex-row flex-col md:items-center">
                <a href="blog" class="md:mb-0 mb-5 border-2 border-yellow-400 hover:bg-yellow-400 hover:text-white px-5 py-3 text-sm">VOLVER</a>
                <div>
                    <?php echo $data['fecha'] ?> | por <span class="font-bold"><?php echo $data['autor'] ?></span>
                </div>
            </div>
            <div class="md:mb-10 mb-5 md:text-5xl text-2xl font-bold"><?php echo $data['titulo'] ?></div>
            <div class="text-xl">
                <?php echo $data['descripcion_corta']; ?>
            </div>
            <div class="md:mt-14 h-80 flex items-center overflow-hidden md:mb-20">
                <img src="assets/media/img/post/<?php echo $data['imagen']; ?>" alt="" class="mx-auto">
            </div>
            <div class="text-xl">
                <?php echo $data['contenido']; ?>
            </div>
            <div class="mt-20 mx-auto w-full md:hidden block">
                <div class="mb-10">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($url . 'post?p_ref=' . $data['titulo']); ?>&amp;src=sdkpreparse" class="bg-blue-600 py-3 text-white flex items-center justify-center">
                        Compartir post en facebook
                        <div class="ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                        </div>
                    </a>
                </div>
                <iframe width="100%" height="80%" src="<?php
                                                        if ($data['video'] == '') {
                                                            $linkYoutube = "SELECT valor FROM template WHERE tipo ='youtube'";
                                                            $link = $conn->query($linkYoutube);
                                                            $y = $link->fetch_assoc();
                                                            echo $y['valor'];
                                                        } else {
                                                            echo $data['video'];
                                                        }  ?>?autoplay=1" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-span-2 mt-20 relative">
            <div class="fixed top-34 right-20 h-3/4 mx-auto w-3/12 md:block hidden">
                <div class="mb-10">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($url . 'post?p_ref=' . $data['titulo']); ?>&amp;src=sdkpreparse" class="bg-blue-600 py-3 text-white flex items-center justify-center">
                        Compartir post en facebook
                        <div class="ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                        </div>
                    </a>
                </div>
                <iframe width="100%" height="80%" src="<?php
                                                        if ($data['video'] == '') {
                                                            $linkYoutube = "SELECT valor FROM template WHERE tipo ='youtube'";
                                                            $link = $conn->query($linkYoutube);
                                                            $y = $link->fetch_assoc();
                                                            echo $y['valor'];
                                                        } else {
                                                            echo $data['video'];
                                                        }  ?>?autoplay=1" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <?php include 'template/footer-web.html'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script>
        $('#close-menu').on('click', function() {
            $('#menu-mobile').hide()
        })
        $('#open-menu').on('click', function() {
            $('#menu-mobile').show()
        })
    </script>
</body>

</html>