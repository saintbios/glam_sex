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
    <title>Profile of <?php echo $model->name;?> - Sexy node erotic model</title>
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/bootstrap/3.3.6/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/global.css');?>">
    <script src="<?php echo site_url('/assets/js/jquery/1.x/jquery-1.12.3.js');?>" crossorigin="anonymous"></script>
    <script src="<?php echo site_url('/assets/js/bootstrap/3.3.6/bootstrap.min.js');?>"></script>
    <script src="<?php echo site_url('/assets/js/jtruncate.js');?>"></script>
    <script>
        $().ready(function() {  
            $('#gallery-description').jTruncate({
              length: 300,
              minTrail: 20,
              moreText: "Show more",
              lessText: "Hide",
              ellipsisText: "...",
              moreAni: 0,
              lessAni: 0
             });
        });
    </script>
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
    
    <div class="panel-group container model-header-panels">
        <div class="panel model-panel">
            <div class="panel-heading">
                <h3><?php echo $model->name;?></h3>
            </div>
            <div class="panel-body">
                <div class="gallery-cover">
                    <img class="img-responsive gallery-img" src="<?php echo site_url('/assets/images/models/'.$model->id.'/glam-sex_'.$model->id.'_headshot.jpg');?>">
                </div>
                <div class="gallery-model-infos">
                    <div class="model-details-title"><?php echo $model->name;?>'s personnal details :</div>
                    <div class="model-details">
                        <span class="model-details-label">Eye color</span>
                        <span class="model-details-value">: <?php echo $model->eye_color->label;?></span>
                    </div>
                    <div class="model-details">
                        <span class="model-details-label">Hair color</span>
                        <span class="model-details-value">: <?php echo $model->hair_color->label;?></span>
                    </div>
                    <div class="model-details">
                        <span class="model-details-label">Breasts</span>
                        <span class="model-details-value">: <?php echo $model->breasts_type->label;?></span>
                    </div>
                    <div class="model-details">
                        <span class="model-details-label">Shaved</span>
                        <span class="model-details-value">: <?php echo $model->shaved_type->label;?></span>
                    </div>
                    <div class="model-details">
                        <span class="model-details-label">Ethnicity</span>
                        <span class="model-details-value">: <?php echo $model->ethnicity->label;?></span>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="model-description">
                    <div style="width:100%;border-bottom:1px solid #DDD;margin-bottom:10px">Biography :</div>
                    <?php
                    if(($model->bio == "") || ($model->bio == 0)) {
                        echo '<p>' . $model->name . ' has not written her biography yet.</p>';
                    } else {
                        echo '<p>' . $model->bio . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="full-access text-center">
        Get the movies and photos in <strong>HD quality and full version</strong> on Metart.com !
    </div>
    <div class="text-center">
        <a href="http://access.met-art.com/track/1025.MA.1.2.5.0.0/signup/" target="_blank"><button type="button" class="btn btn-primary text-uppercase btn-full-access"><strong>Join now to get the full access</strong></button></a>
        <a href="http://access.met-art.com/track/1025.MA.1.2.5.0.0/" target="_blank"><button type="button" class="btn btn-primary text-uppercase btn-full-access"><strong>Take a free tour on Metart.com</strong></button></a>
    </div>

    <div class="panel container model-galleries-panel">
        <?php
        if($filmGalleries) {
        ?>
        <h3>Movies starring <?php echo $model->name;?> :</h3>
        <div id="filmsContainer" class="container">
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
                                    <a href="<?php echo site_url('/film/' . $filmGallery->id . '/' . UtilsMetArt::toAscii($filmGallery->name));?>"><?php echo($filmGallery->name);?></a>
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
        <?php
        }
        if($photoGalleries) {
        ?>
        <h3>Photo galleries starring <?php echo $model->name;?> :</h3>
        <div id="photosContainer" class="container">
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
                                    <a href="<?php echo site_url('/model/' . $model->id . '/' . UtilsMetArt::toAscii($model->name));?>"><?php echo($photoGallery->name);?></a>
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
        <?php
        }
        ?>
    </div>

    <div class="full-access text-center">
        Get the movies and photos in <strong>HD quality and full version</strong> on Metart.com !
    </div>
    <div class="text-center">
        <a href="http://access.met-art.com/track/1025.MA.1.2.5.0.0/signup/" target="_blank"><button type="button" class="btn btn-primary text-uppercase btn-full-access"><strong>Join now to get the full access</strong></button></a>
        <a href="http://access.met-art.com/track/1025.MA.1.2.5.0.0/" target="_blank"><button type="button" class="btn btn-primary text-uppercase btn-full-access"><strong>Take a free tour on Metart.com</strong></button></a>
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