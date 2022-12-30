
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('mobil/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('mobil/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('mobil'); ?>" class="btn btn-default">Reset</a>
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
        <th>Judul</th>
        <th>Harga</th>
        <th>Beranda</th>
		<th>Status Aktif</th>
		<th>Action</th>
            </tr><?php
            foreach ($mobil_data as $mobil)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $mobil->judul ?></td>
            <td><?php echo number_format($mobil->harga) ?></td>
            <!-- <td> -->
                <?php
            //  $a=$mobil->stok_awal; 
            //  $b=$mobil->stok_keluar;
            //  echo $stok_akhir=$a-$b; 
             ?>
             <!-- </td> -->
            <td><?php echo $retVal = ($mobil->tampil_depan == '1') ? '<i style="color: green" class="fa fa-eye"></i>' : '<i style="color: red" class="fa fa-eye-slash"></i>' ; ?></td>
			<td><?php echo $retVal = ($mobil->status == '1') ? '<i style="color:green" class="fa fa-check"></i>' : '<i style="color:red" class="fa fa-ban"></i>'; ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('mobil/update/'.$mobil->id_mobil),'<span class="label label-info">Ubah</span>'); 
				echo ' | '; 
				echo anchor(site_url('mobil/delete/'.$mobil->id_mobil),'<span class="label label-danger">Hapus</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    