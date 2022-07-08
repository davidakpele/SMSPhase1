<!DOCTYPE html>
<html <html lang="en">

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
    <link type="text/css" rel="stylesheet" href="<?=ASSETS?>css/structure.css" />
    <link rel="stylesheet" href="<?=ASSETS?>css/font-awesome/css/all.css" />
    <link rel="stylesheet" href="<?=ASSETS?>css/header.css" type="text/css" media="all"/>
    <link rel="manifest" href="<?=ASSETS?>js/manifest.json" />
    <style type="text/css">
    .panel {
        max-width: 960px;
        width: 100%;
        margin: 0 auto;
    }
    @media screen and (max-width: 960px) {
        .panel {
            width: 90% !important;
        }
    }
    </style>
    <script type="text/javascript" src="<?=ASSETS?>js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="<?=ASSETS?>js/bootstrap.js"></script>
    <script type="text/javascript">
        let base_url= '<?=ROOT?>';
    </script>
</head>

<body style="font-size: 14px; font-family: 'Exo 2'/*'Bookman Old Style'*/">
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
                <div class="float-right">
                    <div class="horizontal-list">
                        <ul>
                        </ul>
                    </div>
                </div>
                <br class="clear" />
            </div>
            <!-- end row here -->
        </div>
        <!-- close container -->
    </div>
    <div class="single" style="padding-bottom: 90px;padding-left: 20px;padding-right: 20px;">
        <div class="panel">
            <h2 class="h-1">Check Any Programme Requirements</h2>
            <div class="panel-in">
                <form method="POST" class="form-horizontal form-group">
                    <div class="form-ui-panel">
                        <div class="pane form-group">
                            <label id="apptypelabel" class="col-sm-12 col-md-3 col-lg-3 make-full">ApplicationType
                                :</label>
                            <div class="col-sm-12 col-md-9 col-lg-9 select-drop-down">
                                <select class="form-control" name="App" id="App"
                                    style="width:75%;">
                                    <option selected="" disabled value="">--Select--</option>
                                    <?php foreach ($data['DisplayCateogries'] as $stmt): ?>

                                    <option id="<?=$stmt['Category__ID']?>" value="<?=$stmt['Category__ID']?>">
                                        <?=$stmt['Category__name']?> </option>
                                    <?php endforeach;?>

                                </select>
                            </div>
                        </div>
                        <div class="pane form-group">
                            <label class="col-sm-12 col-md-3 col-lg-3 make-full">Programme :</label>
                            <div class="col-sm-12 col-md-9 col-lg-9 select-drop-down">
                                <select name="Program__Type" id="Program__Type" class="form-control" style="width:75%;">
                                    <option value="" selected="" disabled="">--select--</option>
                                </select>
                            </div>
                        </div>
                        <div id="generaldiv">
                            <div id="RequirementDiv"></div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <!-- footer div starts here -->
     <div class="container footer-wrap footerContent">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-sm-6 footer-left pull-left">
                    <p style="color:#b9b9b9;">&copy; All Right Reserved</p> 
                </div>
                <div class="col-sm-6 text-right footer-right pull-right">
                    <p style="color:#b9b9b9;">Powered by <a href="<?=ROOT?>" style="text-decoration:none; color:#337ab7"><?=Developer?></a></p>     
                </div>
            </div>
        </div>
    </div>
    <!-- footer div ends here -->
    <script type="text/javascript" src="<?=ASSETS?>js/Data.js"></script>
</body>

</html>