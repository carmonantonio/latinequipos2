<?php include(APPPATH."views/admin/inc/header1.php"); ?>
<?php include(APPPATH."views/admin/inc/header2.php"); ?>

<div class="row">
  <div class="col-md-12">
    <div class="portlet light portlet-fit portlet-form ">
      <div class="portlet-title">
        <div class="caption">
          <h3><span class="caption-subject sbold uppercase"><strong>Edit Category</strong></span></h3>
        </div>
      </div>
      <form action="<?php echo site_url("admin/categories/update/".$category_en->id); ?>" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="form-body">
          <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            You have some form errors. Please check below. </div>
          <div class="alert alert-success display-hide">
            <button class="close" data-close="alert"></button>
            Your form validation is successful! </div>
          <?php if($this->session->flashdata('updated_success')){ ?>
          <div class="alert alert-success" align="center">
            <button class="close" data-close="alert"></button>
            <?php echo $this->session->flashdata('updated_success'); ?> </div>
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
		  <div class="row">
			<div class="col-md-6" >
			<div class="form-group">
            <label class="control-label col-md-3">Category Name <span class="required"> * </span> </label>
            <div class="col-md-6">
              <input type="text" name="category_name_en" data-required="1" class="form-control" value="<?php echo $category_en->category_name; ?>" />
            </div>
          </div>
         
          <div class="form-group">
              <label class="control-label col-md-3">Parent Category <span class="required"> * </span> </label>
              <div class="col-md-6">
                <select class="form-control" name="parent_cat_en">
                  <option label="Select...."></option>
                  <?php if($cat_en->num_rows() > 0){ ?>
                      <?php foreach($cat_en->result() as $cat_en){ ?>
                      <option value="<?php echo $cat_en->id; ?>" <?php if($cat_en->id===$category_en->parent_cat){echo 'selected="selected"';} ?>><?php echo $cat_en->category_name; ?></option>
                      <?php }} ?>
                </select>
              </div>
            </div>
			</div>
			<div class="col-md-6" >
			<div class="form-group">
            <label class="control-label col-md-3">nombre de la categoría <span class="required"> * </span> </label>
            <div class="col-md-6">
              <input type="text" name="category_name_es" data-required="1" class="form-control" value="<?php echo $category_es->category_name; ?>" />
            </div>
          </div>
         
          <div class="form-group">
              <label class="control-label col-md-3">Categoría de Padres <span class="required"> * </span> </label>
              <div class="col-md-6">
                <select class="form-control" name="parent_cat_es">
                  <option label="Select...."></option>
                  <?php if($cat_es->num_rows() > 0){ ?>
                      <?php foreach($cat_es->result() as $cat_es){ ?>
                      <option value="<?php echo $cat_es->id; ?>" <?php if($cat_es->id===$category_es->parent_cat){echo 'selected="selected"';} ?>><?php echo $cat_es->category_name; ?></option>
                      <?php }} ?>
                </select>
              </div>
            </div>	
			</div>
            </div>
			 <div class="form-group">
              <label class="control-label col-md-3">Show on Main Page<span class="required"> * </span> </label>
              <div class="col-md-4">
                <select class="form-control" name="image_show">
                  <option label="Select...."></option>
                  <option value="Y" <?php if($category_en->image_show=="Y"){echo 'selected="selected"';} ?>>Yes</option>
                  <option value="N" <?php if($category_en->image_show=="N" OR $category_en->image_show==""){echo 'selected="selected"';} ?>>No</option>
                </select>
              </div>
			  </div>			
			 <div class="form-group">
            <label for="exampleInputFile1"  class="control-label col-md-3">Upload Image</label>
            <div class="col-md-3">
              <input type="file" id="exampleInputFile2" name="userfile" >
            </div>
            <div class="col-md-3">
            <img src="<?php echo site_url("assets/web/uploads/categories/".$category_en->image); ?>" width="70" />
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
  </div>
</div>
<?php include(APPPATH."views/admin/inc/footer1.php"); ?>
<?php include(APPPATH."views/admin/inc/footer2.php"); ?>
