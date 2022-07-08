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
    <meta name="keywords" content="<?=$data['meta_tag_content_Seo']?>" />
    <meta name="description" content="<?=$data['meta_tag_description']?>" />
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
     <link href="<?=ASSETS?>css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=ASSETS?>css/important__style.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="<?=ASSETS?>css/responsive.css" />
    <link rel="stylesheet" href="<?=ASSETS?>css/font-awesome/css/all.css" />
    <link rel="stylesheet" href="<?=ASSETS?>css/header.css" type="text/css" media="all"/>
    <link rel="manifest" href="<?=ASSETS?>js/manifest.json" />
    <script type="text/javascript" src="<?=ASSETS?>js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="<?=ASSETS?>js/bootstrap.js"></script>
    <script type="text/javascript" src="<?=ASSETS?>js/jquery.mask.js"></script>
    <script type="text/javascript" src="<?=ASSETS?>js/jquery.mask.min.js"></script>
    <script  type="text/javascript">
        const Validemailfilter = (/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        const emailblockReg = /^([\w-\.]+@(?!yahoo.com)(?!hotmail.com)([\w-]+\.)+[\w-]{2,4})?$/;
        let base_url= '<?=ROOT?>';
    </script>
    <?php  if (isset($_SESSION['api'])){?>
     <script src="<?=ASSETS?>js/jqueryvalidate.js"></script>
    <?php }else {?>
        <script src="<?=ASSETS?>js/jqueryvalidateData.js"></script>
        <script src="<?=ASSETS?>js/data.js"></script>

    <?php }?>
</head>