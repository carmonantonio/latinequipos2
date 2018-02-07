<?php

$seg1 = $this->uri->segment('1');
$seg2 = $this->uri->segment('2');
$seg3 = $this->uri->segment('3');



?>
<ul class="page-sidebar-menu  page-header-fixed hidden-sm hidden-xs" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
          <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element --> 
          <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
          
          <li class="nav-item start <?php if($seg1=='admin' && !($seg2)){echo "active open";} ?>"> <a href="<?php echo site_url("admin"); ?>" class="nav-link nav-toggle"> <i class="icon-home"></i> <span class="title">Dashboard</span></a>
            
          </li>
          <li class="heading">
            <h3 class="uppercase">Features</h3>
          </li>
          <li class="nav-item <?php if($seg2=='users'){echo "active open";} ?>"> <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-user"></i> <span class="title">Users</span> <span class="arrow"></span> </a>
            <ul class="sub-menu">
              <li class="nav-item <?php if($seg2 == 'users' && $seg3 == 'add'){echo 'active';} ?>"> <a href="<?php echo site_url("admin/users/add"); ?>" class="nav-link "> <span class="title">Add New</span> </a> </li>
              <li class="nav-item  <?php if($seg2 == 'users' && $seg3 == 'view'){echo 'active';} ?>"> <a href="<?php echo site_url("admin/users/view"); ?>" class="nav-link "> <span class="title">View All</span> </a> </li>
            </ul>
          </li>
          <li class="nav-item <?php if($seg2=='ads'){echo "active open";} ?>"> <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-social-dribbble"></i> <span class="title">Ads</span> <span class="arrow"></span> </a>
            <ul class="sub-menu">
              <li class="nav-item  <?php if($seg2 == 'ads' && $seg3 == 'add'){echo 'active';} ?>"> <a href="<?php echo site_url("admin/ads/add"); ?>" class="nav-link "> <span class="title">Add New</span> </a> </li>
              <li class="nav-item  <?php if($seg2 == 'ads' && $seg3 == 'view'){echo 'active';} ?>"> <a href="<?php echo site_url("admin/ads/view"); ?>" class="nav-link "> <span class="title">View All</span> </a> </li>
            </ul>
          </li>
          <li class="nav-item <?php if($seg2=='categories'){echo "active open";} ?>"> <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-social-dribbble"></i> <span class="title">Ads Categories</span> <span class="arrow"></span> </a>
            <ul class="sub-menu">
              <li class="nav-item  <?php if($seg2 == 'categories' && $seg3 == 'add'){echo 'active';} ?>"> <a href="<?php echo site_url("admin/categories/add"); ?>" class="nav-link "> <span class="title">Add New</span> </a> </li>
              <li class="nav-item  <?php if($seg2 == 'categories' && $seg3 == 'view'){echo 'active';} ?>"> <a href="<?php echo site_url("admin/categories/view"); ?>" class="nav-link "> <span class="title">View All</span> </a> </li>
            </ul>
          </li>
          <li class="nav-item <?php if($seg2=='seller'){echo "active open";} ?>"> <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-users"></i> <span class="title">Sellers</span> <span class="arrow"></span> </a>
            <ul class="sub-menu">
              <li class="nav-item  <?php if($seg2 == 'seller' && $seg3 == 'add'){echo 'active';} ?>"> <a href="<?php echo site_url("admin/seller/add"); ?>" class="nav-link "> <span class="title">Add New</span> </a> </li>
              <li class="nav-item  <?php if($seg2 == 'seller' && $seg3 == 'view'){echo 'active';} ?>"> <a href="<?php echo site_url("admin/seller/view"); ?>" class="nav-link "> <span class="title">View All</span> </a> </li>
            </ul>
          </li>
          <li class="nav-item <?php if($seg2=='news'){echo "active open";} ?>"> <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-docs"></i> <span class="title">News</span> <span class="arrow"></span> </a>
            <ul class="sub-menu">
              <li class="nav-item  <?php if($seg2 == 'news' && $seg3 == 'add'){echo 'active';} ?>"> <a href="<?php echo site_url("admin/news/add"); ?>" class="nav-link "> <span class="title">Add New</span> </a> </li>
              <li class="nav-item  <?php if($seg2 == 'news' && $seg3 == 'view'){echo 'active';} ?>"> <a href="<?php echo site_url("admin/news/view"); ?>" class="nav-link "> <span class="title">View All</span> </a> </li>
            </ul>
          </li>
          <li class="nav-item <?php if($seg2=='subscribers'){echo "active open";} ?>"> <a href="<?php echo site_url("admin/subscribers"); ?>" class="nav-link nav-toggle"> <i class="icon-feed"></i> <span class="title">Subscribers List</span> </a>
          </li>
          <li class="nav-item start <?php if($seg1=='admin' && $seg2=="dashboard" && $seg3=="video"){echo "active open";} ?>"> <a href="<?php echo site_url("admin/dashboard/video"); ?>" class="nav-link nav-toggle"> <i class="icon-home"></i> <span class="title">Add Video</span></a>
            
          </li>
          <li class="nav-item start <?php if($seg1=='advertisement' && !($seg2)){echo "active open";} ?>"> <a href="<?php echo site_url("admin/dashboard/advertisement"); ?>" class="nav-link nav-toggle"> <i class="icon-home"></i> <span class="title">Advertisement</span></a>
            
          </li>
          <!--<li class="nav-item "> <a href="<?php //echo site_url("terms_conditions/page"); ?>" class="nav-link nav-toggle"> <i class="icon-user"></i> <span class="title">Terms & Conditions Page</span> </a>
          </li>
          <li class="nav-item "> <a href="<?php //echo site_url("about_us/page"); ?>" class="nav-link nav-toggle"> <i class="icon-user"></i> <span class="title">About Us</span> </a>
          </li>-->
        </ul>