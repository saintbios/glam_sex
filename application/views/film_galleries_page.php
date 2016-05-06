<!DOCTYPE html>
<html lang="en">
<head>
	<?php
        $this->load->view('head');
    ?>
    <title>Glam-sex : browse all the nude photo galleries.</title>
</head>
<body>
    <?php
        $this->load->view('header');
    ?>
    
    <div class="panel-container container galleries-panel">
        <h3>All movies</h3>
        <div class="text-center pagination-list">
            <?php
                $nbPages = floor($_SESSION['nbActiveFilmGalleries']->nbActive/$_SESSION['itemsPerPage'])+1;
                for($i = 1; $i <= $nbPages; $i++) {
                    if($i == $activePage) {
                        echo '<span class="activePageNumber">' . $i . '</span>';
                        if($i != $nbPages) {
                            echo ' - ';
                        }
                    } else {
                        ?>
                       <a href="<?php echo site_url('/galleries/films/' . $i);?>"><?php echo $i;?></a>
                        <?php
                        if($i != $nbPages) {
                            echo ' - ';
                        }
                    }
                }
            ?>
        </div>
        <div id="filmsContainer">
            <div class="element-list">
                <ul class="list-inline list-unstyled">
                    <?php
                    foreach($galleries as $filmGallery) {
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

        <div class="text-center pagination-list">
            <?php
                for($i = 1; $i <= $nbPages; $i++) {
                    if($i == $activePage) {
                        echo '<span class="activePageNumber">' . $i . '</span>';
                        if($i != $nbPages) {
                            echo ' - ';
                        }
                    } else {
                        ?>
                       <a href="<?php echo site_url('/galleries/films/' . $i);?>"><?php echo $i;?></a>
                        <?php
                        if($i != $nbPages) {
                            echo ' - ';
                        }
                    }
                }
            ?>
        </div>
    </div>
    

    <?php
        $this->load->view('footer');
    ?>
</body>
</html>