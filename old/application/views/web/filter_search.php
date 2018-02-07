<?php if($products->num_rows()>0){ ?>
          <?php foreach($products->result() as $product){ ?>
          <div class="row c-margin-b-40" style="border-bottom:1px solid #CCC">
            <div class="c-content-product-2 c-bg-white">
              <div class="col-md-3">
              <a href="<?php echo site_url("home/search_ad/".$product->id); ?>">
                <div class="c-content-overlay">
                  <?php
				  $picture = (object)json_decode($product->pictures);
					if(!empty((array)$picture)){
					foreach($picture as $picture){ ?>
                  <img src="<?php echo base_url("assets/web/uploads/products/".$picture); ?>" class="c-bg-img-center c-overlay-object" data-height="height" style="height: 150px;width:174px;"  />
				  	<?php break;
					}}else{ ?>
                    <img src="<?php echo base_url("assets/web/uploads/noimage.jpg"); ?>" class="c-bg-img-center c-overlay-object" data-height="height" style="height: 150px; width:174px"  />
                    <?php } ?>
                </div>
                </a>
              </div>
              <div class="col-md-9">
                <div class="c-info-list">
                  <h3 class="c-title c-font-bold c-font-22 c-font-dark"> <a class="c-theme-link" href="shop-product-details.html"><?php echo $product->name; ?></a> </h3>
                  <a href="<?php echo site_url("home/search_ad/".$product->id); ?>" class="btn c-theme-btn c-btn-circle"><p style="margin:0px !important;font-size:12px;">View Detail</p></a>
                  <p class="c-desc c-font-16 c-font-thin">
                  <table class="table">
                    <thead>
                    <tr>
                      <th>Category</th>
                      <th>Brand/Model</th>
                      <th>Construction Year</th>
                      <th>Location</th>
                      <th>Country</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <tr>
                    <td><?php echo $product->category_name; ?></td>
                    <td><?php echo $product->model; ?></td>
                    <td><?php echo $product->year; ?></td>
                    <td><?php echo $product->seller_address; ?></td>
                    <td><?php echo $product->country; ?></td>
                    </tr>
                    
                    </tbody>
                  </table>
                  </p>
                </div>
                <div> </div>
              </div>
            </div>
          </div>
          <?php }} ?>