    <?php
        $CI =& get_instance();
        $CI->load->helper('url');
    ?>
    <link href='https://fonts.googleapis.com/css?family=Signika:400,700|Open+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/bootstrap/3.3.6/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/global.css');?>">

    <script src="<?php echo site_url('/assets/js/jquery/1.x/jquery-1.12.3.js');?>" crossorigin="anonymous"></script>
    <script src="<?php echo site_url('/assets/js/utils.js');?>"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo site_url('/assets/js/bootstrap/3.3.6/bootstrap.min.js');?>"></script>
    <?php require_once("application/libraries/UtilsMetArt.php");?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-77759022-1', 'auto');
      ga('send', 'pageview');

    </script>