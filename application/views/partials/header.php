<!-- views/partials/header.ejs -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#111;border-bottom:1px solid #63070A; height:115px;">
    <div class="container-fluid" style="padding-left:100px;">

        <div class="navbar-header" style="margin-left:-70px;">
            <a class="navbar-brand" href="/">
                <img src="<?php echo(base_url() . 'assets/images/logo.png');?>" />
            </a>
			<div style="padding-top:40px;float:right;margin-left:105px;">
				<form method="get" action="/searchAction">
					<input type="text" name="searchBar" value="" style="width:300px;height:35px;" />
					<input type="hidden" name="page" value="1" />
					<input type="hidden" name="viewType" value="newest" />
					<input type="submit" value="Search" />
				</form>
			</div>
        </div>
		<div style="clear:both;padding-top:0px;margin-left:-80px">
			<ul class="nav navbar-nav">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="font-size:20px;color:#FEF1F3;font-weight:bold">Categories <span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu" style="min-width:480px">
					<?php
					$category = '';
					$divSize = (count($categories->categories))/3;
					$count = 1;
					?>
					<div style="float:left"><ul>
					<?php
					$i = 0;
					foreach($categories->categories as $category) {
						if($i == round($divSize*$count+$count)) {
							$count++;
							?>
							</div><div style="float:left"><ul>
							<?php
						}
						?>
							<li><a href="<?php echo(base_url() .'category/display/' . $category->category . '/newest/1');?>"><?php echo($category->category);?></a></li>
						<?php
						$i++;
					}
					?>
					</div></ul>
				  </ul>
				</li>
			</ul>
		</div>
    </div>
</nav>