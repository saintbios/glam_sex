<?php
//var_dump($categories);
?>
<html lang="en">
<head>
	<title>Porn videos : best amateur sex porn videos for free !</title>
    <?php include 'partials/head.php'; ?>
	<?php
	$views = 0;
	$ratings = 0;
	?>
	<meta name="hubtraffic-domain-validation"  content="3e135750a28b9a75" />
</head>
<body class="container">
	
    <header>
        <?php include 'partials/header.php'; ?>
    </header>

    <main>
        <div class="row">
			<div class="col-sm-12" style="padding-left:0;margin-left:-80px;">
                <h3 class="headerTitle">Latest videos</h3>
				<div style="clear:both;padding-left:20px;padding-top:38px;border-top:1px solid #BBB">
				<?php 
					foreach($videos->videos as $video) {
						$views = $video->views;
					?>
					<div class="thumbnailContainer">
						<a href="<?php echo(base_url() . 'video/' . $video->video_id);?>" onclick="openTabs(<?php echo($video->video_id);?>);return false;">
							<img src="<?php echo($video->default_thumb);?>" class="thumbnail" title="<?php echo($video->title);?>" />
						</a>
						<div class="thumbnailDuration">
							<?php echo($video->duration);?>
						</div>
						<div class="thumbnailDescriptionContainer">
							<div class="thumbnailTitleContainer" title="<?php echo($video->title);?>">
								<a href="<?php echo(base_url() . 'video/' . $video->video_id);?>" onclick="openTabs(<?php echo($video->video_id);?>);return false;" class="thumbnailTitle">
									<?php echo($video->title);?>
								</a>
							</div>
							<div style="float:left;font-size:10px;">
								<img src="assets/images/eye_open.png" class="thumbnailViewIcon" /> <?php echo($views);?>
							</div>
							<div style="float:right;font-size:10px;">
								<img src="assets/images/thumbs_up.png" class="thumbnailThumbsIcon" /> <?php echo($video->rating);?>% (<?php echo($video->ratings);?> votes)
							</div>
						</div>	
					</div>
				<?php }?>
				</div>
				<div style="clear:both"></div>
            </div>
        </div>
    </main>
	
    <footer>
        <?php include 'partials/footer.php'; ?>
    </footer>
    
</body>
</html>