<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?php echo $title?></title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/favicon.ico" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700%7CPoppins:400,400i,500,600&display=swap" rel="stylesheet">

    <!-- build:css assets/css/app.min.css -->
    <!--== Leaflet Min CSS ==-->
    <link href="<?php echo base_url()?>assets/css/leaflet.min.css" rel="stylesheet" />
    <!--== Nice Select Min CSS ==-->
    <link href="<?php echo base_url()?>assets/css/nice-select.min.css" rel="stylesheet" />
    <!--== Slick Slider Min CSS ==-->
    <link href="<?php echo base_url()?>assets/css/slick.min.css" rel="stylesheet" />
    <!--== Magnific Popup Min CSS ==-->
    <link href="<?php echo base_url()?>assets/css/magnific-popup.min.css" rel="stylesheet" />
    <!--== Slicknav Min CSS ==-->
    <link href="<?php echo base_url()?>assets/css/slicknav.min.css" rel="stylesheet" />
    <!--== Animate Min CSS ==-->
    <link href="<?php echo base_url()?>assets/css/animate.min.css" rel="stylesheet" />
    <!--== Ionicons Min CSS ==-->
    <link href="<?php echo base_url()?>assets/css/ionicons.min.css" rel="stylesheet" />
    <!--== Font-Awesome Min CSS ==-->
    <link href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--== Bootstrap Min CSS ==-->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--== Main Style CSS ==-->
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" />
    <!--== Helper Min CSS ==-->
    <link href="<?php echo base_url()?>assets/css/helper.min.css" rel="stylesheet" />
    

    <!-- endbuild -->

    <!--[if lt IE 9]>
<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

                            
    <!--== Start Header Area ==-->
    <header class="header-area">
        <div class="container container-wide">
            <div class="row align-items-center">
                <div class="col-sm-4 col-lg-2">
                    <div class="site-logo text-center text-sm-left">
                        <br>
                        <a href="<?php echo base_url()?>"><h2 style="font-family: cursive; color: #ff9200;">Re<span style="color: #000e00">cipe...!</span></h2></a>
                    </div>
                </div>
                
                <div class="col-lg-10 d-none d-lg-block">
                    <div class="site-navigation" style="float: right">
                        <br>
                        <ul class="main-menu nav">
                            <li><?php if($this->session->flashdata('login')) :?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $this->session->flashdata('login')?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php endif;?></li>
                            <li><?php if($this->session->flashdata('danger')) :?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?php echo $this->session->flashdata('danger')?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php endif;?></li>
                            <li><a href="<?php echo base_url()?>gallery">Recipe Gallery</a></li>
                            <li class="has-submenu"><a href="<?php echo base_url()?>tips">Tips & tricks</a></li>
                            <li class="has-submenu"><a href="<?php echo base_url()?>contact">Contact</a></li>
                            <li><a target="_blank" href="<?php echo base_url()?>log">Login</a></li>
                           
                            
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </header>
    <!--== End Header Area ==-->
    
    <!--== Start Page Header Area ==-->
    <div class="page-header-wrap bg-img">
        <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-content">
                        <div class="page-header-content-inner">
                            <img style="height: 300px; width: 1100px; border-radius: 5px; box-shadow: #000e00 5px 5px 5px 5px;"  src="<?php echo base_url()?>assets/img/wk51-foodforlater-landingpagebanner-1900x400.jpg">
                            </div>
                    </div>
                </div>
            </div>
        </div>
   
    <!--== End Page Header Area ==-->