<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $this->load->view('head');
    ?>
    <title>Erotic nude photos of <?php echo $model->name;?> - shooting "<?php echo $gallery->name;?>"</title>
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
    
    <div class="panel-group container gallery-header-panels">
        <div class="panel gallery-panel">
            <div class="panel-heading">
                <h3><?php echo $gallery->name;?> <small>Published on <?php echo $gallery->date;?></small></h3>
            </div>
            <div class="panel-body">
                <div class="gallery-cover">
                    <a href="#" data-toggle="modal" data-target="#modalCover">
                        <img class="img-responsive gallery-img" src="<?php echo site_url('/assets/images/galleries/'.$gallery->id.'/glam-sex_'.$gallery->id.'_cover.jpg');?>">
                    </a>
                </div>
                <div class="gallery-quote">
                    <blockquote>
                        <p><?php echo $gallery->short_description;?></p>
                        <footer>Metart.com</footer>
                    </blockquote>
                </div>
                <div class="clearfix"></div>
                <div class="gallery-description" id="gallery-description">
                    <div style="width:100%;border-bottom:1px solid #DDD;margin-bottom:10px">Photograph :</div>
                    <?php
                        echo $gallery->photographerName;                    
                    ?>
                </div>
            </div>
        </div>
        <div class="panel gallery-panel">
            <div class="panel-heading">
                <h3><small>Starring</small> <?php echo $model->name;?></h3>
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
        This gallery contains <strong><?php echo $gallery->number_of_pics;?> Full HD nude photos</strong> on its full version on Metart.com !
    </div>
    <div class="text-center">
        <a href="http://access.met-art.com/track/1025.MA.1.2.5.0.0/signup/" target="_blank"><button type="button" class="btn btn-primary text-uppercase btn-full-access"><strong>Join now to get a full access</strong></button></a>
        <a href="http://access.met-art.com/track/1025.MA.1.2.5.0.0/" target="_blank"><button type="button" class="btn btn-primary text-uppercase btn-full-access"><strong>Take a free tour on Metart.com</strong></button></a>
    </div>

    <div class="panel container element-list gallery-img-list-container">
        <ul class="list-unstyled list-inline">
            <?php
            for($i=1; $i<$gallery->number_of_pics_fhg; $i++) {
                echo '<li><a href="#" data-toggle="modal" data-target="#modalPhotos" id="thumbnail_' . $i . '" onclick="javascript:updateActiveSlider(' . $i . ')"><img class="img-responsive gallery-img" src="'.site_url('/assets/images/galleries/'.$gallery->id.'/glam-sex_'.$gallery->id.'_'.$i.'.jpg').'"></a></li>';
            }
            ?>
        </ul>
    </div>

    <div class="full-access text-center">
        This gallery contains <strong><?php echo $gallery->number_of_pics;?> FullHD nude photos</strong> on its full version on Metart.com !
    </div>
    <div class="text-center">
        <a href="http://access.met-art.com/track/1025.MA.1.2.5.0.0/signup/" target="_blank"><button type="button" class="btn btn-primary text-uppercase btn-full-access"><strong>Join now to get a full access</strong></button></a>
        <a href="http://access.met-art.com/track/1025.MA.1.2.5.0.0/" target="_blank"><button type="button" class="btn btn-primary text-uppercase btn-full-access"><strong>Take a free tour on Metart.com</strong></button></a>
    </div>    

    <!-- Modal -->
    <div class="modal fade" id="modalCover" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo '<h3>' . $gallery->name . ' <small>starring</small> ' . $model->name . '</h3>';?>
          </div>
          <div class="modal-body">
            <a href="<?php echo('https://access.metart.com/track/1025.MA.1.2.5.0.0/model/' . UtilsMetArt::toAscii($model->name) . '/gallery/' . str_replace('-', '', $gallery->date) . '/' . $gallery->name . '/');?>" target="blank">
                <img class="img-responsive gallery-img-modal" src="<?php echo site_url('/assets/images/galleries/'.$gallery->id.'/glam-sex_'.$gallery->id.'_cover.jpg');?>">
            </a>
          </div>
          <div class="modal-footer">
            <div class="text-center">
                <a href="http://access.met-art.com/track/1025.MA.1.2.5.0.0/signup/" target="_blank"><button type="button" class="btn btn-primary text-uppercase btn-full-access"><strong>Get access to the Full HD galleries and films</strong></button></a>
            </div>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalPhotos" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php
                echo '<h3>' . $gallery->name . ' <small>starring</small> ' . $model->name . '</h3>';
            ?>
          </div>
          <div class="modal-body">
            
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <?php
                for($i=1; $i < $gallery->number_of_pics_fhg; $i++) {
                ?>
                    <div class="item <?php if($i==1) echo 'active';?> text-center" id="slider_img_<?php echo $i;?>">
                        <a href="<?php echo('https://access.metart.com/track/1025.MA.1.2.5.0.0/model/' . UtilsMetArt::toAscii($model->name) . '/gallery/' . str_replace('-', '', $gallery->date) . '/' . $gallery->name . '/');?>" target="blank">
                            <?php echo '<img class="img-responsive gallery-img-slideshow" src="'.site_url('/assets/images/galleries/'.$gallery->id.'/glam-sex_'.$gallery->id.'_'.$i.'.jpg').'">';?>
                        </a>
                    </div>
                <?php
                }
                ?>
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                
              </a>
            </div>

          </div>
          <div class="modal-footer">
            <div class="text-center">
                <a href="http://access.met-art.com/track/1025.MA.1.2.5.0.0/signup/" target="_blank"><button type="button" class="btn btn-primary text-uppercase btn-full-access"><strong>Get access to the Full HD galleries and films</strong></button></a>
            </div>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <?php
        $this->load->view('footer');
    ?>
</body>
</html> 