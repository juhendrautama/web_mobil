<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/tag-input/bootstrap-tagsinput.css">

        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="varchar">Foto Cabang </label>
            <input type="file" class="form-control" name="foto"/>
            <input type="hidden" name="foto_old" value="<?php echo $foto ?>" />
            <div>
                <?php if ($foto != ''): ?>
                    <b>*) Foto Sebelumnya : </b><br>
                    <img src="image/user/<?php echo $foto ?>" style="width: 100px;">
                <?php endif ?>
            </div>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Cabang <?php echo form_error('nama_cabang') ?></label>
            <input type="text" class="form-control" name="nama_cabang" id="nama_cabang" placeholder="Nama Cabang" value="<?php echo $nama_cabang; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Jam Dealer <?php echo form_error('jam_dealer') ?></label>
            <input type="text" class="form-control" name="jam_dealer" id="jam_dealer" placeholder="Jam Dealer" value="<?php echo $jam_dealer; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jam Service <?php echo form_error('jam_service') ?></label>
            <input type="text" class="form-control" name="jam_service" id="jam_service" placeholder="Jam Service" value="<?php echo $jam_service; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Telp Dealer <?php echo form_error('no_telp_dealer') ?></label>
            <input type="text" class="form-control" name="no_telp_dealer" id="no_telp_dealer" placeholder="No Telp Dealer" value="<?php echo $no_telp_dealer; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Telp Service <?php echo form_error('no_telp_service') ?></label>
            <input type="text" class="form-control" name="no_telp_service" id="no_telp_service" placeholder="No Telp Service" value="<?php echo $no_telp_service; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pelayanan <?php echo form_error('pelayanan') ?></label>


            <div class="checkbox">
                <?php 
                $pelayan_array = explode(',', $pelayanan);
                $arr = array('Penjualan', 'Service', 'Sparepart');
                $arrNames = array('Penjualan', 'Service', 'Sparepart');
                foreach($arr as $val) {
                    $set_checked = "";
                    if(in_array($val, $pelayan_array)) {
                        $set_checked = "checked";
                    }
                    // echo '<input type="checkbox" class="chk_boxes1" name="perm[]" value="$val" '.$set_checked.' > '.$arrNames[$val].' <br>';
                    echo '<label style="margin-right: 10px;"><input type="checkbox" name="pelayanan[]" value="'.$val.'" '.$set_checked.' >'.$val.'</label>';

                }
                 ?>
                <!-- <label style="margin-right: 10px;"><input type="checkbox" name="pelayanan[]" value="Penjualan">Penjualan</label>
                <label style="margin-right: 10px;"><input type="checkbox" name="pelayanan[]" value="Service">Service</label>
                <label><input type="checkbox" name="pelayanan[]" value="Sparepart">Sparepart</label> -->
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
	    <input type="hidden" name="id_cabang" value="<?php echo $id_cabang; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('cabang') ?>" class="btn btn-default">Cancel</a>
	</form>

<script type="text/javascript" src="assets/plugins/tag-input/bootstrap-tagsinput.min.js"></script>