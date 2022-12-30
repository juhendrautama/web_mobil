
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Series <?php echo form_error('series') ?></label>
            <input type="text" class="form-control" name="series" id="series" placeholder="Series" value="<?php echo $series; ?>" />
        </div>
	    <input type="hidden" name="id_series" value="<?php echo $id_series; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('series') ?>" class="btn btn-default">Cancel</a>
	</form>
   