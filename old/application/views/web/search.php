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

<div class="c-layout-page">
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
    <div class="row">
      <div class="col-md-12">
        <!--<div class="c-shop-result-filter-1 clearfix form-inline">
          <div class="c-filter">
            <label class="control-label c-font-16">Show:</label>
            <select class="form-control c-square c-theme c-input">
              <option value="#?limit=24" selected="selected">24</option>
              <option value="#?limit=25">25</option>
              <option value="#?limit=50">50</option>
              <option value="#?limit=75">75</option>
              <option value="#?limit=100" selected>100</option>
            </select>
          </div>
          <div class="c-filter">
            <label class="control-label c-font-16">Sort&nbsp;By:</label>
            <select class="form-control c-square c-theme c-input">
              <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
              <option value="#?sort=pd.name&amp;order=ASC">Name (A - Z)</option>
              <option value="#?sort=pd.name&amp;order=DESC">Name (Z - A)</option>
              <option value="#?sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
              <option value="#?sort=p.price&amp;order=DESC" selected>Price (High &gt; Low)</option>
              <option value="#?sort=rating&amp;order=DESC">Rating (Highest)</option>
              <option value="#?sort=rating&amp;order=ASC">Rating (Lowest)</option>
              <option value="#?sort=p.model&amp;order=ASC">Model (A - Z)</option>
              <option value="#?sort=p.model&amp;order=DESC">Model (Z - A)</option>
            </select>
          </div>
        </div>-->
        <div class="c-margin-t-20"></div>
        <!--
        <?php //if($ads->num_rows()>0){ ?>
        <?php //foreach($ads->result() as $ads){ ?>
        <div class="row c-margin-b-40">
          <div class="c-content-product-2 c-bg-white">
            <div class="col-md-4">
              <div class="c-content-overlay">
                <div class="c-overlay-wrapper">
                  <div class="c-overlay-content"> <a href="<?php //echo site_url("home/search_ad/".$ads->id); ?>" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Explore</a> </div>
                </div>
                	<?php
                    /*$picture = (object)json_decode($ads->pictures);
					foreach($picture as $picture){
						echo '<div class="c-bg-img-center c-overlay-object" data-height="height" style="height: 230px; background-image: url('.base_url("assets/web/uploads/products/".$picture).');"></div>';
						break;
					}*/
					
					?>
                
              </div>
            </div>
            <div class="col-md-8">
              <div class="c-info-list">
                <h3 class="c-title c-font-bold c-font-28 c-font-dark"> <a class="c-theme-link" href="shop-product-details.html"><?php //echo $ads->name; ?></a> </h3>
                <p class="c-desc c-font-20 c-font-thin"><?php //echo $ads->make." - ".$ads->model." - ".$ads->referance." - ".$ads->year." - ".$ads->country; ?></p>
                <p class="c-price c-font-26 c-font-thin">$<?php //echo number_format($ads->price_excl); ?> </p>
              </div>
              <div>
                <a href="<?php //echo site_url("home/search_ad/".$ads->id); ?>" class="btn btn-sm c-theme-btn c-btn-square c-btn-uppercase c-btn-bold"> view Detail </a>
                
              </div>
            </div>
          </div>
        </div>
        <?php //}} ?>-->
        
      </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <?php if(isset($title)){ ?>
    <div class="c-content-title-1">
                        <h3 class="c-center c-font-uppercase c-font-bold"><?php echo $title; ?></h3>
                        <div class="c-line-center c-theme-bg"></div>
                    </div>
    <?php } ?>
    <div class="c-content-box c-size-md c-overflow-hide c-bs-grid-small-space c-bg-grey-1">
                
                    
                    <div class="row">
                    
                    
                    
                    	<?php if($ads->num_rows()>0){ ?>
        				<?php foreach($ads->result() as $ads){ ?>
                        <div class="col-md-3 col-sm-6 c-margin-b-20">
                            <div class="c-content-product-2 c-bg-white" style="min-height:290px;max-height:290px;">
                                <div class="c-content-overlay">
                                    <div class="c-overlay-wrapper">
                                        <div class="c-overlay-content">
                                            <a href="<?php echo site_url("home/search_ad/".$ads->id); ?>" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Explore</a>
                                        </div>
                                    </div>
                                    
                                    <?php
				  $picture = (object)json_decode($ads->pictures);
					if(!empty((array)$picture)){
					foreach($picture as $picture){ ?>
                  <img src="<?php echo base_url("assets/web/uploads/products/".$picture); ?>" class="c-bg-img-center c-overlay-object" data-height="height" style="height: 150px;width:174px;"  />
				  	<?php break;
					}}else{ ?>
                    <img src="<?php echo base_url("assets/web/uploads/noimage.jpg"); ?>" class="c-bg-img-center c-overlay-object" data-height="height" style="height: 150px; width:174px"  />
                    <?php } ?>
                                    
                                    
                                    
                                    
                                    
                                </div>
                                <div class="c-info">
                                <p class="c-title c-font-16 c-font-slim"><?php if($ads->selling_price=="0"){ echo "On Request"; }else{ echo "$".number_format($ads->selling_price); } ?></p>
                                    <p class="c-title c-font-12 c-font-slim"><?php echo $ads->category_name." - ".$ads->model." - ".$ads->year." - ".$ads->country; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php }}else{ ?>
                        
                        <div class="col-md-12" align="center">
                        <em>No Record Found</em>
                        </div>
                        
                        
                        <?php } ?>
                        
                        
                        
                        
                    </div>
                    
                
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
