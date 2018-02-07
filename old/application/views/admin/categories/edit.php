<?php include(APPPATH."views/admin/inc/header1.php"); ?>
<?php include(APPPATH."views/admin/inc/header2.php"); ?>

<div class="row">
  <div class="col-md-12">
    <div class="portlet light portlet-fit portlet-form ">
      <div class="portlet-title">
        <div class="caption">
          <h3><span class="caption-subject sbold uppercase"><strong>Add Category</strong></span></h3>
        </div>
      </div>
      <form action="<?php echo site_url("admin/categories/update/".$category->id); ?>" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
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
          <div class="form-group">
            <label class="control-label col-md-3">Category Name <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="category_name" data-required="1" class="form-control" value="<?php echo $category->category_name; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputFile1"  class="control-label col-md-3">Upload Image</label>
            <div class="col-md-4">
              <input type="file" id="exampleInputFile2" name="userfile" >
            </div>
            <div class="col-md-3">
            <img src="<?php echo site_url("assets/web/uploads/categories/".$category->image); ?>" width="70" />
            </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3">Parent Category <span class="required"> * </span> </label>
              <div class="col-md-4">
                <select class="form-control" name="parent_cat">
                  <option label="Select...."></option>
                  <?php if($categories->num_rows() > 0){ ?>
                   <?php foreach($categories->result() as $categories): ?>
                  <option value="<?php $categories->id; ?>" <?php if($categories->id===$category->parent_cat){echo 'selected="selected"';} ?>><?php echo $categories->category_name; ?></option>
                  <?php endforeach; } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Show on Main Page<span class="required"> * </span> </label>
              <div class="col-md-4">
                <select class="form-control" name="image_show">
                  <option label="Select...."></option>
                  <option value="Y" <?php if($category->image_show=="Y"){echo 'selected="selected"';} ?>>Yes</option>
                  <option value="N" <?php if($category->image_show=="N"){echo 'selected="selected"';} ?>>No</option>
                </select>
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
