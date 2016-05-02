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
    <title>Erotic sex movie "<?php echo $film->name;?>" starring <?php echo $model->name;?></title>
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/bootstrap/3.3.6/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/global.css');?>">
    <script src="<?php echo site_url('/assets/js/jquery/1.x/jquery-1.12.3.js');?>" crossorigin="anonymous"></script>
    <script src="<?php echo site_url('/assets/js/bootstrap/3.3.6/bootstrap.min.js');?>"></script>
    <script src="<?php echo site_url('/assets/js/jtruncate.js');?>"></script>
    <script>
        function changeEmbedSrc() {
            $('#divEmbed').html('<iframe allowfullscreen class="embed-responsive-item" src="https://static.metart.com/media/<?php echo($film->metart_id);?>/tease_<?php echo($film->metart_id);?>.mp4"></iframe>');
            $('.btn-lecture-container').html('');
        }
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
    
    <div class="container player-container">
        <div  id="divEmbed" class="embed-responsive embed-responsive-16by9">
           <img src="https://static.metart.com/media/<?php echo $film->metart_id;?>/wide_<?php echo $film->metart_id;?>.jpg">
        </div>
        <div class="btn-lecture-container">
            <img onclick="javascript:changeEmbedSrc();" class="btn-lecture" src="<?php echo site_url('/assets/images/common/play_btn.png');?>">
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