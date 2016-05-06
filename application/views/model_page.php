<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $this->load->view('head');
    ?>
    <title>Profile of <?php echo $model->name;?> - Sexy node erotic model</title>
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
</head>
<body>
    <?php
        $this->load->view('header');
    ?>
    
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
                    if(strlen($model->bio) <= 1) {
                        echo '<p>' . $model->name . ' has not written her biography yet.</p>';
                    } else {
                        echo '<p>' . stripslashes ($model->bio) . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="full-access text-center">
        Get the movies and photos in <strong>Full HD quality and full version</strong> on Metart.com !
    </div>
    <div class="text-center">
        <a href="http://access.met-art.com/track/1025.MA.1.2.5.0.0/signup/" target="_blank"><button type="button" class="btn btn-primary text-uppercase btn-full-access"><strong>Join now to get a full access</strong></button></a>
        <a href="http://access.met-art.com/track/1025.MA.1.2.5.0.0/" target="_blank"><button type="button" class="btn btn-primary text-uppercase btn-full-access"><strong>Take a free tour on Metart.com</strong></button></a>
    </div>

    <div class="panel-container container galleries-panel">
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
                                <img class="img-responsive" src="<?php echo site_url('/assets/images/galleries/' . $filmGallery->id . '/glam-sex_' . $filmGallery->id . '_cover.jpg');?>" alt="Erotic nude movie : <?php echo($filmGallery->name);?>" title="Erotic nude movie : <?php echo($filmGallery->name);?>">
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
                                <img class="img-responsive" src="<?php echo site_url('/assets/images/galleries/' . $photoGallery->id . '/glam-sex_' . $photoGallery->id . '_cover.jpg');?>" alt="Erotic nude gallery : <?php echo($photoGallery->name);?>" title="Erotic nude gallery : <?php echo($photoGallery->name);?>">
                            </a>
                            <div class="additional-info-thumbnail-under row">
                                <div class="additional-info-thumbnail-under-model col-xs-12 col-md-6">
                                    <a href="<?php echo site_url('/photos/'.$photoGallery->id.'/'.UtilsMetArt::toAscii($photoGallery->name));?>"><?php echo($photoGallery->name);?></a>
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
        Get the movies and photos in <strong>Full HD quality and full version</strong> on Metart.com !
    </div>
    <div class="text-center">
        <a href="http://access.met-art.com/track/1025.MA.1.2.5.0.0/signup/" target="_blank"><button type="button" class="btn btn-primary text-uppercase btn-full-access"><strong>Join now to get a full access</strong></button></a>
        <a href="http://access.met-art.com/track/1025.MA.1.2.5.0.0/" target="_blank"><button type="button" class="btn btn-primary text-uppercase btn-full-access"><strong>Take a free tour on Metart.com</strong></button></a>
    </div>    

    <?php
        $this->load->view('footer');
    ?>
</body>
</html> 