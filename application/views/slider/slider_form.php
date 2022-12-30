
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Image <?php echo form_error('image') ?></label>
            <input type="file" class="form-control" name="image" id="image" />
            <input type="hidden" name="image_old" value="<?php echo $image; ?>">
            <div>
                <?php if ($image != ''): ?>
                    <b>*) Foto Sebelumnya : </b><br>
                    <img src="image/slide/<?php echo $image ?>" style="width: 100px;">
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label>Status Aktif</label>
            <select class="form-control" name="status" required>
                <option value="">--Pilih--</option>
                <option value="0" <?php echo $retVal = ($status == '0') ? 'selected' : '' ; ?> >Tidak</option>
                <option value="1" <?php echo $retVal = ($status == '1') ? 'selected' : '' ; ?> >Ya</option>
            </select>
        </div>
	    <input type="hidden" name="id_slider" value="<?php echo $id_slider; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('slider') ?>" class="btn btn-default">Cancel</a>
	</form>
   