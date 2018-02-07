<div class="form-group" id="row_ab_<?php echo $counter; ?>" style="display:none" >
  <div class="col-md-offset-2 col-md-7">
    <textarea name="description[<?php echo $counter; ?>]" data-required="1" class="form-control" rows="5" ></textarea>
  </div>
  <div class="col-md-1">
    <button type="button" class="btn btn-sm btn-danger" onclick="delete_ab_row(<?php echo $counter; ?>)" >Delete</button>
  </div>
</div>
