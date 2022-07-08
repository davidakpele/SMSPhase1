<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="theme-color" content="#c9190c">
    <meta name="robots" content="index,follow">
    <meta htttp-equiv="Cache-control" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#c9190c">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name=" msapplication-TileColor" content="#c9190c" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, name=" viewport" />
    <link rel="icon" href="<?=ASSETS?>img/favicon-32x32.png" type="image/png" sizes="32x32" />
    <link rel="apple-touch-icon" href="<?=ASSETS?>img/icons/splash/launch-640x1136.png"
        media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="<?=ASSETS?>img/icons/splash/launch-750x1294.png"
        media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="<?=ASSETS?>img/icons/splash/launch-1242x2148.png"
        media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="<?=ASSETS?>img/icons/splash/launch-1125x2436.png"
        media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="<?=ASSETS?>img/icons/splash/launch-1536x2048.png"
        media="(min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="<?=ASSETS?>img/icons/splash/launch-1668x2224.png"
        media="(min-device-width: 834px) and (max-device-width: 834px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="<?=ASSETS?>img/icons/splash/launch-2048x2732.png"
        media="(min-device-width: 1024px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait)">
    <link rel="shortcut icon" href="<?=ASSETS?>img/icons/favicon.ico" />
    <title><?=$data['page_title'] . " | " . WEBSITE_TITLE;?></title>
    <link rel="manifest" href="<?=ASSETS?>js/manifest.json" />
		<!-- Style-->  
		<link rel="stylesheet" href="<?=ASSETS?>css/style.css">
		<link rel="stylesheet" href="<?=ASSETS?>css/skin_color.css">		
  </head>
<body class="theme-primary">
	<section class="error-page h-p100">
		<div class="container h-p100">
		  <div class="row h-p100 align-items-center justify-content-center text-center">
			  <div class="col-lg-7 col-md-10 col-12">
				  <div class="text-center">
					  <img src="<?=ASSETS?>img/404.png" class="max-w-650 w-p100" alt="" />
					  <h1>Page Not Found !</h1>
					  <h3>looks like, page doesn't exist</h3>
					  <div class="my-30"><a href="<?=ROOT?>" class="btn btn-danger">Back to Home</a></div>				  
				  </div>
			  </div>				
		  </div>
		</div>
	</section>
	
	<!-- Vendor JS -->
	<script src="<?=ASSETS?>js/vendors.min.js"></script>	
	
	<!-- EduAdmin front end -->
	<script src="<?=ASSETS?>js/template.js"></script>
</body>
</html>