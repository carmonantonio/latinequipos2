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
                <td><img src="<?php echo base_url("assets/web/uploads/noimage.jpg"); ?>" width="200" alt="" style="width:100%"></td>
              </tr>
              <?php }; ?>
              <tr align="center">
                <td><a href="<?php echo site_url("home/search_ad/".$ad_detail_request->id); ?>" class="btn btn-success c-btn-circle"><?php echo $this->lang->line("view_detail"); ?></a></td>
              </tr>
              <?php if(!empty($ad_detail_request->selling_price)): ?>
              <tr>
                <td><strong><?php echo $this->lang->line("price"); ?>: </strong><?php echo $ad_detail_request->selling_price; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->name)): ?>
              <tr>
                <td><strong><?php echo $this->lang->line("name"); ?>: </strong><?php echo $ad_detail_request->name; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->company)): ?>
              <tr>
                <td><strong><?php echo $this->lang->line("company"); ?>: </strong><?php echo $ad_detail_request->company; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->category_name)): ?>
              <tr>
                <td><strong><?php echo $this->lang->line("category"); ?>: </strong><?php echo $ad_detail_request->category_name." - ".$ad_detail_request->parent_category; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->ad_posting_date)): ?>
              <tr>
                <td><strong><?php echo $this->lang->line("ad_posting_date"); ?>: </strong><?php echo $ad_detail_request->ad_posting_date; ?></td>
              </tr>
              <?php endif; ?>
              <?php if(!empty($ad_detail_request->location)): ?>
              <tr>
                <td><strong><?php echo $this->lang->line("location"); ?>: </strong><?php echo $ad_detail_request->location; ?></td>
              </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>