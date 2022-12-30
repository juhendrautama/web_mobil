
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Foto </label>
            <input type="file" class="form-control" name="foto"  required="" />
            <div>
                <?php if ($foto != ''): ?>
                    <b>*) Foto Sebelumnya : </b><br>
                    <img src="image/user/<?php echo $foto ?>" style="width: 100px;">
                <?php endif ?>
            </div>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pekerjaan <?php echo form_error('pekerjaan') ?></label>
            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
        </div>
        <div class="form-group">
            <label>Status Aktif</label>
            <select class="form-control" name="status" required>
                <option value="">--Pilih--</option>
                <option value="0" <?php echo $retVal = ($status == '0') ? 'selected' : '' ; ?> >Tidak</option>
                <option value="1" <?php echo $retVal = ($status == '1') ? 'selected' : '' ; ?> >Ya</option>
            </select>
        </div>
	    <input type="hidden" name="id_testimoni" value="<?php echo $id_testimoni; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('testimoni') ?>" class="btn btn-default">Cancel</a>
	</form>
   