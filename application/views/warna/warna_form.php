
<link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Warna <?php echo form_error('warna') ?></label>
            <input type="text" class="form-control" name="warna" id="warna" placeholder="Warna" value="<?php echo $warna; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Kode Warna</label>
            <input type="text" class="form-control my-colorpicker1" name="kode_warna" id="kode_warna" placeholder="Kode Warna" value="<?php echo $kode_warna; ?>" required/>
        </div>
	    <input type="hidden" name="id_warna" value="<?php echo $id_warna; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('warna') ?>" class="btn btn-default">Cancel</a>
	</form>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script type="text/javascript">
	//Colorpicker
    $('.my-colorpicker1').colorpicker();
</script>