<?php include(APPPATH."views/admin/inc/header1.php"); ?>
<?php include(APPPATH."views/admin/inc/header2.php"); ?>

<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN VALIDATION STATES-->
    <div class="portlet light portlet-fit portlet-form ">
      <div class="portlet-title">
        <div class="caption">
          <h3><span class="caption-subject sbold uppercase"><strong>Ad New Advertisement</strong></span></h3>
        </div>
      </div>
      <!-- BEGIN FORM-->
      <form action="<?php echo site_url("admin/ads/insert"); ?>" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="form-body">
          <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            You have some form errors. Please check below. </div>
          <div class="alert alert-success display-hide">
            <button class="close" data-close="alert"></button>
            Your form validation is successful! </div>
          <?php if($this->session->flashdata('added_success')){ ?>
          <div class="alert alert-success" align="center">
            <button class="close" data-close="alert"></button>
            <?php echo $this->session->flashdata('added_success'); ?> </div>
          <?php } ?>
          <?php if($this->session->flashdata('already_exists')){ ?>
          <div class="alert alert-danger" align="center">
            <button class="close" data-close="alert"></button>
            <?php echo $this->session->flashdata('already_exists'); ?> </div>
          <?php } ?>
          <?php if($this->session->flashdata('error_occur')){ ?>
          <div class="alert alert-danger" align="center">
            <button class="close" data-close="alert"></button>
            <?php echo $this->session->flashdata('error_occur'); ?> </div>
          <?php } ?>
          <div class="form-group">
            <label class="control-label col-md-3">Name <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="name" data-required="1" class="form-control" required="required" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Company <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="company" data-required="1" class="form-control" required="required" />
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3">Select Seller<span class="required"> * </span> </label>
            <div class="col-md-4">
              <select class="form-control" name="seller_id" required="required">
                <option label="Select Seller"></option>
                <?php if($sellers->num_rows() > 0){ ?>
                <?php foreach($sellers->result() as $sellers){ ?>
                <option value="<?php echo $sellers->id; ?>"><?php echo $sellers->name; ?></option>
                <?php }} ?>
              </select>
            </div>
            <div class="col-md-3"> <a href="<?php echo site_url("admin/seller/add"); ?>" class="btn btn-default">Add New Seller</a> </div>
          </div>
          
          
          
          <div class="form-group">
            <label class="control-label col-md-3">Select Ad Category<span class="required"> * </span> </label>
            <div class="col-md-4">
              <select class="form-control" name="category_id" onchange="load_parent($(this).val())" required="required">
                <option label="Select Ad Category"></option>
                <?php if($categories->num_rows() > 0){ ?>
                <?php foreach($categories->result() as $categories){ ?>
                <option value="<?php echo $categories->id; ?>"><?php echo $categories->category_name; ?></option>
                <?php }} ?>
              </select>
            </div>
            <div class="col-md-3"> <a href="<?php echo site_url("admin/categories/add"); ?>" class="btn btn-default">Add New Category</a> </div>
          </div>
          
          
          <div class="form-group">
            <label class="control-label col-md-3">Select Parent Category<span class="required"> * </span> </label>
            <div class="col-md-4">
              <select class="form-control" name="parent_cat" id="parent_cat" required="required">
              </select>
            </div>
          </div>
          
          
          <div class="form-group">
            <label class="control-label col-md-3">Ad Posting Date</label>
            <div class="col-md-4">
              <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" name="ad_posting_date" />
            </div>
          </div>
          
          
          
          <div class="form-group">
            <label class="control-label col-md-3">Location<span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="location" data-required="1" class="form-control" required="required" />
            </div>
          </div>
          
          
          <div class="form-group">
            <label class="control-label col-md-3">Country</label>
            <div class="col-md-4">
              <select class="form-control" name="country_id">
                <option label="Select Country"></option>
                <?php if($countries->num_rows() > 0){ ?>
                <?php foreach($countries->result() as $countries){ ?>
                <option value="<?php echo $countries->id; ?>"><?php echo $countries->name; ?></option>
                <?php }} ?>
              </select>
            </div>
          </div>
          
          
          <div class="form-group">
            <label class="control-label col-md-3">Brand/Model <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="model" data-required="1" class="form-control" required="required" />
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3">Construction Year <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="year" data-required="1" class="form-control" required="required" />
            </div>
          </div>
          
          
          
          <div class="form-group">
            <label class="control-label col-md-3">Serial Number </label>
            <div class="col-md-4">
              <input type="text" name="serial_number" data-required="1" class="form-control" />
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3">Working Hours </label>
            <div class="col-md-4">
              <input type="text" name="hours" data-required="1" class="form-control" />
            </div>
          </div>
          
          
          <div class="form-group">
            <label class="control-label col-md-3">Refurbished </label>
            <div class="col-md-4">
              <select class="form-control" name="refurbished">
                <option label="---Select---"></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
          </div>
          
          
          <div class="form-group">
            <label class="control-label col-md-3">Weight </label>
            <div class="col-md-4">
              <input type="text" name="weight" data-required="1" class="form-control" />
            </div>
          </div>
          
          
          <div class="form-group">
            <label class="control-label col-md-3">Engine  </label>
            <div class="col-md-4">
              <input type="text" name="engine" data-required="1" class="form-control" />
            </div>
          </div>
          
          
          
          
          
          
          
          
          
          <div class="form-group">
            <label class="control-label col-md-3">Accessories / Extra </label>
            <div class="col-md-4">
              <input type="text" name="accessories" data-required="1" class="form-control" />
            </div>
          </div>
          
          
          <div class="form-group">
            <label class="control-label col-md-3">Keyword </label>
            <div class="col-md-4">
              <input type="text" name="keyword" data-required="1" class="form-control" />
            </div>
          </div>
          
          
          
          
          
          
          
          <div class="form-group">
            <label class="control-label col-md-3">Selling Price</label>
            <div class="col-md-4">
              <input type="text" name="selling_price" data-required="1" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputFile1"  class="control-label col-md-3">Upload Main Image</label>
            <div class="col-md-4">
              <input type="file" id="exampleInputFile2" name="userfile1" >
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputFile1"  class="control-label col-md-3">Upload Pictures</label>
            <div class="col-md-4">
              <input type="file" id="exampleInputFile2" name="userfile[]" multiple="multiple">
            </div>
          </div>
          
        </div>
        <div class="form-actions">
          <div class="row">
            <div class="col-md-offset-3 col-md-9">
              <button type="submit" class="btn green">Submit</button>
              <a href="<?php echo site_url("admin"); ?>" class="btn grey-salsa btn-outline">Cancel</a> </div>
          </div>
        </div>
      </form>
      <!-- END FORM--> 
      
    </div>
    <!-- END VALIDATION STATES--> 
  </div>
</div>
<?php include(APPPATH."views/admin/inc/footer1.php"); ?>
<script type="text/javascript">

function load_parent(id){
	$.post("<?php echo site_url("admin/ads/load_parent"); ?>", {id:id}).done(function(data){
		$("#parent_cat").html(data);
	});
}

</script>
<?php include(APPPATH."views/admin/inc/footer2.php"); ?>
