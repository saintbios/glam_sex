<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $this->load->view('head');
    ?>
    <title>Erotic sex movie "<?php echo $film->name;?>" starring <?php echo $model->name;?></title>
    <script src="<?php echo site_url('/assets/js/jtruncate.js');?>"></script>
</head>
<body>
    <?php
        $this->load->view('header');
    ?>
    
    <div class="panel-container container player-container">
        <div class="film-title">
            <h3><?php echo $film->name;?><small> - Starring </small><?php echo $model->name;?><small> - Published on <?php echo $film->date;?></small></h3>
        </div>
        
        <div  id="divEmbed" class="embed-responsive embed-responsive-16by9">
           <img src="https://static.metart.com/media/<?php echo $film->metart_id;?>/wide_<?php echo $film->metart_id;?>.jpg">
        </div>
        <div class="btn-lecture-container">
            <img onclick="javascript:changeEmbedSrc();" class="btn-lecture" src="<?php echo site_url('/assets/images/common/play_btn.png');?>">
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
        <h3>Other movies starring <?php echo $model->name;?> :</h3>
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