
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            
            <label for="varchar">Kode Transaksi<?php echo form_error('kode_transaksi') ?></label>
            <input type="text" class="form-control" name="kode_transaksi" id="kode_transaksi" placeholder="Kode Transaksi" value="<?php echo $kode_transaksi; ?>" readonly/>
        </div>
	    <div class="form-group">
            <label for="date">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Nama Konsumen</label>
            <select class="form-control select2" name="id_konsumen" required>
                <option value="<?php echo $id_konsumen ?>"><?php echo get_data('konsumen','id_konsumen',$id_konsumen,'nama_konsumen'); ?></option>
                <?php foreach ($this->db->get('konsumen')->result() as $rw): ?>
                    <option value="<?php echo $rw->id_konsumen ?>"><?php echo $rw->nama_konsumen ?></option>
                <?php endforeach ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Tipe Pembayaran <?php echo form_error('tipe_pembayaran') ?></label>
            <select class="form-control select2" name="tipe_pembayaran" required>
                <option value="<?php echo $tipe_pembayaran ?>"><?php echo $tipe_pembayaran ?></option>
                <option value="Cash">Cash</option>
                <option value="Kredit">Kredit</option>
            </select>
        </div>
	    <div class="form-group">
            <label for="int">Mobil <?php echo form_error('id_mobil') ?></label>
            <select class="form-control select2" name="id_mobil" required>
                <option value="<?php echo $id_mobil ?>"><?php echo get_data('mobil','id_mobil',$id_mobil,'judul'); ?></option>
                <?php foreach ($this->db->get('mobil')->result() as $rw): ?>
                    <option value="<?php echo $rw->id_mobil ?>"><?php echo $rw->judul ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <input type="hidden" name="created_at" value="<?php echo get_waktu(); ?>" /> 
        <input type="hidden" name="user_at" value="<?php echo $this->session->userdata('id_user') ?>" /> 
	    <input type="hidden" name="id_penjualan" value="<?php echo $id_penjualan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penjualan') ?>" class="btn btn-default">Cancel</a>
	</form>
   