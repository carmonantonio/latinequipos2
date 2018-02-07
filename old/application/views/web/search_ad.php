<?php //echo "<pre>"; print_r($ad_by_id); exit; ?>
<?php include(APPPATH."views/web/inc/header1.php"); ?>
<style>
.owl-item {
	width: 215px !important;
	height: 215px !important;
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
.cbp-popup-lightbox-title {
	display: none !important;
}
.table thead tr th {
	font-size: 14px;
	text-align: center;
}
.table tbody tr {
	text-align: center;
	font-size: 12px
}
.c-page-breadcrumbs li a {
	font-size: 12px !important;
}
.c-page-breadcrumbs li {
	font-size: 12px !important;
}
.c-layout-sidebar-menu {
	margin: 30px 0 0 0 !important;
}
.c-shop-product-tab-1 {
	padding-bottom: 0px !important;
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/fancybox/css/jquery.fancybox.min.css">
<?php include(APPPATH."views/web/inc/header2.php"); ?>
<div class="c-layout-page"> 
  <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
  <div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
    <div class="container" align="center">
      <div class="c-page-title c-pull-center">
        <h3 class="c-font-uppercase c-font-sbold"><?php echo $ad_by_id->name; ?></h3>
        <ul class="c-page-breadcrumbs c-theme-nav  c-pull-left c-fonts-regular">
          <li> <a href="<?php echo site_url(); ?>">Home</a> </li>
          <li>/</li>
          <li> <a href="<?php echo site_url("home/search_by_cat/".$ad_by_id->category_id); ?>"><?php echo $ad_by_id->category_name; ?></a> </li>
          <li>/</li>
          <li class="c-state_active"><a href="<?php echo site_url("home/search/".$ad_by_id->parent_cat); ?>"><?php echo $ad_by_id->parent_category; ?></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
  <div class="container">
    <?php include(APPPATH."views/web/inc/side_menu.php"); ?>
    <div class="c-layout-sidebar-content " >
      <div class="row" style="margin-top:3%">
        <div class="c-content-box c-size-md c-no-padding">
          <div class="c-shop-product-tab-1" role="tabpanel">
            <div class="container" style="width:100%">
              <ul class="nav nav-justified" role="tablist">
                <li role="presentation" class="active"> <a class="c-font-uppercase c-font-bold" href="#tab-1" role="tab" data-toggle="tab">Description</a> </li>
                <li role="presentation"> <a class="c-font-uppercase c-font-bold" href="#tab-2" role="tab" data-toggle="tab">Seller Detail</a> </li>
                <li role="presentation"> <a class="c-font-uppercase c-font-bold" href="#tab-3" role="tab" data-toggle="tab">Image Gallery</a> </li>
              </ul>
            </div>
            <div class="tab-content" style="margin-left:4%">
              <div role="tabpanel" class="tab-pane fade in active" id="tab-1">
                <div class="container" style="width:100%">
                  <div class="c-info-list">
                    <p style="font-size:12px" align="right"><strong>Ad posted Date:</strong> <?php echo $ad_by_id->ad_posting_date; ?></p>
                    <p class="c-desc c-font-16 c-font-thin">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Company</th>
                          <th>Category</th>
                          <th>Country</th>
                          <th>Location</th>
                          <th>Model/Brand</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?php if($ad_by_id->company){ echo $ad_by_id->company; }else{ echo "N/A"; } ?></td>
                          <td><?php if($ad_by_id->parent_category){ echo $ad_by_id->category_name." - ".$ad_by_id->parent_category; }else{ echo "N/A"; } ?></td>
                          <td><?php if($ad_by_id->country){ echo $ad_by_id->country; }else{ echo "N/A"; } ?></td>
                          <td><?php if($ad_by_id->location){ echo $ad_by_id->location; }else{ echo "N/A"; } ?></td>
                          <td><?php if($ad_by_id->model){ echo $ad_by_id->model; }else{ echo "N/A"; } ?></td>
                        </tr>
                      </tbody>
                      <thead>
                        <tr>
                          <th>Year</th>
                          <th>Serial Number</th>
                          <th>Hours</th>
                          <th>Weight</th>
                          <th>Refurbished</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?php if($ad_by_id->year){ echo $ad_by_id->year; }else{ echo "N/A"; } ?></td>
                          <td><?php if($ad_by_id->serial_number){ echo $ad_by_id->serial_number; }else{ echo "N/A"; } ?></td>
                          <td><?php if($ad_by_id->hours){ echo $ad_by_id->hours; }else{ echo "N/A"; } ?></td>
                          <td><?php if($ad_by_id->weight){ echo $ad_by_id->weight; }else{ echo "N/A"; } ?></td>
                          <td><?php if($ad_by_id->refurbished){ echo $ad_by_id->refurbished; }else{ echo "N/A"; } ?></td>
                        </tr>
                      </tbody>
                      <thead>
                        <tr>
                          <th>Weight</th>
                          <th>Engine</th>
                          <th>Keyword</th>
                          <th colspan="2">Selling Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?php if($ad_by_id->weight){ echo $ad_by_id->weight; }else{ echo "N/A"; } ?></td>
                          <td><?php if($ad_by_id->engine){ echo $ad_by_id->engine; }else{ echo "N/A"; } ?></td>
                          <td><?php if($ad_by_id->keyword){ echo $ad_by_id->keyword; }else{ echo "N/A"; } ?></td>
                          <td colspan="2"><?php 
						  	if($ad_by_id->selling_price){
							  	if($ad_by_id->selling_price=="0"){
									echo "<p style='font-size:16px;color:red'><b><u><i>"."On Request"."</p></b></u></i>";
								}else{
									echo "<p style='font-size:16px;color:red'><b><u><i>".$ad_by_id->selling_price."</p></b></u></i>";
								}
							}else{ echo "N/A"; } ?></td>
                        </tr>
                      </tbody>
                      <thead>
                        <tr>
                          <th colspan="5">Accessories/Extra</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td colspan="5"><?php if($ad_by_id->accessories){ echo $ad_by_id->accessories; }else{ echo "N/A"; } ?></td>
                        </tr>
                      </tbody>
                    </table>
                    </p>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab-2">
                <div class="container" style="width:100%">
                  <div class="c-info-list">
                    <p class="c-desc c-font-16 c-font-thin">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Occupation</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?php if($seller_data->name){ echo $seller_data->name; }else{echo "No Name...";} ?></td>
                          <td><?php if($seller_data->email){ echo $seller_data->email; }else{echo "No Email...";} ?></td>
                          <td><?php if($seller_data->address){ echo $seller_data->address; }else{echo "No Address...";} ?></td>
                          <td><?php if($seller_data->occupation){ echo $seller_data->occupation; }else{echo "No Occupation...";} ?></td>
                          <td><button type="button" class="btn btn-danger c-btn-square c-btn-uppercase" id="contact_btn" onclick="show_contact()"> <i class="icon-speech"></i>Contact</button>
                            <a href="javascript:;" id="contact_number" onclick="hide_contact()" style="display:none"><u>
                            <?php if($seller_data->phone_number){ echo $seller_data->phone_number; }else{echo "No Contact Detail...";} ?>
                            </u></a></td>
                        </tr>
                      </tbody>
                      <thead>
                        <tr>
                          <th colspan="6">Description</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td colspan="6"><?php if($seller_data->description){ echo $seller_data->description; }else{echo "No Description...";} ?></td>
                      </tbody>
                    </table>
                    </p>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab-3">
                <div class="row">
                  <div class="c-content-box c-size-md c-bg-white c-overflow-hide">
                    <div id="grid-container" class="cbp">
                      <?php
			$pictures = json_decode($ad_by_id->pictures);
			if(!empty($pictures)){
				foreach($pictures as $pic){
			?>
                      <div class="cbp-item" style="max-height:200px;max-width:200px;min-width:200px;min-height:200px;"> <a href="<?php echo base_url("assets/web/uploads/products/".$pic); ?>" class="cbp-caption cbp-lightbox" data-title="">
                        <div class="cbp-caption-defaultWrap"> <img src="<?php echo base_url("assets/web/uploads/products/".$pic); ?>" alt=""> </div>
                        </a> </div>
                      <?php } ?>
                      <?php }else{ ?>
                      <div class="cbp-item"> <a href="<?php echo base_url("assets/web/uploads/noimage_main.jpg"); ?>" class="cbp-caption cbp-lightbox" data-title="">
                        <div class="cbp-caption-defaultWrap"> <img src="<?php echo base_url("assets/web/uploads/noimage_main.jpg"); ?>" alt=""> </div>
                        </a> </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Begin: Testimonals 1 component -->
      <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl" data-items="6" data-desktop-items="4" data-desktop-small-items="3" data-tablet-items="3" data-mobile-small-items="2" data-auto-play="5000" style="margin-top:10%"> 
        <!-- Begin: Title 1 component -->
        <div class="c-content-title-1">
          <h3 class="c-center c-font-uppercase c-font-bold">Related Products</h3>
          <div class="c-line-center c-theme-bg"></div>
        </div>
        <!-- End--> 
        <!-- Begin: Owlcarousel -->
        <div class="owl-carousel owl-theme c-theme owl-bordered1">
          <?php if($related_products->num_rows){ ?>
          <?php foreach($related_products->result() as $p): ?>
          <div class="item"> <a href="<?php echo site_url("home/search_ad/".$p->id); ?>">
            <?php if(!empty($p->main_image)){ ?>
            <img src="<?php echo site_url("assets/web/uploads/products/".$p->main_image); ?>" alt="" style="opacity:1" />
            <?php }else{ ?>
            <img src="<?php echo site_url("assets/web/uploads/noimage.jpg"); ?>" alt="" style="opacity:1" />
            <?php } ?>
            </a> </div>
          <?php endforeach; }else{ ?>
          <p align="center">No Related Products Found....</p>
          <?php } ?>
        </div>
        <!-- End--> 
      </div>
      <!-- End--> 
      
    </div>
    <div class="c-content-panel" style="border:0px;">
      <div class="c-body" style="padding:20px 20px 20px 20px;"> <a href="<?php echo site_url("request_quote?id=".$ad_by_id->id); ?>">
        <button type="button" class="btn btn-danger btn-block c-btn-uppercase c-btn-bold" style="font-size:18px;padding:20px 20px 20px 20px;"><i class="icon-pin"></i>Request a Quote</button>
        </a> </div>
    </div>
  </div>
</div>
<?php include(APPPATH."views/web/inc/footer1.php"); ?>
<script src="<?php echo base_url();?>assets/web/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/web/base/js/scripts/pages/masonry-gallery.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/web/fancybox/js/jquery.fancybox.min.js" type="text/javascript"></script> 

<!--<script src="<?php echo site_url(); ?>assets/web/plugins/zoom-master/jquery.zoom.min.js" type="text/javascript"></script> --> 
<script type="text/javascript">

function show_contact(){
	$("#contact_btn").css("display","none");
	$("#contact_number").css("display","inherit");
}

function hide_contact(){
	$("#contact_btn").css("display","inherit");
	$("#contact_number").css("display","none");
}


/*$(document).ready(function()
            {
                App.init(); // init core    
            });
$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
    	e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
});*/

</script>
<?php include(APPPATH."views/web/inc/footer2.php"); ?>
