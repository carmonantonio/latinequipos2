<?php include(APPPATH."views/web/inc/header1.php"); ?>
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
    <div class="row" style="padding:3%;margin-left:0px !important; margin-right:0px !important"> 
      <!--<div class="c-content-title-1 wow animated fadeIn">
            <h3 style="margin:0% 0% 3% 0% !important"><strong>Ads Categories</strong></h3>
          </div>-->
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
                
                
                </a> 
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
			  	$price = "On Request";
			  }else{
			  	$price = "$".number_format($row->selling_price, 0);
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
  </div>
</div>
<div class="c-content-box c-size-md c-bg-grey-1">
  <div class="container" style="padding:5% 0% !important">
    <div class="c-content-bar-1 c-opt-1" style="padding:0% 10%">
      <h3 class="c-font-uppercase c-font-bold">Buy and Sell Heavy Machinery on Latinequips</h3>
      <p > Launched in 2003, Latinequips is the European reference classified ad Internet site for the purchase and sale of new and used construction equipment, earthmoving equipment, handling machinery and trucks from industry professionals. Latinequips is a professional platform operating in 16 different languages and also offer classified ads for job vacancies and additional services.>/br> Find the item you are looking for directly from the search engine. Or you could also browse through the different sections of construction equipment, handling/lifting and vehicles/trucks. Are you a seller? Reach Latinequips audience right now! Just a few clicks above and place easily an advert online or discover the Latinequips services tailored to your needs. Farming professionals, Agriaffaires, the twin site, is an Internet site dedicated to the farming sector. </p>
    </div>
  </div>
</div>
<?php include(APPPATH."views/web/inc/footer1.php"); ?>
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
<?php include(APPPATH."views/web/inc/footer2.php"); ?>
