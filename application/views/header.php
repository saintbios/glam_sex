    <div class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="<?php echo site_url();?>" class="navbar-brand gs-logo" title="Pretty, beautiful, radiant as the sun.">
                    <img src="<?php echo site_url('/assets/images/common/logo.png');?>">
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
                    <li><a href="<?php echo site_url('/galleries/films/1');?>">ALL FILMS</a></li>
                    <li><a href="<?php echo site_url('/models/1');?>">ALL MODELS</a></li>
                    <li><a href="<?php echo site_url('/galleries/photos/1');?>">ALL PHOTOS</a></li>
                </ul>
            
                <form action="<?php echo site_url('/galleries/search/1');?>" class="navbar-form navbar-right" role="search" method="get" id="searchForm">
                    <div class="form-group">
                        <input type="hidden" name="searchvaluesanitized" id="searchvaluesanitized">
                        <button class="btn btn-default" id="btnSubmitSearch">Search</button>
                    </div>
                </form>
                <div class="navbar-form navbar-right"><input type="text" class="form-control" placeholder="" name="searchvalue" id="searchValueInput"></div>
            </div>
        </div>
    </div>