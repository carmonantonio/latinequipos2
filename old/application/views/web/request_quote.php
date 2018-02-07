<?php include(APPPATH."views/web/inc/header1.php"); ?>
<?php include(APPPATH."views/web/inc/header2.php"); ?>
<div class="c-layout-page">
  <div class="container">
    <div class="c-content-box c-size-lg c-no-padding c-overflow-hide c-bg-white">
      <div class="row" style="margin:5% 0%">
        <?php if($this->session->flashdata('email_sent')){ ?>
        <div class="alert alert-success" align="center">
          <button class="close" data-close="alert"></button>
          <?php echo $this->session->flashdata('email_sent'); ?> </div>
        <?php } ?>
        <div class="col-md-offset-3 col-md-6" align="center"  >
          <div class="c-contact">
            <div class="c-content-title-1">
              <h3 class="c-font-uppercase c-font-bold">Request a Quote</h3>
              <div class="c-line-left"></div>
            </div>
            <form action="<?php echo site_url("request_quote/add_quote"); ?>" method="post">
              <div class="form-group">
                <input type="text" placeholder="Your First Name" name="first_name" class="form-control c-square c-theme input-lg" required>
              </div>
              <div class="form-group">
                <input type="text" placeholder="Your Last Name" name="last_name" class="form-control c-square c-theme input-lg" required>
              </div>
              <div class="form-group">
                <select class="form-control  c-square c-theme input-lg" name="cat" onChange="load_parent($(this).val())" required>
                  <option label="Select Category"></option>
                  <?php if($main_categories->num_rows()>0): ?>
                  <?php foreach($main_categories->result() as $cat): ?>
                  <option value="<?php  echo $cat->id; ?>" <?php if(isset($ad_detail_request)){if($cat->id===$ad_detail_request->category_id){echo 'selected="selected"';}} ?> ><?php echo $cat->category_name; ?></option>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control  c-square c-theme input-lg" name="sub_cat" id="parent_cat" required>
                  <option label="Select Sub-Category"></option>
                  <?php if(isset($ad)){ ?>
                  <option value="<?php echo $ad_detail_request->parent_cat; ?>" selected="selected"><?php echo $ad_detail_request->parent_category; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control  c-square c-theme input-lg" name="country" required>
                  <option label="Your Location"></option>
                  <?php if($countries->num_rows()>0): ?>
                  <?php foreach($countries->result() as $countries): ?>
                  <option value="<?php echo $countries->id; ?>" ><?php echo $countries->name; ?></option>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
              <div class="form-group">
                <input type="email" placeholder="Your Email" name="email" class="form-control c-square c-theme input-lg" required>
              </div>
              <div class="form-group">
                <input type="text" placeholder="Contact Phone" name="contact" class="form-control c-square c-theme input-lg" required>
              </div>
              <div class="form-group">
                <textarea rows="8" name="message" name="message" placeholder="Write comment here ..." class="form-control c-theme c-square input-lg">
                </textarea>
              </div>
              <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-lg c-btn-bold c-btn-square">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(APPPATH."views/web/inc/footer1.php"); ?>
<script type="text/javascript">

function load_parent(id){
	$.post("<?php echo site_url("home/load_parent"); ?>", {id:id}).done(function(data){
		//alert(data);
		$("#parent_cat").html(data);
	});
}

</script>
<?php include(APPPATH."views/web/inc/footer2.php"); ?>
