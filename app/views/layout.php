<?php
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/5
 * Time: 下午6:07
 */
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.png">

    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/font-awesome.min.css">


    <script src="/public/js/jquery-2.1.0.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>
    <script src="/public/js/blocs.min.js"></script>
    <script src="/public/js/lazysizes.min.js" defer></script>
    <title>Home</title>


    <!-- Google Analytics -->

    <!-- Google Analytics END -->

</head>
<body>
<!-- Main container -->
<div class="page-container">

    <!-- bloc-0 -->
    <div class="bloc l-bloc bgc-white none" id="bloc-0">
        <div class="container bloc-sm">
            <nav class="navbar row">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/"><img src="/public/img/logo.png" alt="logo" />My Blog</a>
                    <button id="nav-toggle" type="button" class="ui-navbar-toggle navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-1 special-dropdown-nav">
                    <ul class="site-navigation nav navbar-nav animated fadeInRight none">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="/contract">Contract</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- bloc-0 END -->

    <!-- bloc-1 -->
    <?php include $content;?>
    <!-- bloc-1 END -->

    <!-- ScrollToTop Button -->
    <a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1')"><span class="fa fa-chevron-up"></span></a>
    <!-- ScrollToTop Button END-->


    <!-- Footer - bloc-4 -->
    <div class="bloc bgc-white l-bloc" id="bloc-4">
        <div class="container bloc-lg">
            <div class="row">
                <div class="col-sm-3">
                    <h3 class="mg-md bloc-mob-center-text">
                        About
                    </h3><a href="index.html" class="a-btn a-block bloc-mob-center-text">The team</a><a href="index.html" class="a-btn a-block bloc-mob-center-text">Contact us</a>
                </div>
                <div class="col-sm-3">
                    <h3 class="mg-md bloc-mob-center-text">
                        Get the App
                    </h3><a href="index.html" class="a-btn a-block bloc-mob-center-text">iPhone</a><a href="index.html" class="a-btn a-block bloc-mob-center-text">Android</a>
                </div>
                <div class="col-sm-3">
                    <h3 class="mg-md bloc-mob-center-text">
                        Follow Us
                    </h3><a href="index.html" class="a-btn a-block bloc-mob-center-text">Twitter</a><a href="index.html" class="a-btn a-block bloc-mob-center-text">Facebook</a>
                </div>
                <div class="col-sm-3">
                    <h3 class="mg-md bloc-mob-center-text">
                        Company
                    </h3><a href="index.html" class="a-btn a-block bloc-mob-center-text">Terms of use</a><a href="index.html" class="a-btn a-block bloc-mob-center-text">Privacy</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer - bloc-4 END -->

</div>
<!-- Main container END -->


</body>
</html>

