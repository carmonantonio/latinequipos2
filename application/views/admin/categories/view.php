<?php include(APPPATH."views/admin/inc/header1.php"); ?>
<style>
.buttons-copy {
	display: none !important;
}
.buttons-csv {
	display: none !important;
}
.buttons-collection {
	display: none !important;
}
</style>
<?php include(APPPATH."views/admin/inc/header2.php"); ?>

<div class="row">
  <div class="col-md-12">
	<?php if($this->session->flashdata('deleted_success')){ ?>
    <div class="alert alert-danger" align="center">
      <button class="close" data-close="alert"></button>
      <?php echo $this->session->flashdata('deleted_success'); ?> </div>
    <?php } ?>
    <div class="portlet light ">
      <div class="portlet-title">
        <div class="caption font-dark"> <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase">Buttons</span> </div>
        <div class="tools"> </div>
      </div>
      <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover" id="sample_1">
          <thead>
            <tr>
              <th>ID</th>
              <th>Category Name</th>
              <th>Parent Category Name</th>
              <th>Image</th>
              <th>Show on Main Page</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if($categories->num_rows()>0){ ?>
            <?php foreach($categories->result() as $categories){ ?>
            <tr>
              <td><?php echo $categories->id; ?></td>
              <td><?php echo $categories->category_name; ?></td>
              <td><?php echo $categories->parent_cat_name; ?></td>
              <td><img src="<?php echo site_url("assets/web/uploads/categories/".$categories->image); ?>" width="40" /></td>
              <td>
              Yes
              </td>
              <td>
                <a href="<?php echo site_url("admin/categories/getcategories/".$categories->id); ?>" class="btn btn-fit-height green dropdown-toggle">Edit</a>
                <a href="<?php echo site_url("admin/categories/deletecategories/".$categories->id); ?>" class="btn btn-fit-height red dropdown-toggle">Delete</a></td>
            </tr>
            <?php }} ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include(APPPATH."views/admin/inc/footer1.php"); ?>
<?php include(APPPATH."views/admin/inc/footer2.php"); ?>
