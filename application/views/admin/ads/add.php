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
          <div class="row">
            <div class="col-md-6">
			<h3>Enter in English</h3>
              <div class="form-group">
                <label class="control-label col-md-6">Name <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="name_en" data-required="1" class="form-control"  />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Company <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="company_en" data-required="1" class="form-control"  />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Select Seller<span class="required"> * </span> </label>
                <div class="col-md-6">
                  <select class="form-control" name="seller_id_en" >
                    <option label="Select Seller"></option>
                    <?php if($sellers_en->num_rows() > 0){ ?>
                    <?php foreach($sellers_en->result() as $sellers_en){ ?>
                    <option value="<?php echo $sellers_en->id; ?>"><?php echo $sellers_en->name; ?></option>
                    <?php }} ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Select Ad Category<span class="required"> * </span> </label>
                <div class="col-md-6">
                  <select class="form-control" name="category_id_en" onchange="load_parent($(this).val(), 'en')" >
                    <option label="Select Ad Category"></option>
                    <?php if($categories_en->num_rows() > 0){ ?>
                    <?php foreach($categories_en->result() as $categories_en){ ?>
                    <option value="<?php echo $categories_en->id; ?>"><?php echo $categories_en->category_name; ?></option>
                    <?php  }} ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Select Parent Category<span class="required"> * </span> </label>
                <div class="col-md-6">
                  <select class="form-control" name="parent_cat_en" id="parent_cat_en" >
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-6">Location<span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="location_en" data-required="1" class="form-control"  />
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-6">Brand/Model <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="model_en" data-required="1" class="form-control"  />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Construction Year <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="year_en" data-required="1" class="form-control"  />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Serial Number </label>
                <div class="col-md-6">
                  <input type="text" name="serial_number_en" data-required="1" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Working Hours </label>
                <div class="col-md-6">
                  <input type="text" name="hours_en" data-required="1" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Refurbished </label>
                <div class="col-md-6">
                  <input type="text" name="refurbished_en" data-required="1" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Weight </label>
                <div class="col-md-6">
                  <input type="text" name="weight_en" data-required="1" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Engine </label>
                <div class="col-md-6">
                  <input type="text" name="engine_en" data-required="1" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Accessories / Extra </label>
                <div class="col-md-6">
                  <input type="text" name="accessories_en" data-required="1" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Keyword </label>
                <div class="col-md-6">
                  <input type="text" name="keyword_en" data-required="1" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Selling Price</label>
                <div class="col-md-6">
                  <input type="text" name="selling_price_en" data-required="1" class="form-control" />
                </div>
              </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <div class="col-md-6" >
			<h3> Entrar en español</h3>
              <div class="form-group">
                <label class="control-label col-md-6">Nombre <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="name_es" data-required="1" class="form-control"  />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Empresa <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="company_es" data-required="1" class="form-control"  />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Seleccionar vendedor<span class="required"> * </span> </label>
                <div class="col-md-6">
                  <select class="form-control" name="seller_id_es" >
                    <option label="Seleccionar vendedor"></option>
                    <?php if($sellers_es->num_rows() > 0){ ?>
                    <?php foreach($sellers_es->result() as $sellers_es){ ?>
                    <option value="<?php echo $sellers_es->id; ?>"><?php echo $sellers_es->name; ?></option>
                    <?php }} ?>
                  </select>
                </div>
                
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Seleccione una categoría de anuncio<span class="required"> * </span> </label>
                <div class="col-md-6">
                  <select class="form-control" name="category_id_es" onchange="load_parent($(this).val(), 'es')" >
                    <option label="Seleccione una categoría de anuncio"></option>
                    <?php if($categories_es->num_rows() > 0){ ?>
                    <?php foreach($categories_es->result() as $categories_es){ ?>
                    <option value="<?php echo $categories_es->id; ?>"><?php echo $categories_es->category_name; ?></option>
                    <?php  }} ?>
                  </select>
                </div>
                
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Seleccionar categoría principal<span class="required"> * </span> </label>
                <div class="col-md-6">
                  <select class="form-control" name="parent_cat_es" id="parent_cat_es" >
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-6">Ubicación<span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="location_es" data-required="1" class="form-control"  />
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-6">Modelo de marca <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="model_es" data-required="1" class="form-control"  />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Construction Year <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="year_es" data-required="1" class="form-control"  />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Número de serie </label>
                <div class="col-md-6">
                  <input type="text" name="serial_number_es" data-required="1" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Horas laborales </label>
                <div class="col-md-6">
                  <input type="text" name="hours_es" data-required="1" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Reformado</label>
                <div class="col-md-6">
                  <input type="text" name="refurbished_es" data-required="1" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Peso </label>
                <div class="col-md-6">
                  <input type="text" name="weight_es" data-required="1" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Motor </label>
                <div class="col-md-6">
                  <input type="text" name="engine_es" data-required="1" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Accesorios / Extra </label>
                <div class="col-md-6">
                  <input type="text" name="accessories_es" data-required="1" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Palabra clave </label>
                <div class="col-md-6">
                  <input type="text" name="keyword_es" data-required="1" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Precio de venta</label>
                <div class="col-md-6">
                  <input type="text" name="selling_price_es" data-required="1" class="form-control" />
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
                <label class="control-label col-md-3">Country</label>
                <div class="col-md-6">
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
                <label class="control-label col-md-3">Ad Posting Date</label>
                <div class="col-md-6">
                  <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" name="ad_posting_date" />
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

function load_parent(id, val){
	$.post("<?php echo site_url("admin/ads/load_parent"); ?>", {id:id,val:val}).done(function(data){
		if(val=="en"){
			$("#parent_cat_en").html(data);
		}else if(val=="es"){
			$("#parent_cat_es").html(data);
		}
	});
}

</script>
<?php include(APPPATH."views/admin/inc/footer2.php"); ?>
