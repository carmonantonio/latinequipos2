<?php //echo "<pre>"; print_r($all_ads->result()); exit; ?>
<?php include(APPPATH."views/web/inc/header1.php"); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<style>

.select2-container .select2-selection--single{
	border-radius:0px !important;
    height: 42px !important;
	border:1px solid #CCCCCC !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height: 40px !important;
	text-align:left;
	font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-size: 15px;
    margin-left: 2%;
	color:#747474 !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow{
	height: 38px !important;
}

.form-control{
	color:#747474 !important;
}

</style>
<?php include(APPPATH."views/web/inc/header2.php"); ?>

<div class="c-layout-page" style="margin-top:115px !important;">
<div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-color:#e12734 !important;padding:80px 0px 20px 0px !important;">
                <div class="container">
                    <div class="c-content-title-1">
              <h3 class="c-font-uppercase c-font-bold" style="color:white"><?php echo $this->lang->line("request_a_quote"); ?></h3>
              <div class="c-line-left" style="background-color:white !important;"></div>
            </div>
                    
                </div>
            </div>
  <div class="container">
    <div class="c-content-box c-size-lg c-no-padding c-overflow-hide c-bg-white">
      <div class="row" style="margin:5% 0%">
        <?php if($this->session->flashdata('email_sent')){ ?>
        <div class="alert alert-success" align="center">
          <button class="close" data-close="alert"></button>
          <?php echo $this->session->flashdata('email_sent'); ?> </div>
        <?php } ?>
        <div class="load_request_quote_right">
        <?php if($this->input->get("id")){ ?>
        <div class="col-md-3" style="margin-top:0%;">
          <table class="table">
            <thead>
            </thead>
            <tbody>
              <?php if(!empty($ad_detail_request->main_image)){ ?>
              <tr align="center">
                <td><img src="<?php echo base_url("assets/web/uploads/products/".$ad_detail_request->main_image); ?>" alt="" style="max-width:230px !important;"></td>
              </tr>
              <?php }else{ ?>
              <tr align="center">
                <td><img src="<?php echo base_url("assets/web/uploads/noimage.jpg"); ?>" width="200" style="max-width:100px !important;" alt=""></td>
              </tr>
              <?php }; ?>
              <tr align="center">
                <td><a href="<?php echo site_url("home/search_ad/".$ad_detail_request->id); ?>" class="btn btn-success c-btn-circle">View Detail</a></td>
              </tr>
              <?php if(!empty($ad_detail_request->selling_price)): ?>
              <tr>
                <td><strong>Price: </strong><?php echo $ad_detail_request->selling_price; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->name)): ?>
              <tr>
                <td><strong>Name: </strong><?php echo $ad_detail_request->name; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->company)): ?>
              <tr>
                <td><strong>Company: </strong><?php echo $ad_detail_request->company; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->category_name)): ?>
              <tr>
                <td><strong>Category: </strong><?php echo $ad_detail_request->category_name." - ".$ad_detail_request->parent_category; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->ad_posting_date)): ?>
              <tr>
                <td><strong>Ad Posting Date: </strong><?php echo $ad_detail_request->ad_posting_date; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->location)): ?>
              <tr>
                <td><strong>Location: </strong><?php echo $ad_detail_request->location; ?></td>
              </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
        <?php } ?>
        </div>
        <div class="<?php if(!$this->input->get("id")){echo "col-md-offset-3";} ?> col-md-6 middle_portion" align="center">
          <div class="c-contact">
            
            <form action="<?php echo site_url("request_quote/add_quote"); ?>" method="post">
              
              <div class="form-group">
                <input type="text" placeholder="<?php echo $this->lang->line("first_name"); ?>" name="first_name" class="form-control c-square c-theme input-lg" required>
              </div>
              <div class="form-group">
                <input type="text" placeholder="<?php echo $this->lang->line("last_name"); ?>" name="last_name" class="form-control c-square c-theme input-lg" required>
              </div>
              <div class="form-group">
                <select class="form-control  c-square c-theme input-lg" name="cat" onChange="load_parent($(this).val())" id="cat" required>
                  <option label="<?php echo $this->lang->line("category"); ?>"></option>
                  <?php if($main_categories->num_rows()>0): ?>
                  <?php foreach($main_categories->result() as $cat): ?>
                  <option value="<?php  echo $cat->id; ?>" <?php if(isset($ad_detail_request)){if($cat->id===$ad_detail_request->category_id){echo 'selected="selected"';}} ?> ><?php echo $cat->category_name; ?></option>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control  c-square c-theme input-lg" name="sub_cat" id="parent_cat" required>
                  <option label="<?php echo $this->lang->line("sub_category"); ?>"></option>
                  <?php if(isset($ad_detail_request)){ ?>
                  <option value="<?php echo $ad_detail_request->parent_cat; ?>" <?php if(isset($ad_detail_request)){if($ad_detail_request->parent_cat===$ad_detail_request->parent_cat){echo 'selected="selected"';}} ?>><?php echo $ad_detail_request->parent_category; ?></option>
                  <?php } ?>
                </select>
              </div>
			  <div class="form-group">
                <select class="js-example-basic-single form-control  c-square c-theme input-lg" onchange="load_request_quote($(this).val())">
                  <option label="Select Product"><?php echo $this->lang->line("select_product"); ?></option>
                  <?php if($all_ads->num_rows()>0){ ?>
                  <?php foreach($all_ads->result() as $ads){ ?>
                  
                  <option value="<?php echo $ads->ad_id; ?>" <?php if(isset($ad_detail_request)){if($ads->ad_id===$ad_detail_request->id){echo 'selected="selected"';}} ?>><?php 
				  echo $ads->name; ?></option>
                  
                  <?php }} ?>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control  c-square c-theme input-lg" name="country" required>
                  <option label="<?php echo $this->lang->line("location"); ?>"></option>
                  <?php if($countries->num_rows()>0): ?>
                  <?php foreach($countries->result() as $countries): ?>
                  <option value="<?php echo $countries->id; ?>" ><?php echo $countries->name; ?></option>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
              <div class="form-group">
                <input type="email" placeholder="<?php echo $this->lang->line("email"); ?>" name="email" class="form-control c-square c-theme input-lg" required>
              </div>
              <div class="form-group">
                <input type="text" placeholder="<?php echo $this->lang->line("phone"); ?>" name="contact" class="form-control c-square c-theme input-lg" required>
              </div>
              <div class="form-group">
                <textarea rows="8" name="message" class="form-control c-theme c-square input-lg"><?php echo $this->lang->line("write_message"); ?>
                </textarea>
              </div>
              
              <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-lg c-btn-bold c-btn-square"><?php echo $this->lang->line("submit"); ?></button>
            </form>
            
          </div>
        </div>
        <div class="col-md-3 load_request_quote_left" style="margin-top:0%;">
          <table class="table">
            <thead>
            </thead>
            <tbody>
              <?php if(!empty($ad_detail_request->model)): ?>
              <tr>
                <td><strong>Model: </strong><?php echo $ad_detail_request->model; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->year)): ?>
              <tr>
                <td><strong>Year of manufacture: </strong><?php echo $ad_detail_request->year; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->serial_number)): ?>
              <tr>
                <td><strong>Serial Number: </strong><?php echo $ad_detail_request->serial_number; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->hours)): ?>
              <tr>
                <td><strong>Hours: </strong><?php echo $ad_detail_request->hours; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->refurbished)): ?>
              <tr>
                <td><strong>Refurbished: </strong><?php echo $ad_detail_request->refurbished; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->weight)): ?>
              <tr>
                <td><strong>Weight: </strong><?php echo $ad_detail_request->weight; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->engine)): ?>
              <tr>
                <td><strong>Engine: </strong><?php echo $ad_detail_request->engine; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->accessories)): ?>
              <tr>
                <td><strong>Accessories: </strong><?php echo $ad_detail_request->accessories; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->keyword)): ?>
              <tr>
                <td><strong>Keyword: </strong><?php echo $ad_detail_request->keyword; ?></td>
              </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(APPPATH."views/web/subscribe.php"); ?>
