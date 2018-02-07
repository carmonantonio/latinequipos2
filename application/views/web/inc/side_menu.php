<style>
.slider-horizontal {
	width: 245px !important;
}

.smart_autocomplete_container{
	top:651px !important;
	position:absolute;
	margin: 10px 0; padding: 5px; background-color: #27A8B4;color:white;
}


.smart_autocomplete_container li {list-style: none; cursor: pointer;}
li.smart_autocomplete_highlight {background-color: #2bbecc; color:white;}
    
</style>
<div class="c-layout-sidebar-menu c-theme ">
  <form action="<?php echo site_url("home/search"); ?>" method="post">
    <ul class="c-shop-filter-search-1 list-unstyled c-bg-grey-1" style="padding:10% 5%">
      <li>
        <label class="control-label c-font-bold"><?php echo $this->lang->line('product_group_name'); ?></label>
        <select class="form-control c-square c-theme" onchange="load_parent($(this).val())" name="side_bar_categories">
          <option value="0"><?php echo $this->lang->line('all_group_categories'); ?></option>
          <?php if($main_cat_search->num_rows()>0){ ?>
          <?php foreach($main_cat_search->result() as $main_cat_search){ ?>
          <option value="<?php echo $main_cat_search->id; ?>" <?php if($main_cat_search->id===$this->input->post('side_bar_categories')){echo 'selected="selected"';} ?>><?php echo $main_cat_search->category_name; ?></option>
          <?php }} ?>
        </select>
      </li>
      <li>
        <label class="control-label c-font-bold"><?php echo $this->lang->line('sub_category'); ?></label>
        <select class="form-control c-square c-theme" id="parent_cat" name="side_bar_sub_categories">
          <option value="0"><?php echo $this->lang->line('all_sub_categories'); ?></option>
          <?php
          if($this->input->post("side_bar_categories")){
			$parent = load_parent_cat($this->input->post('side_bar_categories'));
			foreach($parent->result() as $parent){ 
			?>
          <option value="<?php echo $parent->id ?>" <?php if($parent->id===$this->input->post('side_bar_sub_categories')){echo 'selected="selected"';} ?>><?php echo $parent->category_name; ?></option>
          <?php }} ?>
        </select>
      </li>
      <li>
        <label class="control-label c-font-bold"><?php echo $this->lang->line('year_of_manufacturing'); ?></label>
        <div class="c-price-range-box input-group">
          <div class="c-price input-group col-md-6 pull-left">
            <input type="text" class="form-control c-square c-theme" placeholder="<?php echo $this->lang->line('from'); ?>" name="side_bar_from" value="<?php echo $this->input->post('side_bar_from'); ?>">
          </div>
          <div class="c-price input-group col-md-6 pull-left">
            <input type="text" class="form-control c-square c-theme" placeholder="<?php echo $this->lang->line('to'); ?>" name="side_bar_to" value="<?php echo $this->input->post('side_bar_to'); ?>">
          </div>
        </div>
      </li>
      <li>
        <label class="control-label c-font-bold"><?php echo $this->lang->line('country'); ?></label>
        <select class="form-control c-square c-theme" name="country" >
          <option value="0"><?php echo $this->lang->line('all_countries'); ?></option>
          <?php
        	$countries = load_countries();
		if($countries->num_rows()>0){ ?>
          <?php foreach($countries->result() as $countries): ?>
          <option value="<?php echo $countries->id; ?>" <?php if($countries->id===$this->input->post('country')){echo 'selected="selected"';} ?>><?php echo $countries->name; ?></option>
          <?php endforeach; } ?>
        </select>
      </li>
      <li>
        <label class="control-label c-font-bold"><?php echo $this->lang->line('price_range'); ?></label><label>(€, $, £)</label>
        <p><?php echo $this->lang->line('price_range'); ?>: 1000 - 1,000,000</p>
        <div class="c-price-range-slider c-theme-1 input-group">
          <input type="text" class="c-price-slider" value=""  name="price_range" data-slider-min="10000" data-slider-max="1000000" data-slider-step="10000" data-slider-value="[0,1000000]">
        </div>
      </li>
      <li>
        <label class="control-label c-font-bold"><?php echo $this->lang->line('enter_product_name'); ?></label>
        <input id="basic_autocomplete_field" class="form-control c-square c-theme" name="product_name" autocomplete="off" value="<?php echo $this->input->post('product_name'); ?>" >
        <!--<input type="text" class="form-control c-square c-theme" name="side_bar_to" onkeyup="search_similar($(this).val())">
        <div id="autocomplete_detail" style="background-color:black;color:white;box-shadow:0px 7px 5px #888888;position: absolute;width: 243px;z-index: 100;padding:1%; display:none"></div>-->
      </li>
      <li>
        <div class="form-group" role="group">
          <button type="submit" class="btn btn-sm c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" style="width:100%; background-color:#e12734 !important; padding:5% 0%; border-color:#e12734 !important"> <i class="fa fa-search"></i><?php echo $this->lang->line('search'); ?></button>
        </div>
      </li>
    </ul>
  </form>
  <div class="col-md-12 c-margin-b-30" >
    <div class="c-content-media-1" data-height="height" style="background-color:#2f353b" align="center"> <a href="<?php echo site_url("request_quote"); ?>" class="c-title c-font-bold c-theme-on-hover" style="font-size:22px !important;color:white"><?php echo $this->lang->line('did_not_found'); ?></a> <a href="<?php echo site_url("request_quote"); ?>">
      <button type="button" class="btn btn-sm c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" > <?php echo $this->lang->line('request_a_product'); ?></button>
      </a> </div>
  </div>
  <div class="row" style="margin:0% 0% 2% 0%">
        <div class="col-md-12" ><a href="<?php echo site_url('home/search_ad/68'); ?>" ><img src="<?php echo site_url("assets/web/img/ads/special_offer.jpg"); ?>" width="240" /></a> </div>
      </div>
  
</div>
<script type="text/javascript">

function load_parent(id){
	$.post("<?php echo site_url("home/load_parent"); ?>", {id:id}).done(function(data){
		$("#parent_cat").html(data);
	});
}

/*function search_similar(val){
	
	$.post("<?php //echo site_url("home/search_similar"); ?>", {val:val}).done(function(data){
		$("#autocomplete_detail").slideDown();
		$("#autocomplete_detail").html(data);
		//$("#parent_cat").html(data);
	});
}

function edit_text(){
	var val = $("input[name=selected_value]").val();
	alert(val);
}*/



</script> 




