<?php include(APPPATH."views/web/inc/header1.php"); ?>
<?php include(APPPATH."views/web/inc/header2.php"); ?>

<div class="c-layout-page"> 
  <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
  <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
    <div class="container">
      <div class="c-page-title c-pull-left">
        <h3 class="c-font-uppercase c-font-sbold">Latest News</h3>
      </div>
      
    </div>
  </div>
  <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 --> 
  <!-- BEGIN: PAGE CONTENT --> 
  <!-- BEGIN: BLOG LISTING -->
  <div class="c-content-box c-size-md" style="margin:3% 0%">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="c-content-blog-post-1-list">
          
          
          
          
          
          
          
          
          	<?php if($news->num_rows()>0): ?>
            <?php foreach($news->result() as $news): ?>
            <div class="c-content-blog-post-1">
              <div class="c-media">
                <div class="c-content-media-2-slider" data-slider="owl" data-single-item="true" data-auto-play="4000">
                  <div class="owl-carousel owl-theme c-theme owl-single">
                    <div class="item">
                    <img src="<?php echo site_url("assets/web/uploads/news/".$news->image); ?>" class="c-content-media-2" style="min-height:360px; max-height:360px; min-width:1110px;max-width:1110px;" />
                      <!--<div class="c-content-media-2" style="background-image: url(<?php //echo site_url(); ?>assets/web/uploads/news/<?php //echo $news->image; ?>); min-height: 360px;"> </div>-->
                    </div>
                  </div>
                </div>
              </div>
              <div class="c-title c-font-bold c-font-uppercase"> <a href="#"><?php echo $news->title; ?></a> </div>
              <div class="c-desc"> <?php echo $news->description; ?> <!--<a href="#">read more...</a>--> </div>
              <div class="c-panel">
                <!--<div class="c-author"> <a href="#">By <span class="c-font-uppercase">Nick Strong</span> </a> </div>-->
                <div class="c-date"> <span class="c-font-uppercase"><strong>News Date:</strong> <?php echo $news->date; ?></span> </div>
                <!--<ul class="c-tags c-theme-ul-bg">
                  <li>ux</li>
                  <li>marketing</li>
                  <li>events</li>
                </ul>
                <div class="c-comments"> <a href="#"> <i class="icon-speech"></i> 30 comments</a> </div>-->
              </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            
            
            
            
            
            
            
            <!--<div class="c-pagination">
              <ul class="c-content-pagination c-theme">
                <li class="c-prev"> <a href="#"> <i class="fa fa-angle-left"></i> </a> </li>
                <li> <a href="#">1</a> </li>
                <li class="c-active"> <a href="#">2</a> </li>
                <li> <a href="#">3</a> </li>
                <li> <a href="#">4</a> </li>
                <li class="c-next"> <a href="#"> <i class="fa fa-angle-right"></i> </a> </li>
              </ul>
            </div>-->
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <!-- END: BLOG LISTING  --> 
  <!-- END: PAGE CONTENT --> 
</div>
<?php include(APPPATH."views/web/inc/footer1.php"); ?>
<?php include(APPPATH."views/web/inc/footer2.php"); ?>
