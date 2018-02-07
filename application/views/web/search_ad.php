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
.table tbody tr {
	text-align: left;
	font-size: 16px;
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/fancybox/css/jquery.fancybox.min.css">
<?php include(APPPATH."views/web/inc/header2.php"); ?>

<div class="c-layout-page" style="margin-top:115px !important"> 
  <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
  <div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-color:#e12734 !important;padding:80px 0px 20px 0px !important;">
    <div class="container">
      <div class="c-content-title-1">
        <h3 class="c-font-uppercase c-font-bold" style="color:white"><?php echo $ad_by_id->name; ?></h3>
        <div class="c-line-left" style="background-color:white !important;"></div>
      </div>
    </div>
  </div>
  <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
  <div class="container" style="width:1400px !important">
    <?php include(APPPATH."views/web/inc/side_menu.php"); ?>
    <div class="c-content-box c-size-lg c-overflow-hide c-bg-white" style="padding:80px 0 0 0 !important;">
      <div class="container">
        <div class="c-shop-product-details-2">
          <div class="row">
            <div class="col-md-6" style="max-width:500px !important; min-width:500px !important;">
              <div class="c-product-gallery">
                <div class="c-product-gallery-content">
                  <?php
											$pictures = json_decode($ad_by_id->pictures);
											if(!empty($pictures)){
												foreach($pictures as $pic){
										?>
                  <!--<div class="easyzoom easyzoom--overlay">
				<a href="<?php// echo base_url("assets/web/uploads/products/".$pic); ?>">
					<img src="<?php //echo base_url("assets/web/uploads/products/".$pic); ?>" alt="" width="640" height="360" />
				</a>
			</div>-->
                  
                  <div class="c-zoom"> <img src="<?php echo base_url("assets/web/uploads/products/".$pic); ?>" > </div>
                  <?php }}else{ ?>
				  
				  <?php
				  
					$query = $this->db->query('select * from categories where id = "'.$ad_by_id->category_id.'"');
					$query_row = $query->row();
					
					
				  ?>
				  <div class="c-zoom"> <img src="<?php echo base_url("assets/web/uploads/categories/".$query_row->image); ?>" > </div>
				  <?php } ?>
                  <!--<div class="c-zoom">
                                            <img src="<?php //echo base_url(); ?>assets/web/base/img/content/shop8/35.jpg"> </div>
                                        <div class="c-zoom">
                                            <img src="<?php //echo base_url(); ?>assets/web/base/img/content/shop8/37.jpg"> </div>
                                        <div class="c-zoom">
                                            <img src="<?php //echo base_url(); ?>assets/web/base/img/content/shop8/29.jpg"> </div>--> 
                </div>
                <div class="row c-product-gallery-thumbnail">
                  <?php
											$pictures1 = json_decode($ad_by_id->pictures);
											if(!empty($pictures1)){
												foreach($pictures1 as $pic1){
										?>
                  <div class="col-xs-3 c-product-thumb"> <img src="<?php echo base_url("assets/web/uploads/products/".$pic1); ?>" width="100"> </div>
                  <?php }} ?>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold"><?php echo $ad_by_id->name; ?></h3>
                <p><strong><a href="<?php echo site_url(); ?>">Home</a></strong> / <strong><a href="<?php echo site_url("home/search_by_cat/".$ad_by_id->category_id); ?>"><?php echo $ad_by_id->category_name; ?></a></strong> / <strong><a href="<?php echo site_url("home/search/".$ad_by_id->parent_cat); ?>"><?php echo $ad_by_id->parent_category; ?></a></strong> </p>
              </div>
              <div class="c-product-meta">
                <div class="c-product-price">
                <a href="<?php echo site_url("request_quote?id=".$ad_by_id->id); ?>">
                  <?php
									if($ad_by_id->selling_price){
							  	if($ad_by_id->selling_price=="0"){
									echo "<p style='font-size:16px;color:red'><b><u><i>"."Price On Request"."</p></b></u></i>";
								}else{
									echo "<p style='font-size:16px;color:red'><b><u><i>".$ad_by_id->selling_price."</p></b></u></i>";
								}
							}else{ echo "N/A"; } 
									
									?>
				</a>
                </div>
                <div class="c-product-short-desc"> <em>Ad Posted On: <?php echo $ad_by_id->ad_posting_date; ?></em> <br />
                  <table class="table">
                    <tr>
                      <td><strong><?php echo $this->lang->line("company"); ?></strong></td>
                      <td><?php if($ad_by_id->company){ echo $ad_by_id->company; }else{ echo "N/A"; } ?></td>
                    </tr>
                    
                    
                    
                    
                    <tr>
                      <td><strong><?php echo $this->lang->line("category"); ?></strong></td>
                      <td><?php if($ad_by_id->parent_category){ echo $ad_by_id->category_name." - ".$ad_by_id->parent_category; }else{ echo "N/A"; } ?></td>
                    </tr>
                    
                    
                    
                    
                    <!--<tr>
                      <td><strong><?php// echo $this->lang->line("country"); ?></strong></td>
                      <td><?php //if($ad_by_id->country){ echo $ad_by_id->country; }else{ echo "N/A"; } ?></td>
                    </tr>-->
                    <tr>
                      <td><strong><?php echo $this->lang->line("product_location"); ?></strong></td>
                      <td><?php if($ad_by_id->location){ echo $ad_by_id->location; }else{ echo "N/A"; } ?></td>
                    </tr>
                    <tr>
                      <td><strong><?php echo $this->lang->line("model"); ?></strong></td>
                      <td><?php if($ad_by_id->model){ echo $ad_by_id->model; }else{ echo "N/A"; } ?></td>
                    </tr>
                    <tr>
                      <td><strong><?php echo $this->lang->line("year"); ?></strong></td>
                      <td><?php if($ad_by_id->year){ echo $ad_by_id->year; }else{ echo "N/A"; } ?></td>
                    </tr>
                    <tr>
                      <td><strong><?php echo $this->lang->line("serial_number"); ?></strong></td>
                      <td><?php if($ad_by_id->serial_number){ echo $ad_by_id->serial_number; }else{ echo "N/A"; } ?></td>
                    </tr>
                    
                    <tr>
                      <td><strong><?php echo $this->lang->line("hours"); ?></strong></td>
                      <td><?php if($ad_by_id->hours){ echo $ad_by_id->hours; }else{ echo "N/A"; } ?></td>
                    </tr>
                    
                    <tr>
                      <td><strong><?php echo $this->lang->line("weight"); ?></strong></td>
                      <td><?php if($ad_by_id->weight){ echo $ad_by_id->weight; }else{ echo "N/A"; } ?></td>
                    </tr>
                    
                    <tr>
                      <td><strong><?php echo $this->lang->line("refurbished"); ?></strong></td>
                      <td><?php if($ad_by_id->refurbished){ echo $ad_by_id->refurbished; }else{ echo "N/A"; } ?></td>
                    </tr>
                    
                    <tr>
                      <td><strong><?php echo $this->lang->line("engin"); ?></strong></td>
                      <td><?php if($ad_by_id->engine){ echo $ad_by_id->engine; }else{ echo "N/A"; } ?></td>
                    </tr>
                    
                    <tr>
                      <td><strong><?php echo $this->lang->line("keywords"); ?></strong></td>
                      <td><?php
                                    	if($ad_by_id->keyword){ 
											$keywords = explode(",", $ad_by_id->keyword);
												foreach($keywords as $key => $val){
									?>
                  <a href="<?php echo site_url("home/search?keyword=".$val); ?>"><?php echo $val; ?></a>,
                  <?php
												}
										}else{ echo "N/A"; }
										
										
										
									?></td>
                    </tr>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-layout-sidebar-content " >
      <div class="row">
        <div class="c-content-panel" style="border:0px;">
          <div class="c-body" style="padding:20px 20px 20px 20px;"> <a href="<?php echo site_url("request_quote?id=".$ad_by_id->id); ?>">
            <button type="button" class="btn btn-danger btn-block c-btn-uppercase c-btn-bold" style="background-color:#e12734; font-size:18px;padding:20px 20px 20px 20px;"><i class="icon-pin"></i><?php echo $this->lang->line("request_a_quote");?></button>
            </a> </div>
        </div>
      </div>
      <!-- Begin: Testimonals 1 component -->
      <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl" data-items="6" data-desktop-items="4" data-desktop-small-items="3" data-tablet-items="3" data-mobile-small-items="2" data-auto-play="5000" style="margin-top:3%"> 
        <!-- Begin: Title 1 component -->
        <div class="c-content-title-1">
          <h3 class="c-center c-font-uppercase c-font-bold"><?php echo $this->lang->line("related_product");?></h3>
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
  </div>
</div>
<?php include(APPPATH."views/web/subscribe.php"); ?>
<?php include(APPPATH."views/web/about_text.php"); ?>
<?php include(APPPATH."views/web/inc/footer1.php"); ?>
<script src="<?php echo base_url();?>assets/web/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/web/base/js/scripts/pages/masonry-gallery.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/web/fancybox/js/jquery.fancybox.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/web/plugins/zoom-master/jquery.zoom.min.js" type="text/javascript"></script> 

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
