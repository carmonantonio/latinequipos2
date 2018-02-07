<?php include(APPPATH."views/web/inc/header1.php"); ?>
<link href='<?php echo base_url(); ?>assets/slider/immersive-slider.css' rel='stylesheet' type='text/css'>

<style>
.owl-item {
	width: 215px !important;
}
.owl-theme .owl-controls {
	margin-top: 0px !important;
}
.owl-theme:not(.owl-single):not(.owl-bordered) .owl-wrapper .owl-item {
	padding: 0 3px !important;
}
.owl-theme:not(.owl-single):not(.owl-bordered) {
	margin-left: 0px !important;
}
.c-content-client-logos-1 .c-logos .row > div {
	padding: 2% !important;
}

.home_page{
	margin-top:60px;
}
</style>

<?php include(APPPATH."views/web/inc/header2.php"); ?>
<!-- END: HEADER 2 -->
<!-- END: LAYOUT/HEADERS/HEADER-2 -->
<!-- BEGIN: CONTENT/USER/FORGET-PASSWORD-FORM -->

<!-- END: CONTENT/USER/FORGET-PASSWORD-FORM -->
<!-- BEGIN: CONTENT/USER/SIGNUP-FORM -->

<!-- END: CONTENT/USER/SIGNUP-FORM -->
<!-- BEGIN: CONTENT/USER/LOGIN-FORM -->

<!-- END: CONTENT/USER/LOGIN-FORM -->
<!-- BEGIN: LAYOUT/SIDEBARS/QUICK-SIDEBAR -->

<!-- END: LAYOUT/SIDEBARS/QUICK-SIDEBAR -->
<!-- BEGIN: PAGE CONTAINER -->























