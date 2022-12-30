
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('penjualan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('penjualan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('penjualan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Transaksi</th>
        <th>Tanggal</th>
		<th>Nama Konsumen</th>
		<th>Tipe Pembayaran</th>
        <th>Mobil</th>
		<th>Harga</th>
		<th>Created At</th>
		<th>User At</th>
		<th>Action</th>
            </tr><?php
            foreach ($penjualan_data as $penjualan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $penjualan->kode_transaksi ?></td>
            <td><?php echo $penjualan->tanggal ?></td>
			<td><?php echo get_data('konsumen','id_konsumen',$penjualan->id_konsumen,'nama_konsumen') ?></td>
			<td><?php echo $penjualan->tipe_pembayaran ?></td>
            <td><?php echo get_data('mobil','id_mobil',$penjualan->id_mobil,'judul') ?></td>
			<td>Rp. <?php echo number_format(get_data('mobil','id_mobil',$penjualan->id_mobil,'harga')) ?></td>
			<td><?php echo $penjualan->created_at ?></td>
			<td><?php echo get_data('a_user','id_user',$penjualan->user_at,'nama_lengkap') ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('penjualan/update/'.$penjualan->id_penjualan),'<span class="label label-info">Ubah</span>'); 
				echo ' | '; 
				echo anchor(site_url('penjualan/delete/'.$penjualan->id_penjualan),'<span class="label label-danger">Hapus</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    