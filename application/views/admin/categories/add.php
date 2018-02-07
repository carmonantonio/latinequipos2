<?php include(APPPATH."views/admin/inc/header1.php"); ?>
<?php include(APPPATH."views/admin/inc/header2.php"); ?>

<div class="row">
<div class="col-md-12">
<div class="portlet light portlet-fit portlet-form ">
  <div class="portlet box yellow" style="margin-top:3%">
    <div class="portlet-title">
      <div class="caption"> <i class="fa fa-gift"></i>Add Category </div>
      <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> </div>
    </div>
    <div class="portlet-body">
      <form action="<?php echo site_url("admin/categories/insert"); ?>" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
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
		<div class="form-body">
		<div class="col-md-6">
		<h1 align="center">Enter In English</h1>
		<input type="hidden" name="lng_en" value="en">
                <div class="form-group">
                  <label class="control-label col-md-6">Category Name <span class="required"> * </span> </label>
                  <div class="col-md-6">
                    <input type="text" name="category_name_en" data-required="1" class="form-control" required="required" />
                  </div>
                </div>
				<div class="form-group">
                  <label class="control-label col-md-6">Parent Category <span class="required"> * </span> </label>
                  <div class="col-md-6">
                    <select class="form-control" name="parent_cat_en">
                      <option value="0">---Select---</option>
                      <?php if($cat_en->num_rows() > 0){ ?>
                      <?php foreach($cat_en->result() as $cat_en){ ?>
                      <option value="<?php echo $cat_en->id; ?>"><?php echo $cat_en->category_name; ?></option>
                      <?php }} ?>
                    </select>
                  </div>
                </div>
				
		</div>
		<div class="col-md-6">
		<h1 align="center">Ingresa en español</h1>
		<input type="hidden" name="lng_es" value="es">
                <div class="form-group">
                  <label class="control-label col-md-6">nombre de la categoría <span class="required"> * </span> </label>
                  <div class="col-md-6">
                    <input type="text" name="category_name_es" data-required="1" class="form-control" required="required" value="<?php set_value('category_name_es'); ?>" />
                  </div>
                </div>
				<div class="form-group">
                  <label class="control-label col-md-6">Categoría de Padres <span class="required"> * </span> </label>
                  <div class="col-md-6">
                    <select class="form-control" name="parent_cat_es">
                      <option value="0">---Select---</option>
                      <?php if($cat_es->num_rows() > 0){ ?>
                      <?php foreach($cat_es->result() as $cat_es){ ?>
                      <option value="<?php echo $cat_es->id; ?>"><?php echo $cat_es->category_name; ?></option>
                      <?php }} ?>
                    </select>
                  </div>
                </div> 
				
		</div>
				<!-- <div class="form-group">
                  <label class="control-label col-md-offset-2 col-md-3">Parent Category <span class="required"> * </span> </label>
                  <div class="col-md-3">
                    <select class="form-control" name="parent_cat_en">
                      <option value="0">---Select---</option>
                      <?php //if($cat_en->num_rows() > 0){ ?>
                      <?php //foreach($cat_en->result() as $cat_en){ ?>
                      <option value="<?php //echo $cat_en->id; ?>"><?php //echo $cat_en->category_name; ?></option>
                      <?php // }} ?>
                    </select>
                  </div>
                </div>-->
                <div class="form-group" style="margin-top:;">
                  <label for="exampleInputFile1"  class="control-label col-md-offset-2 col-md-3">Upload Image</label>
                  <div class="col-md-3">
                    <input type="file" id="exampleInputFile2" name="userfile" >
                  </div>
                </div>
              </div>
			  
			  <div class="form-group">
                  <label class="control-label col-md-offset-2 col-md-3">Show on Main Page <span class="required"> * </span> </label>
                  <div class="col-md-3">
                    <select class="form-control" name="image_show">
                      <option value="">---Select---</option>
                      <option value="Y">Yes</option>
                      <option value="N">No</option>
                    </select>
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
  </div>
</div>
<?php include(APPPATH."views/admin/inc/footer1.php"); ?>
<?php include(APPPATH."views/admin/inc/footer2.php"); ?>