<div class="c-layout-page home_page" >
<!-- BEGIN: PAGE CONTENT -->
<div class="container">
  <?php include(APPPATH."views/web/inc/side_menu.php"); ?>
  <div class="c-layout-sidebar-content "> 
    <!-- BEGIN: PAGE CONTENT --> 
    <!-- BEGIN: CONTENT/SHOPS/SHOP-ADVANCED-SEARCH-1 -->
    <?php include(APPPATH."views/web/inc/top_search.php"); ?>
    <!-- END: CONTENT/SHOPS/SHOP-ADVANCED-SEARCH-1 -->
    <div class="c-margin-t-30"></div>
    <!-- BEGIN: CONTENT/SHOPS/SHOP-RESULT-FILTER-1 -->
    <div class="row" style="margin-left:0px !important; margin-right:0px !important"> 
      <!--<div class="c-content-title-1 wow animated fadeIn">
            <h3 style="margin:0% 0% 3% 0% !important"><strong>Ads Categories</strong></h3>
          </div>-->
          
          
          
        <div class="page_container" style="margin-bottom:2%">
        <div id="immersive_slider">
          <div class="slide img-responsive" style="background:url(<?php echo base_url(); ?>assets/slider/img/slide1.jpg)">
          </div>
          <div class="slide img-responsive" style="background:url(<?php echo base_url(); ?>assets/slider/img/slide2.jpg)">
          </div>
          <div class="slide img-responsive" style="background:url(<?php echo base_url(); ?>assets/slider/img/slide3.jpg)">
          </div>
          <div class="slide img-responsive" style="background:url(<?php echo base_url(); ?>assets/slider/img/slide4.jpg)">
          </div>
          <div class="slide img-responsive" style="background:url(<?php echo base_url(); ?>assets/slider/img/slide5.jpg)">
          </div>
          
          <a href="#" class="is-prev">&laquo;</a>
          <a href="#" class="is-next">&raquo;</a>
        </div>
      </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
      <div class="col-sm-12" style="border:1px solid #CCC">
        <div class="c-content-client-logos-1"> 
          <!-- Begin: Title 1 component --> 
          
          <!-- End-->
          <div class="c-logos">
            <div class="row">
              <?php //if($main_cat->num_rows()>0){ ?>
              <?php foreach($main_cat1->result() as $main_cat1){ ?>
              <div class="col-md-4 col-xs-4 c-logo c-logo-1"> 
              <p align="center" style="padding-top:4%;text-transform:uppercase">
              <a href="<?php echo site_url("home/search_by_cat/".$main_cat1->id); ?>"> 
              <img class="c-img-pos" src="<?php echo base_url("assets/web/uploads/categories/".$main_cat1->image); ?>" alt="" style="width:50% !important;left:0%;margin-left:0px;" />
                </a>
                </p>
                
                
                <p align="center" style="padding-top:4%;text-transform:uppercase"><strong><?php echo $main_cat1->category_name; ?></strong>
                </p>
                </div>
              <?php }//} ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row"> 
      <!--<div class="c-content-title-1 wow animated fadeIn">
            <h3 style="margin:0% 0% 3% 0% !important"><strong>Latest Ads</strong></h3>
          </div>-->
      <div class="col-md-12"> 
        <!-- Begin: Testimonals 1 component -->
        <div class="c-content-person-1-slider" data-slider="owl" data-items="3" data-auto-play="8000"> 
          <!-- Begin: Title 1 component --> 
          
          <!-- End--> 
          <!-- Begin: Owlcarousel --> 
          <!-- End--> 
        </div>
      </div>
      <!-- END: CONTENT/SHOPS/SHOP-RESULT-FILTER-1 -->
      <div class="c-margin-t-20"></div>
      <!-- BEGIN: CONTENT/SHOPS/SHOP-2-8 --> 
      
      <!-- END: PAGE CONTENT --> 
    </div>
    <div class="row">
      <div class="c-content-box c-size-md c-overflow-hide c-bs-grid-small-space c-bg-grey-1">
        <div class="c-content-title-4" style="padding-top:5%">
          <h3 class="c-font-uppercase c-center c-font-bold c-line-strike"> <span class="c-bg-grey-1">New products</span> </h3>
        </div>
        <div class="row" style="padding:0% 10% !important; margin-left: -35px !important;">
          <?php if($load_ads_row->num_rows()>0){ ?>
          <?php foreach($load_ads_row->result() as $row){ ?>
          <div class="col-md-3 col-xs-6 c-margin-b-20">
            <div class="c-content-product-2 c-bg-white" style="min-height:290px;max-height:290px;">
              <div class="c-content-overlay">
                <div class="c-overlay-wrapper">
                  <div class="c-overlay-content"> <a href="<?php echo site_url("home/search_ad/".$row->id); ?>" class="btn btn-sm c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square" style="font-size:10px !important">Explore</a> </div>
                </div>
                <?php if(!empty($row->main_image)){ ?>
                <img src="<?php echo base_url("assets/web/uploads/products/".$row->main_image); ?>" class="c-bg-img-center c-overlay-object" data-height="height" style="height: 150px;width:174px;"  />
                <!--<div class="c-bg-img-center c-overlay-object" data-height="height" style="height: 150px; background-image: url(<?php //echo base_url("assets/web/uploads/products/".$row->main_image); ?>);"></div>-->
                <?php }else{ ?>
                <img src="<?php echo base_url("assets/web/uploads/noimage.jpg"); ?>" class="c-bg-img-center c-overlay-object" data-height="height" style="height: 150px;"  />
                <!--<div class="c-bg-img-center c-overlay-object" data-height="height" style="height: 150px; background-image: url(<?php //echo base_url("assets/web/uploads/noimage.jpg"); ?>);"></div>-->
                <?php } ?>
              </div>
              <div class="c-info">
              <?php
              
			  if($row->selling_price=="0"){
			  	$price = "Price On Request";
			  }else{
			  	$price = $row->selling_price;
			  }
			  ?>
                <p class="c-title c-font-14 c-font-slim"><?php echo $row->name.' - '.$row->year.' - '.' <b>'.$price; ?></p>
              </div>
            </div>
          </div>
          <?php }} ?>
        </div>
      </div>
    </div>
    <div class="row">
    <div class="c-content-title-4" style="padding-top:5%">
          <h3 class="c-font-uppercase c-center c-font-bold c-line-strike"> <span class="c-bg-grey-1">Latest Videos</span> </h3>
        </div>
    <div class="c-content-panel">
                        <div class="c-label">Latest Videos</div>
                        <div class="c-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <iframe src="https://player.vimeo.com/video/20566684?color=ffffff&amp;title=0&amp;byline=0&amp;portrait=0" class="embed-responsive-item" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                        
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <iframe src="https://player.vimeo.com/video/110256895" class="embed-responsive-item" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
  </div>
</div>


<?php include(APPPATH."views/web/subscribe.php"); ?>
<?php include(APPPATH."views/web/about_text.php"); ?>
<?php include(APPPATH."views/web/inc/footer1.php"); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/slider/jquery.immersive-slider.js"></script>

<script type="text/javascript">

$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
    	e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
});

</script>




<script type="text/javascript">
  $(document).ready( function() {
	$("#immersive_slider").immersive_slider({
	  container: ".main"
	});
  });

</script>


<script>
var _gaq=[['_setAccount','UA-11278966-1'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
s.parentNode.insertBefore(g,s)}(document,'script'));
</script>



<?php include(APPPATH."views/web/inc/footer2.php"); ?>