<?php include(APPPATH."views/web/about_text.php"); ?>
<?php include(APPPATH."views/web/inc/footer1.php"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
  $(".js-example-basic-single").select2();
});
</script> 
<script type="text/javascript">

function load_parent(id){
	
	$.post("<?php echo base_url("home/load_parent"); ?>", {id:id}).done(function(data){
		$("#parent_cat").html(data);
	});
	
	/*$.post("<?php echo site_url("home/load_parent"); ?>", {id:id}).done(function(data){
		$("#parent_cat").html(data);
		
	});*/
}

function load_request_quote(id){
	$.post("<?php echo site_url("request_quote/load_request_quote_right"); ?>",{id:id}).done(function(data){
		$(".load_request_quote_right").html(data);
		$("middle_portion").removeClass("col-md-offset-3");
	});
	
	$.post("<?php echo site_url("request_quote/load_request_quote_left"); ?>",{id:id}).done(function(data){
		$(".load_request_quote_left").html(data);
		$(".middle_portion").removeClass("col-md-offset-3");
	});
	
	$.post("<?php echo site_url("request_quote/load_ad"); ?>", {id:id}).done(function(data){
		var data = JSON.parse(data)
		load_parent(data.category_id);
		$('#cat>option[value="'+data.category_id+'"]').prop('selected', true);
		$('#parent_cat>option[value="'+data.parent_cat+'"]').prop('selected', true);
	});
	
	/*
	$.post("<?php echo site_url("request_quote/load_request_quote"); ?>", {id:id}).done(function(data){
		alert(data);
	));*/
}

</script>
<?php include(APPPATH."views/web/inc/footer2.php"); ?>
