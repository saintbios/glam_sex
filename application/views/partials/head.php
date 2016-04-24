<?php
$this->load->helper('url');
?>

<meta charset="UTF-8">

<!-- CSS (load bootstrap from a CDN) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo(base_url() . 'assets/css/global.css');?>">
<style>
body {margin-top:50px;background-color:#200104}
</style>
<script>
	function openTabs(videoId) {
		var newWindow = window.open("http://www.pornhub.com/view_video.php?viewkey="+videoId+"&utm_source=paid&utm_medium=hubtraffic&utm_campaign=hubtraffic_bde0510", "newPage");
		//setTimeout(function () { newWindow.close();}, 500);
		setTimeout(function () { location.href = "/video/"+videoId;}, 100);
	}

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61207355-1', 'auto');
  ga('send', 'pageview');
</script>