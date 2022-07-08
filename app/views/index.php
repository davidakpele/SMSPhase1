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
    <link href="<?=ASSETS?>css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=ASSETS?>css/header.css" type="text/css" media="all"/>
    <link type="text/css" rel="stylesheet" href="<?=ASSETS?>css/structure.css" />
    <link type="text/css" rel="stylesheet" href="<?=ASSETS?>css/responsive.css" />
    <title><?=$data['page_title'] . " | " . WEBSITE_TITLE;?></title>
    <link rel="stylesheet" href="<?=ASSETS?>css/font-awesome/css/all.css" />
     <link href="<?=ASSETS?>css/important__style.css" rel="stylesheet" />
    <link rel="manifest" href="<?=ASSETS?>js/manifest.json" />
    <script type="text/javascript" src="<?=ASSETS?>js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="<?=ASSETS?>js/bootstrap.js"></script>
    <style>
    html {
        overflow-x: hidden;
    }

    #link {
        text-decoration: none;
    }
    </style>
</head>

<body>
    <div id="head">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="<?=ROOT?>">
                        <div class="float-left">
                            <span>
                                <img src="<?=ASSETS?>img/product/1.png" class="img-responsive center"
                                    style="max-width:55px;" alt="logo" />
                            </span>
                        </div>
                    </a>
                </div>
                <!--end col div here -->
                <br class="clear" />
            </div><!-- end row here -->
        </div><!-- close container -->
    </div>
    <!--- Start Body -->
    <div id="content" style="padding-bottom: 90px;padding-left: 10px;padding-right: 10px;">
        <div class="container-fluid">
            <div class="row" style="margin-top:30px;">
                <div class="col-12">
                    <!--<div style="width:100%; align-content:center; text-align:center"> -->
                    <div class="col-sm-4 app-btn-cta">
                        <a href="<?=ROOT?>Application/Registration" id="link">
                            <div class="col-12 text-center" style="border:1px solid #ddd; border-radius:3px;">
                                <span><i class="fa fa-compress fa-3x"
                                        style="padding-bottom:10px; color:#2383ad;"></i></span>
                                <h2>Start a Fresh Application</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 app-btn-cta">
                        <a href="<?=StudentLogin?>" id="link">
                            <div class="col-12 text-center"
                                style="border:1px solid #ddd; padding:15px; border-radius:3px;">
                                <span><i class="fa fa-users fa-3x"
                                        style="padding-bottom:10px; color:#2383ad;"></i></span>
                                <h2>Student Login Portal</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 app-btn-cta">
                        <a href="<?=ROOT?>Application/InitiateOnlinePayment" id="link">
                            <div class="col-12 text-center"
                                style="border:1px solid #ddd; padding:15px; border-radius:3px;">
                                <span><i class="fa fa-credit-card fa-3x"
                                        style="padding-bottom:10px; color:#2383ad;"></i></span>
                                <h2>Pay Application Fee Online</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div><!-- end row div here -->
        </div><!-- end container div here -->
        <div class="container-fluid" style="margin-top: 70px; margin-bottom: 30px;">
            <div class="row text-center">
                <div class="col-12 cta-btn">
                    <a href="<?=ROOT?>Application/EntryRequirements/">
                        <button class="btn btn-danger btn-sm" type="button">Click To View Programmes&#39; Entry
                            Requirements</button>
                    </a>
                    <br class="clear" />
                </div>
            </div>
        </div>
    </div><!-- end content div here -->
    <br class="clear" />
    <!-- begin popup content -->
    <!-- end popup -->
    <!-- End Body --><br />
    <!-- footer div starts here -->
    <div class="container footer-wrap footerContent">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-sm-6 footer-left pull-left">
                    <p style="color:#b9b9b9;">&copy; All Right Reserved</p> 
                </div>
                <div class="col-sm-6 text-right footer-right pull-right">
                    <p style="color:#b9b9b9;">Powered by <a href="<?=ROOT?>" style="text-decoration:none"><?=Developer?></a></p>     
                </div>
            </div>
        </div>
    </div>
    <!-- footer div ends here -->
</body>

</html>