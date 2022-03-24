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
	<!-- Facebook Pixel Code -->
	<script>
		! function (f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function () {
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
		fbq('init', '417748109994228');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id=417748109994228&ev=PageView&noscript=1" /></noscript>
	<!-- End Facebook Pixel Code -->
</head>


<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Messenger plugin de chat Code -->
	<div id="fb-root"></div>

	<!-- Your plugin de chat code -->
	<div id="fb-customer-chat" class="fb-customerchat">
	</div>

	<script>
		var chatbox = document.getElementById('fb-customer-chat');
		chatbox.setAttribute("page_id", "105135068604123");
		chatbox.setAttribute("attribution", "biz_inbox");

		window.fbAsyncInit = function () {
			FB.init({
				xfbml: true,
				version: 'v12.0'
			});
		};

		(function (d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<!-- Load Facebook SDK for JavaScript -->
	<script>
		window.fbAsyncInit = function () {
			FB.init({
				appId: '417771736468168',
				cookie: true,
				xfbml: true,
				version: 'v12.0'
			});

			FB.AppEvents.logPageView();

		};

		FB.getLoginStatus(function (response) {
				statusChangeCallback(response);
			},

			{
				status: 'connected',
				authResponse: {
					accessToken: '...',
					expiresIn: '...',
					signedRequest: '...',
					userID: '...'
				}
			},

			function checkLoginState() {
				FB.getLoginStatus(function (response) {
					statusChangeCallback(response);
				});
			});
		(function (d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {
				return;
			}
			js = d.createElement(s);
			js.id = id;
			js.src = "https://connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<!-- /page loader -->
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

	<?php include 'template/footer.php'; ?>
	<!-- Core JavaScript Files -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/new/products-list.js"></script>

</body>

</html>