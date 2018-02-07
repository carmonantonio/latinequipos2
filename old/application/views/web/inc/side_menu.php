<style>
.slider-horizontal {
	width: 245px !important;
}
</style>
<div class="c-layout-sidebar-menu c-theme "> 
  <!-- BEGIN: LAYOUT/SIDEBARS/SHOP-SIDEBAR-MENU-2 --> 
  
  <!-- BEGIN: CONTENT/SHOPS/SHOP-FILTER-SEARCH-1 -->
  
  <form action="<?php echo site_url("home/search"); ?>" method="post">
    <ul class="c-shop-filter-search-1 list-unstyled c-bg-grey-1" style="padding:10% 5%">
      <li>
        <label class="control-label c-font-bold">Product group name</label>
        <select class="form-control c-square c-theme" onchange="load_parent($(this).val())" name="side_bar_categories">
          <option value="0">All Group Categories</option>
          <?php if($main_cat_search->num_rows()>0){ ?>
          <?php foreach($main_cat_search->result() as $main_cat_search){ ?>
          <option value="<?php echo $main_cat_search->id; ?>"><?php echo $main_cat_search->category_name; ?></option>
          <?php }} ?>
        </select>
      </li>
      <li>
        <label class="control-label c-font-bold">Sub category</label>
        <select class="form-control c-square c-theme" id="parent_cat" name="side_bar_sub_categories">
          <option value="0">All Sub Categories</option>
        </select>
      </li>
      <li>
        <label class="control-label c-font-bold">Year</label>
        <div class="c-price-range-box input-group">
          <div class="c-price input-group col-md-6 pull-left">
            <input type="text" class="form-control c-square c-theme" placeholder="from" name="side_bar_from">
          </div>
          <div class="c-price input-group col-md-6 pull-left">
            <input type="text" class="form-control c-square c-theme" placeholder="to" name="side_bar_to">
          </div>
        </div>
      </li>
      <li>
        <label class="control-label c-font-bold">Country</label>
        <select class="form-control c-square c-theme" name="country" >
          <option value="0">All Countries</option>
          <?php
        	$countries = load_countries();
		if($countries->num_rows()>0){ ?>
          <?php foreach($countries->result() as $countries): ?>
          <option value="<?php echo $countries->id; ?>"><?php echo $countries->name; ?></option>
          <?php endforeach; } ?>
        </select>
      </li>
      <li>
        <label class="control-label c-font-bold">Price Range</label>
        <p>Price Range: $1 - $ 500,000</p>
        <div class="c-price-range-slider c-theme-1 input-group">
          <input type="text" class="c-price-slider" value="" name="price_range" data-slider-min="1" data-slider-max="500000" data-slider-step="1" data-slider-value="[100,500000]">
        </div>
      </li>
      <li>
        <div class="form-group" role="group">
          <button type="submit" class="btn btn-sm c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" style="width:100%; background-color:#ee7d11 !important; padding:5% 0%; border-color:#ee7d11 !important"> <i class="fa fa-search"></i>Search</button>
        </div>
      </li>
    </ul>
  </form>
  <!--<div class="c-sidebar-menu-toggler">
    <h3 class="c-title c-font-uppercase c-font-bold">Browse By Categories</h3>
    <a href="javascript:;" class="c-content-toggler" data-toggle="collapse" data-target="#sidebar-menu-1"> <span class="c-line"></span> <span class="c-line"></span> <span class="c-line"></span> </a> </div>
  <ul class="c-sidebar-menu collapse " id="sidebar-menu-1">
    <li class="c-dropdown c-theme-bg"> <a href="javascript:;" class="c-toggler" style="color:white; text-align:center"><strong>Browse By Categories</strong></a> </li>
    <?php //if($main_cat->num_rows()>0){ ?>
    <?php //foreach($main_cat->result() as $main_cat){ ?>
    <li class="c-dropdown"> <a href="javascript:;" class="c-toggler"><?php //echo $main_cat->category_name; ?><span class="c-arrow"></span> </a>
      <ul class="c-dropdown-menu">
        <?php
		  //$result_parent = load_parent_cat($main_cat->id);
          //foreach($result_parent->result() as $parent_cat){ ?>
        <li> <a href="<?php //echo site_url("home/search/".$parent_cat->id); ?>"><?php //echo $parent_cat->category_name; ?></a> </li>
        <?php //} ?>
      </ul>
    </li>
    <?php //}} ?>
    
  </ul>-->
  <div class="col-md-12 c-margin-b-30 wow animate fadeInDown" data-wow-delay="0.2s" >
                            <div class="c-content-media-1" data-height="height" style="background-color:#27A8B4" align="center">
                                
                                <a href="<?php echo site_url("request_quote"); ?>" class="c-title c-font-bold c-theme-on-hover" style="font-size:22px !important;color:white">Find What You are Looking for?</a>
                               <a href="<?php echo site_url("request_quote"); ?>"> <button type="button" class="btn btn-sm c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" > request a quote</button></a>
                                
                            </div>
                        </div>
</div>
<script type="text/javascript">

function load_parent(id){
	$.post("<?php echo site_url("home/load_parent"); ?>", {id:id}).done(function(data){
		$("#parent_cat").html(data);
	});
}

</script> 
