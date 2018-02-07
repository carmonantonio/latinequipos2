<?php include(APPPATH."views/web/inc/header1.php"); ?>
<?php include(APPPATH."views/web/inc/header2.php"); ?>
<div class="c-layout-page">
  <div class="container">
    <?php include(APPPATH."views/web/inc/side_menu.php"); ?>
    <div class="c-layout-sidebar-content ">
      <?php include(APPPATH."views/web/inc/top_search.php"); ?>
      <div class="c-margin-t-30"></div>
      <div class="row">
        <div class="col-md-6">
          <div class="c-content-tab-1 c-theme c-margin-t-30">
            <div class="tab-content">
              <div class="tab-pane active" id="blog_recent_posts">
                <ul class="c-content-recent-posts-1">
                  <?php if($first->num_rows()>0): ?>
                  <?php foreach($first->result() as $first): ?>
                  <li>
                    <div class="c-image"> <a href="<?php echo site_url("home/search_by_cat/".$first->id); ?>"><img src="<?php echo site_url('assets/web/uploads/categories/'.$first->image); ?>" alt="" class="img-responsive"></a> </div>
                    <div class="c-post" style="padding: 22px 0;"> <a href="<?php echo site_url("home/search_by_cat/".$first->id); ?>" class="c-title"> <?php echo $first->category_name; ?> </a>
                    </div>
                  </li>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="c-content-tab-1 c-theme c-margin-t-30">
            <div class="tab-content">
              <div class="tab-pane active" id="blog_recent_posts">
                <ul class="c-content-recent-posts-1">
                  <?php if($second->num_rows()>0): ?>
                  <?php foreach($second->result() as $second): ?>
                  <li>
                    <div class="c-image"><a href="<?php echo site_url("home/search_by_cat/".$second->id); ?>"><img src="<?php echo site_url('assets/web/uploads/categories/'.$second->image); ?>" alt="" class="img-responsive"> </a></div>
                    <div class="c-post" style="padding: 22px 0;"> <a href="<?php echo site_url("home/search_by_cat/".$second->id); ?>" class="c-title"> <?php echo $second->category_name; ?> </a>
                    </div>
                  </li>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include(APPPATH."views/web/inc/footer1.php"); ?>
<?php include(APPPATH."views/web/inc/footer2.php"); ?>
