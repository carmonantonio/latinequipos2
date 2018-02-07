<div class="page-header-inner "> 
      <!-- BEGIN LOGO -->
      <?php include(APPPATH."views/admin/inc/nav_left.php"); ?>
      <!-- END LOGO --> 
      <!-- BEGIN MEGA MENU --> 
      <!-- DOC: Remove "hor-menu-light" class to have a horizontal menu with theme background instead of white background --> 
      <!-- DOC: This is desktop version of the horizontal menu. The mobile version is defined(duplicated) in the responsive menu below along with sidebar menu. So the horizontal menu has 2 seperate versions -->
      <?php include(APPPATH."views/admin/inc/nav_middle.php"); ?>
      <!-- END HEADER SEARCH BOX --> 
      <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
      <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> <span></span> </a> 
      <!-- END RESPONSIVE MENU TOGGLER --> 
      <!-- BEGIN TOP NAVIGATION MENU -->
      <?php include(APPPATH."views/admin/inc/nav_right.php"); ?>
      <!-- END TOP NAVIGATION MENU --> 
    </div>