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
        <h3>Results for "<?php echo $searchValueClean;?>"</h3>
        <div class="text-center pagination-list">
            <?php
                if(count($galleries) > 0) {
                    $nbPages = floor($_SESSION['nbSearchResults']->nbSearchResults/$_SESSION['itemsPerPage'])+1;
                    for($i = 1; $i <= $nbPages; $i++) {
                        if($i == $activePage) {
                            echo '<span class="activePageNumber">' . $i . '</span>';
                            if($i != $nbPages) {
                                echo ' - ';
                            }
                        } else {
                            ?>
                           <a href="<?php echo site_url('/galleries/search/' . $i . '?searchvaluesanitized=' . $searchValue);?>"><?php echo $i;?></a>
                            <?php
                            if($i != $nbPages) {
                                echo ' - ';
                            }
                        }
                    }
                }
            ?>
        </div>
        <div id="photosContainer" class="container">
            <div class="element-list">
                <ul class="list-inline list-unstyled">
                    <?php
                    if(count($galleries) == 0)
                        echo '<div class="text-center">No result, please try another search.</div>';
                    foreach($galleries as $photoGallery) {
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

        <div class="text-center pagination-list">
            <?php
                if(count($galleries) > 0) {
                    for($i = 1; $i <= $nbPages; $i++) {
                        if($i == $activePage) {
                            echo '<span class="activePageNumber">' . $i . '</span>';
                            if($i != $nbPages) {
                                echo ' - ';
                            }
                        } else {
                            ?>
                           <a href="<?php echo site_url('/galleries/search/' . $i . '?searchvaluesanitized=' . $searchValue);?>"><?php echo $i;?></a>
                            <?php
                            if($i != $nbPages) {
                                echo ' - ';
                            }
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