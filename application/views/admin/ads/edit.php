<?php include(APPPATH."views/admin/inc/header1.php"); ?>
<?php include(APPPATH."views/admin/inc/header2.php"); ?>

<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN VALIDATION STATES-->
    <div class="portlet light portlet-fit portlet-form ">
      <div class="portlet-title">
        <div class="caption">
          <h3><span class="caption-subject sbold uppercase"><strong>Edit Advertisement</strong></span></h3>
        </div>
      </div>
      <!-- BEGIN FORM-->
      <form action="<?php echo site_url("admin/ads/update/".$ads_en->id); ?>" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
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
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-md-6">Name <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="name_en" data-required="1" class="form-control" value="<?php echo $ads_en->name; ?>"  />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Company <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="company_en" data-required="1" class="form-control" value="<?php echo $ads_en->company; ?>"  />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Select Seller<span class="required"> * </span> </label>
                <div class="col-md-6">
                  <select class="form-control" name="seller_id_en" >
                    <option label="Select Seller"></option>
                    <?php if($sellers_en->num_rows() > 0){ ?>
                    <?php foreach($sellers_en->result() as $sellers_en){ ?>
                    <option value="<?php echo $sellers_en->id; ?>" <?php if($sellers_en->id===$ads_en->seller_id){echo 'selected="selected"';} ?>><?php echo $sellers_en->name; ?></option>
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
                    <option value="<?php echo $categories_en->id; ?>" <?php if($categories_en->id===$ads_en->category_id){echo 'selected="selected"';} ?>><?php echo $categories_en->category_name; ?></option>
                    <?php  }} ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Select Parent Category<span class="required"> * </span> </label>
                <div class="col-md-6">
                  <select class="form-control" name="parent_cat_en" id="parent_cat_en" >
                  <?php
					$query = $this->db->query("SELECT c.id AS id, c.parent_cat, cl.category_name
					FROM categories c
					JOIN categories_lng AS cl ON cl.cat_id = c.id
					WHERE c.parent_cat = $ads_en->category_id AND cl.language_code = 'en'");
					foreach($query->result() as $parent_cats):
				  ?>
                  <option value="<?php echo $parent_cats->id; ?>" <?php if($parent_cats->id===$ads_en->parent_cat){echo 'selected="selected"';} ?>><?php echo $parent_cats->category_name; ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-6">Location<span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="location_en" data-required="1" class="form-control" value="<?php echo $ads_en->location; ?>" />
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-6">Brand/Model <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="model_en" data-required="1" class="form-control" value="<?php echo $ads_en->model; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Construction Year <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="year_en" data-required="1" class="form-control" value="<?php echo $ads_en->year; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Serial Number </label>
                <div class="col-md-6">
                  <input type="text" name="serial_number_en" data-required="1" class="form-control" value="<?php echo $ads_en->serial_number; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Working Hours </label>
                <div class="col-md-6">
                  <input type="text" name="hours_en" data-required="1" class="form-control" value="<?php echo $ads_en->hours; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Refurbished </label>
                <div class="col-md-6">
                  <input type="text" name="refurbished_en" data-required="1" class="form-control" value="<?php echo $ads_en->refurbished; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Weight </label>
                <div class="col-md-6">
                  <input type="text" name="weight_en" data-required="1" class="form-control" value="<?php echo $ads_en->weight; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Engine </label>
                <div class="col-md-6">
                  <input type="text" name="engine_en" data-required="1" class="form-control" value="<?php echo $ads_en->engine; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Accessories / Extra </label>
                <div class="col-md-6">
                  <input type="text" name="accessories_en" data-required="1" class="form-control" value="<?php echo $ads_en->accessories; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Keyword </label>
                <div class="col-md-6">
                  <input type="text" name="keyword_en" data-required="1" class="form-control" value="<?php echo $ads_en->keyword; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Selling Price</label>
                <div class="col-md-6">
                  <input type="text" name="selling_price_en" data-required="1" class="form-control" value="<?php echo $ads_en->selling_price; ?>" />
                </div>
              </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <div class="col-md-6" >
              <div class="form-group">
                <label class="control-label col-md-6">Nombre <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="name_es" data-required="1" class="form-control" value="<?php echo $ads_es->name; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Empresa <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="company_es" data-required="1" class="form-control" value="<?php echo $ads_es->company; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Seleccionar vendedor<span class="required"> * </span> </label>
                <div class="col-md-6">
                  <select class="form-control" name="seller_id_es" >
                    <option label="Seleccionar vendedor"></option>
                    <?php if($sellers_es->num_rows() > 0){ ?>
                    <?php foreach($sellers_es->result() as $sellers_es){ ?>
                    <option value="<?php echo $sellers_es->id; ?>" <?php if($sellers_es->id===$ads_es->seller_id){echo 'selected="selected"';} ?>><?php echo $sellers_es->name; ?></option>
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
                    <option value="<?php echo $categories_es->id; ?>" <?php if($categories_es->id===$ads_es->category_id){echo 'selected="selected"';} ?>><?php echo $categories_es->category_name; ?></option>
                    <?php  }} ?>
                  </select>
                </div>
                
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Seleccionar categoría principal<span class="required"> * </span> </label>
                <div class="col-md-6">
                  <select class="form-control" name="parent_cat_es" id="parent_cat_es" >
                  <?php
					$query1 = $this->db->query("SELECT c.id AS id, c.parent_cat, cl.category_name
					FROM categories c
					JOIN categories_lng AS cl ON cl.cat_id = c.id
					WHERE c.parent_cat = $ads_es->category_id AND cl.language_code = 'es'");
					foreach($query1->result() as $parent_cats1):
				  ?>
                  <option value="<?php echo $parent_cats1->id; ?>" <?php if($parent_cats1->id===$ads_en->parent_cat){echo 'selected="selected"';} ?>><?php echo $parent_cats1->category_name; ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-6">Ubicación<span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="location_es" data-required="1" class="form-control" value="<?php echo $ads_es->location; ?>" />
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-6">Modelo de marca <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="model_es" data-required="1" class="form-control" value="<?php echo $ads_es->model; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Construction Year <span class="required"> * </span> </label>
                <div class="col-md-6">
                  <input type="text" name="year_es" data-required="1" class="form-control" value="<?php echo $ads_es->year; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Número de serie </label>
                <div class="col-md-6">
                  <input type="text" name="serial_number_es" data-required="1" class="form-control" value="<?php echo $ads_es->serial_number; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Horas laborales </label>
                <div class="col-md-6">
                  <input type="text" name="hours_es" data-required="1" class="form-control" value="<?php echo $ads_es->hours; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Reformado</label>
                <div class="col-md-6">
                  <input type="text" name="refurbished_es" data-required="1" class="form-control" value="<?php echo $ads_es->refurbished; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Peso </label>
                <div class="col-md-6">
                  <input type="text" name="weight_es" data-required="1" class="form-control" value="<?php echo $ads_es->weight; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Motor </label>
                <div class="col-md-6">
                  <input type="text" name="engine_es" data-required="1" class="form-control" value="<?php echo $ads_es->engine; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Accesorios / Extra </label>
                <div class="col-md-6">
                  <input type="text" name="accessories_es" data-required="1" class="form-control" value="<?php echo $ads_es->accessories; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Palabra clave </label>
                <div class="col-md-6">
                  <input type="text" name="keyword_es" data-required="1" class="form-control" value="<?php echo $ads_es->keyword; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-6">Precio de venta</label>
                <div class="col-md-6">
                  <input type="text" name="selling_price_es" data-required="1" class="form-control" value="<?php echo $ads_es->selling_price; ?>" />
                </div>
              </div>
            </div>
          </div>
          
          
          
          
          
          
          
          
          
          
          
          
          <div class="form-group">
                <label class="control-label col-md-3">Country</label>
                <div class="col-md-3">
                  <select class="form-control" name="country_id">
                    <option label="Select Country"></option>
                    <?php if($countries->num_rows() > 0){ ?>
                    <?php foreach($countries->result() as $countries){ ?>
                    <option value="<?php echo $countries->id; ?>" <?php if($countries->id===$ads_en->country_id){echo 'selected="selected"';} ?>><?php echo $countries->name; ?></option>
                    <?php }} ?>
                  </select>
                </div>
              </div>
          <div class="form-group">
                <label class="control-label col-md-3">Ad Posting Date</label>
                <div class="col-md-6">
                  <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="<?php echo date("m/d/Y", strtotime($ads_en->ad_posting_date)) ?>" name="ad_posting_date" />
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
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          <!--<div class="form-group">
            <label class="control-label col-md-3">Name <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="name" data-required="1" class="form-control" value="<?php //echo $ads->name; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Company <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="company" data-required="1" class="form-control" value="<?php //echo $ads->company; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Select Seller<span class="required"> * </span> </label>
            <div class="col-md-4">
              <select class="form-control" name="seller_id">
                <option label="Select Seller"></option>
                <?php //if($sellers->num_rows() > 0){ ?>
                <?php //foreach($sellers->result() as $sellers){ ?>
                <option value="<?php //echo $sellers->id; ?>" <?php //if($sellers->id===$ads->seller_id){echo 'selected="selected"'; } ?> ><?php //echo $sellers->name; ?></option>
                <?php //}} ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Select Ad Category<span class="required"> * </span> </label>
            <div class="col-md-4">
              <select class="form-control" name="category_id" onchange="load_parent($(this).val())">
                <option label="Select Ad Category"></option>
                <?php //if($categories->num_rows() > 0){ ?>
                <?php //foreach($categories->result() as $categories){ ?>
                <option value="<?php //echo $categories->id; ?>" <?php //if($categories->id===$ads->category_id){echo 'selected="selected"'; } ?>><?php //echo $categories->category_name; ?></option>
                <?php //}} ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Select Parent Category<span class="required"> * </span> </label>
            <div class="col-md-4">
              <select class="form-control" name="parent_cat" id="parent_cat">
                <?php
              	/*$this->db->where("parent_cat", $ads->category_id);
				$query = $this->db->get("categories");
				foreach($query->result() as $parent_cats):*/
			  ?>
                <option value="<?php //echo $parent_cats->id; ?>" <?php //if($parent_cats->id==$ads->parent_cat){echo 'selected="selected"';} ?>><?php //echo $parent_cats->category_name; ?></option>
                <?php //endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Ad Posting Date</label>
            <div class="col-md-4">
              <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="<?php //echo date("m/d/Y", strtotime($ads->ad_posting_date)); ?>" name="ad_posting_date" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Location <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="location" data-required="1" class="form-control" value="<?php //echo $ads->location; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Country<span class="required"> * </span> </label>
            <div class="col-md-4">
              <select class="form-control" name="country_id">
                <option label="Select Country"></option>
                <?php //if($countries->num_rows() > 0){ ?>
                <?php //foreach($countries->result() as $countries){ ?>
                <option value="<?php //echo $countries->id; ?>" <?php //if($countries->id===$ads->country_id){echo 'selected="selected"';} ?>><?php //echo $countries->name; ?></option>
                <?php //}} ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Brand/Model <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="model" data-required="1" class="form-control" value="<?php //echo $ads->model; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Construction Year <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="year" data-required="1" class="form-control" required="required"  value="<?php //echo $ads->year; ?>"/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Serial Number <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="serial_number" data-required="1" class="form-control" value="<?php //echo $ads->serial_number; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Hours <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="hours" data-required="1" class="form-control" value="<?php //echo $ads->hours; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Refurbished <span class="required"> * </span> </label>
            <div class="col-md-4">
              <select class="form-control" name="refurbished">
                <option label="---Select---"></option>
                <option value="Yes" <?php //if($ads->refurbished=="Yes"){echo 'selected="selected"'; } ?>>Yes</option>
                <option value="No" <?php //if($ads->refurbished=="No"){echo 'selected="selected"'; } ?>>No</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Weight <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="weight" data-required="1" class="form-control" value="<?php //echo $ads->weight; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Engine <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="engine" data-required="1" class="form-control" value="<?php //echo $ads->engine; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Accessories / Extra <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="accessories" data-required="1" class="form-control" value="<?php //echo $ads->accessories; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Keyword <span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="keyword" data-required="1" class="form-control" value="<?php //echo $ads->keyword; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Selling Price<span class="required"> * </span> </label>
            <div class="col-md-4">
              <input type="text" name="selling_price" data-required="1" class="form-control" value="<?php //echo $ads->selling_price; ?>" />
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
        </div>-->
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
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
