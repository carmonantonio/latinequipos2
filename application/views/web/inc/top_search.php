<form action="<?php echo site_url("home/search"); ?>" method="post">
  <div class="row" >
    <div class="col-md-12">
      <div class="input-group">
        <div class="input-group-btn search-panel">
          <button type="button" class="btn c-theme-btn dropdown-toggle" data-toggle="dropdown" > <span id="search_concept"><?php echo strtoupper($this->lang->line('search')); ?></span> </button>
        </div>
        <input type="text" class="form-control" name="search_string" >
        <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
        </span> </div>
    </div>
  </div>
</form>
