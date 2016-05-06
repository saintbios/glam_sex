<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $this->load->view('head');
    ?>
	<title>Glam-sex : Pretty, beautiful, radiant as the sun. Discover our sexy models, nude galleries and erotic movies.</title>
</head>
<body>
    <?php
        $this->load->view('header');
    ?>
    
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
                                    <a href="<?php echo site_url('/model/' . $photoGallery->modelId . '/' . UtilsMetArt::toAscii($photoGallery->modelName));?>"><?php echo($photoGallery->modelName);?></a>
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
                                <div class="additional-info-thumbnail-under-model col-xs-12 col-lg-6">
                                    <a href="<?php echo site_url('/model/'.$model->id.'/'.UtilsMetArt::toAscii($model->name));?>"><?php echo($model->name);?></a>
                                </div>
                                <div class="additional-info-thumbnail-under-cplt col-xs-12 col-lg-6">
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

    <?php
        $this->load->view('footer');
    ?>
</body>
</html>