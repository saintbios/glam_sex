<!DOCTYPE html>
<html lang="en">
<head>
	<!--<link href='https://fonts.googleapis.com/css?family=Signika:400,700|Open+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>-->
    <meta charset="UTF-8">
	<title>Test home</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap/3.3.6/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/global.css">

	<script src="assets/js/jquery/1.x/jquery-1.12.3.js" crossorigin="anonymous"></script>
    <!--<script src="https://code.jquery.com/jquery-1.12.3.min.js"-->
	<!-- Latest compiled and minified JavaScript -->
	<script src="assets/js/bootstrap/3.3.6/bootstrap.min.js"></script>
    <script>
    $('btnShowFilms').click(function(){

    });

    $('btnShowPhotos').click(function(){
        showPhotoGalleries();
    });

    $('btnShowModels').click(function(){
        alert('btnShowModels');
        showModels();
    });

    function showModels() {
        alert('showModels');
        $('galeriesContainer').hide();
        $('modelsContainer').show();
    }

    function showPhotoGalleries() {
        alert('showGalleries');
        $('modelsContainer').hide();
        $('galeriesContainer').show();
    }

    </script>
</head>
<body>
	<div class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="/" class="navbar-brand" title="Phrase cool">
                    LOGO
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
            		<li><a href="#">PHOTOS</a></li>
            		<li><a href="#">MODELS</a></li>
            		<li><a href="#">FILMS</a></li>
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

    <div class="container">
        <div class="jumbotron">
            
            <h3>
                Glam-sex.com <small>provides you the best glamorous nude art content from the world known website MetArt.com !</small>
                <br>
                <small>On Glam-sex, you'll have access to over </small>3,000 models <small>, more than </small>12,000 picture galleries<small> and over </small>1,200 high quality films<small> available in </small>Full HD !
                <br><br>
                <strong>And to access to the unlimited glamorous nude on MetArt, <a href="">click here</a> !</strong>
            </h3>
        </div>    
    </div>
    
    <div class="container categories-container">
        <div class="category-container" id="btnShowFilms" onclick="alert('toto');">
        FILMS
        </div>

        <div class="category-container" id="btnShowModels" onclick="showModels();">
            MODELS
        </div>

        <div class="category-container" id="btnShowPhotos">
            PHOTOS
        </div>
    </div>
    
    <div id="galeriesContainer">
    <div class="container">
        <div class="element-list">
            <ul class="list-inline list-unstyled">
                <?php
                foreach($photoGalleries as $photoGallery) {
                ?>
                    <li class="gallery-img-container" onmouseover="$('1').show();" onmouseout="$('1').hide();">
                        <a href="#">
                            <!-- GALLERY NAME ON HOVER-->
                            <div class="additional-info-thumbnail-hover" id="1">
                                <div>
                                    <span><?php echo($photoGallery->name);?></span>
                                    <span>By Catherine</span>
                                </div>
                            </div>
                            
                            <img class="img-responsive" src="assets/images/galleries/<?php echo($photoGallery->id);?>/glam-sex_<?php echo($photoGallery->id);?>_cover.jpg" alt="<?php echo($photoGallery->name);?>">
                        </a>
                        <div class="additional-info-thumbnail-under">
                            <div class="additional-info-thumbnail-under-model">
                                <a href="#"><?php echo($photoGallery->name);?></a>
                            </div>
                            <div class="additional-info-thumbnail-under-cplt">
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
    </div>

    <div class="container" id="modelsContainer">
        <div class="element-list">
            <ul class="list-inline list-unstyled">
                <?php
                foreach($models as $key => $model) {
                    ?>
                    <li class="model-img-container" onmouseover="" onmouseout="">
                        <a href="model/<?php echo($model->id);?>">
                            <!-- GALLERY NAME ON HOVER-->
                            <div class="additional-info-thumbnail-hover" id="<?php echo($model->id);?>">
                                <div>
                                    <span><?php echo($model->name);?></span>
                                </div>
                            </div>
                            
                            <img class="img-responsive" src="assets/images/models/<?php echo($model->id);?>/glam-sex_<?php echo($model->id);?>_headshot.jpg" alt="<?php echo($model->name);?>">
                        </a>
                        <div class="additional-info-thumbnail-under">
                            <div class="additional-info-thumbnail-under-model">
                                <a href="model/<?php echo($model->id);?>"><?php echo($model->name);?></a>
                            </div>
                            <div class="additional-info-thumbnail-under-cplt">
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

    <div class="container friendly-sites">
        <h4 class="section-title center">Top friendly sites</h4>
        <div class="custom-content-list">
            <ul class="list-inline list-unstyled">
                <li class="thumbnail-container">
                    <a href="#">
                        <img src="assets/images/default_friend.jpg" class="img-thumbnail" alt="">
                    </a>
                    <div>
                        <span>
                            <a href="#">Site1.com</a>
                        </span>
                    </div>
                </li>
                <li class="thumbnail-container">
                    <a href="#">
                        <img src="assets/images/default_friend.jpg" class="img-thumbnail" alt="">
                    </a>
                    <div>
                        <span>
                            <a href="#">Site2.com</a>
                        </span>
                    </div>
                </li>
                <li class="thumbnail-container">
                    <a href="#">
                        <img src="assets/images/default_friend.jpg" class="img-thumbnail" alt="">
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
<script type="text/javascript">
showModels();
</script>
</html>



