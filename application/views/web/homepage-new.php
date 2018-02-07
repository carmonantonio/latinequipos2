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
.home_page {
	margin-top: 60px;
}
</style>
<?php include(APPPATH."views/web/inc/header2.php"); ?>

<div class="c-layout-page">
  <div class="container" style="width:1225px !important;">
    <div class="col-md-12">
      <?php include(APPPATH."views/web/inc/top_search.php"); ?>
    </div>
    <div class="col-md-3">
      <?php include(APPPATH."views/web/inc/side_menu.php"); ?>
    </div>
    <div class="col-md-6" > 
      
      <!--START HOME PAGE SLIDER-->
      <div class="row" style="margin:5% 0% 2% 0%">
        <div class="page_container">
          <div id="immersive_slider">
            <div class="slide img-responsive" style="background:url(<?php echo base_url(); ?>assets/slider/img/slide1.jpg)"> </div>
            <div class="slide img-responsive" style="background:url(<?php echo base_url(); ?>assets/slider/img/slide2.jpg)"> </div>
            <div class="slide img-responsive" style="background:url(<?php echo base_url(); ?>assets/slider/img/slide3.jpg)"> </div>
            <div class="slide img-responsive" style="background:url(<?php echo base_url(); ?>assets/slider/img/slide4.jpg)"> </div>
            <div class="slide img-responsive" style="background:url(<?php echo base_url(); ?>assets/slider/img/slide5.jpg)"> </div>
            <a href="#" class="is-prev">&laquo;</a> <a href="#" class="is-next">&raquo;</a> </div>
        </div>
      </div>
      <!--END HOME PAGE SLIDER--> 
      
      <!--START HOME PAGE CATEGORY SECTION-->
      <div class="row" style="margin:2% 0%">
        <div class="col-sm-12" style="border:1px solid #CCC">
          <div class="c-content-client-logos-1">
            <div class="c-logos">
              <div class="row">
                <?php foreach($main_cat1->result() as $main_cat1){ ?>
                <div class="col-md-4 col-xs-4 c-logo c-logo-1">
                  <p align="center" style="padding-top:4%;text-transform:uppercase"> <a href="<?php echo site_url("home/search_by_cat/".$main_cat1->id); ?>"> <img class="c-img-pos" src="<?php echo base_url("assets/web/uploads/categories/".$main_cat1->image); ?>" alt="" style="width:50% !important;left:0%;margin-left:0px;" /> </a> </p>
                  <p align="center" style="padding-top:4%;text-transform:uppercase"><strong><?php echo $main_cat1->category_name; ?></strong> </p>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--END HOME PAGE CATEGORY SECTION--> 
      
      <!--START HOME PAGE NEW PRODUCT SECTION-->
      <div class="row" style="margin:2% 0%">
        <div class="c-content-box c-size-md c-overflow-hide c-bs-grid-small-space c-bg-grey-1">
          <div class="c-content-title-4" style="padding-top:5%">
            <h3 class="c-font-uppercase c-center c-font-bold c-line-strike"> <span class="c-bg-grey-1">New products</span> </h3>
          </div>
          <div class="row" style="padding:0% 10% !important; margin-left: -35px !important;">
            <?php if($load_ads_row->num_rows()>0){ ?>
            <?php foreach($load_ads_row->result() as $row){ ?>
            <div class="col-md-3 col-xs-6 c-margin-b-20">
              <div class="c-content-product-2 c-bg-white" style="min-height:210px;max-height:210px;">
                <div class="c-content-overlay">
                  <div class="c-overlay-wrapper">
                    <div class="c-overlay-content"> <a href="<?php echo site_url("home/search_ad/".$row->id); ?>" class="btn btn-sm c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square" style="font-size:10px !important">Explore</a> </div>
                  </div>
                  <?php if(!empty($row->main_image)){ ?>
                  <img src="<?php echo base_url("assets/web/uploads/products/".$row->main_image); ?>" class="c-bg-img-center c-overlay-object" data-height="height" style="height:125px;width:125px;"  />
                  <?php }else{ ?>
                  <img src="<?php echo base_url("assets/web/uploads/noimage.jpg"); ?>" class="c-bg-img-center c-overlay-object" data-height="height" style="height:125px;width:125px;"/>
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
                  <p class="c-title c-font-11 c-font-slim"><?php echo $row->name.' - '.' <b>'.$price; ?></p>
                </div>
              </div>
            </div>
            <?php }} ?>
          </div>
        </div>
      </div>
      <!--END HOME PAGE NEW PRODUCT SECTION--> 
      
      <!--START HOME PAGE VIDEO SECTION-->
      
      
      <!--END HOME PAGE VIDEO SECTION--> 
      
    </div>
    <div class="col-md-3">
      <div class="row" style="margin:10% 0% 2% 0%">
        <div class="col-md-12 wow animate fadeInDown" data-wow-delay="0.2s" > <img src="<?php echo site_url("assets/web/img/ads/special_offer.jpg"); ?>" width="240" /> </div>
      </div>
      <div class="row" align="center" style="padding:0% 11%">
      <div class="embed-responsive embed-responsive-4by3">
                  <iframe src="https://player.vimeo.com/video/20566684?color=ffffff&amp;title=0&amp;byline=0&amp;portrait=0" class="embed-responsive-item" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
      </div>
      <div class="row" align="center" style="padding:0% 11%; margin-top:3%">
      <div class="embed-responsive embed-responsive-4by3">
                  <iframe src="https://player.vimeo.com/video/110256895" class="embed-responsive-item" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
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
