<div class="form-group" id="new_row_<?php echo $Counter; ?>">
  <div class="col-md-offset-2 col-md-7">
    <textarea name="tc[<?php echo $Counter; ?>]" data-required="1" rows="5" class="form-control" ></textarea>
  </div>
  <div class="col-md-1">
   <button type="button" class="btn btn-sm btn-danger" onClick="delete_row(<?php echo $Counter; ?>)">Delete</button>
  </div>
</div>
