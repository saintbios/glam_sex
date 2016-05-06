<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $this->load->view('head');
    ?>
	<title>Glam-sex : browse all our sexy models, access to the nude galleries and erotic movies.</title>
</head>
<body>
    <?php
        $this->load->view('header');
    ?>
    <div class="panel-container container galleries-panel">
        <h3>All models</h3>
        <div class="text-center pagination-list">
            <?php
                $nbPages = floor($_SESSION['nbActiveModels']->nbActive/$_SESSION['itemsPerPage'])+1;
                for($i = 1; $i <= $nbPages; $i++) {
                    if($i == $activePage) {
                        echo '<span class="activePageNumber">' . $i . '</span>';
                        if($i != $nbPages) {
                            echo ' - ';
                        }
                    } else {
                        ?>
                       <a href="<?php echo site_url('/models/' . $i);?>"><?php echo $i;?></a>
                        <?php
                        if($i != $nbPages) {
                            echo ' - ';
                        }
                    }
                }
            ?>
        </div>
        <div id="modelsContainer" class="container">
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
                       <a href="<?php echo site_url('/models/' . $i);?>"><?php echo $i;?></a>
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