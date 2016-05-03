<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $CI =& get_instance();
        $CI->load->helper('url');
    ?>
	<link href='https://fonts.googleapis.com/css?family=Signika:400,700|Open+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Glam-sex : Pretty, beautiful, radiant as the sun. Discover our sexy models, nude galleries and erotic movies.</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo site_url('/assets/css/bootstrap/3.3.6/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/global.css');?>">

	<script src="<?php echo site_url('/assets/js/jquery/1.x/jquery-1.12.3.js');?>" crossorigin="anonymous"></script>
    <!--<script src="https://code.jquery.com/jquery-1.12.3.min.js"-->
	<!-- Latest compiled and minified JavaScript -->
	<script src="<?php echo site_url('/assets/js/bootstrap/3.3.6/bootstrap.min.js');?>"></script>
    <?php require("application/libraries/UtilsMetArt.php");?>
</head>
<body>
	<div class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="<?php echo site_url();?>" class="navbar-brand gs-logo" title="Pretty, beautiful, radiant as the sun.">
                    <img src="<?php echo site_url('/assets/images/logo.png');?>">
                </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            </div>

            <div class="collapse navbar-collapse" id="example-navbar-collapse">
            	<ul class="nav navbar-nav">
            		<li><a href="#">FILMS</a></li>
            		<li><a href="#">MODELS</a></li>
            		<li><a href="#">PHOTOS</a></li>
            	</ul>
            <form action="" class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search for galleries, models...">
                    <button class="btn btn-default">Search</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    
    <div class="container categories-container">
        <ul class="nav nav-pills">
            <li data-toggle="tab" href="#filmsContainer" class="category-container active">
                <div style="position:absolute;width:100%;text-align:center;top:20%">
                    <span class="btn-category-container">FILMS</span>
                </div>
                <div>
                    <img style="width:100%; height:auto; desplay:block" src="<?php echo site_url('/assets/images/home/btn_films.jpg');?>">
                </div>
            </li>

            <li data-toggle="tab" href="#modelsContainer" class="category-container">
                <div style="position:absolute;width:100%;text-align:center;top:20%">
                    <span class="btn-category-container">MODELS</span>
                </div>
                <div>
                    <img style="width:100%; height:auto; desplay:block" src="<?php echo site_url('/assets/images/home/btn_models.jpg');?>">
                </div>
            </li>

            <li data-toggle="tab" href="#photosContainer"class="category-container">
                <div style="position:absolute;width:100%;text-align:center;top:20%">
                    <span class="btn-category-container">PHOTOS</span>
                </div>
                <div>
                    <img style="width:100%; height:auto; desplay:block" src="<?php echo site_url('/assets/images/home/btn_photos.jpg');?>">
                </div>
            </li>
        </ul>
    </div>
    <div class="tab-content">
        <div id="filmsContainer" class="container tab-pane fade in active">
            <div class="element-list">
                <ul class="list-inline list-unstyled">
                    <?php
                    foreach($filmGalleries as $filmGallery) {
                    ?>
                        <li class="gallery-img-container">
                            <a href="<?php echo site_url('/film/' . $filmGallery->id . '/' . UtilsMetArt::toAscii($filmGallery->name));?>">
                                <img class="img-responsive" src="<?php echo site_url('/assets/images/galleries/' . $filmGallery->id . '/glam-sex_' . $filmGallery->id . '_cover.jpg');?>" alt="<?php echo($filmGallery->name);?>">
                            </a>
                            <div class="additional-info-thumbnail-under row">
                                <div class="additional-info-thumbnail-under-model col-xs-12 col-md-6">
                                    <a href="<?php echo site_url('/model/' . $filmGallery->modelId . '/' . UtilsMetArt::toAscii($filmGallery->modelName));?>"><?php echo($filmGallery->modelName);?></a>
                                </div>
                                <div class="additional-info-thumbnail-under-cplt col-xs-12 col-md-6">
                                    <span class=""><?php echo(date('M d, Y', strtotime($filmGallery->date)));?></span>
                                </div>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div id="photosContainer" class="container tab-pane fade">
            <div class="element-list">
                <ul class="list-inline list-unstyled">
                    <?php
                    foreach($photoGalleries as $photoGallery) {
                    ?>
                        <li class="gallery-img-container">
                            <a href="<?php echo site_url('/photos/'.$photoGallery->id.'/'.UtilsMetArt::toAscii($photoGallery->name));?>">
                                <img class="img-responsive" src="<?php echo site_url('/assets/images/galleries/' . $photoGallery->id . '/glam-sex_' . $photoGallery->id . '_cover.jpg');?>" alt="<?php echo($photoGallery->name);?>">
                            </a>
                            <div class="additional-info-thumbnail-under row">
                                <div class="additional-info-thumbnail-under-model col-xs-12 col-md-6">
                                    <a href="<?php echo site_url('/model/' . $filmGallery->modelId . '/' . UtilsMetArt::toAscii($filmGallery->modelName));?>"><?php echo($filmGallery->modelName);?></a>
                                </div>
                                <div class="additional-info-thumbnail-under-cplt col-xs-12 col-md-6">
                                    <span class=""><?php echo(date('M d, Y', strtotime($photoGallery->date)));?></span>
                                </div>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        
        <div id="modelsContainer" class="container tab-pane fade">
            <div class="element-list">
                <ul class="list-inline list-unstyled">
                    <?php
                    foreach($models as $key => $model) {
                        ?>
                        <li class="model-img-container">
                            <a href="<?php echo site_url('/model/'.$model->id.'/'.UtilsMetArt::toAscii($model->name));?>">
                                <img class="img-responsive" src="<?php echo site_url('/assets/images/models/' . $model->id . '/glam-sex_' . $model->id . '_headshot.jpg');?>" alt="<?php echo($model->name);?>">
                            </a>
                            <div class="additional-info-thumbnail-under row">
                                <div class="additional-info-thumbnail-under-model col-xs-12 col-md-6">
                                    <a href="<?php echo site_url('/model/'.$model->id.'/'.UtilsMetArt::toAscii($model->name));?>"><?php echo($model->name);?></a>
                                </div>
                                <div class="additional-info-thumbnail-under-cplt col-xs-12 col-md-6">
                                    <span class="">Apr 18, 2016</span>
                                </div>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="container friendly-sites">
        <h4 class="section-title center">Top friendly sites</h4>
        <div class="custom-content-list">
            <ul class="list-inline list-unstyled">
                <li class="thumbnail-container">
                    <a href="#">
                        <img src="<?php echo site_url('/assets/images/default_friend.jpg');?>" class="img-thumbnail" alt="">
                    </a>
                    <div>
                        <span>
                            <a href="#">Site1.com</a>
                        </span>
                    </div>
                </li>
                <li class="thumbnail-container">
                    <a href="#">
                        <img src="<?php echo site_url('/assets/images/default_friend.jpg');?>" class="img-thumbnail" alt="">
                    </a>
                    <div>
                        <span>
                            <a href="#">Site2.com</a>
                        </span>
                    </div>
                </li>
                <li class="thumbnail-container">
                    <a href="#">
                        <img src="<?php echo site_url('/assets/images/default_friend.jpg');?>" class="img-thumbnail" alt="">
                    </a>
                    <div>
                        <span>
                            <a href="#">Site3.com</a>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- Footer -->
    <div class="footer text-center navbar-inverse">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="section-title center">Top friendly sites</h4>
                </div>
            </div>
        </div>
    </div>
</body>
</html>