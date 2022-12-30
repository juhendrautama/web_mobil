
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('cabang/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('cabang/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('cabang'); ?>" class="btn btn-default">Reset</a>
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
        <th>Foto</th>
		<th>Nama Cabang</th>
		<th>Alamat</th>
		<th>Jam Dealer</th>
		<th>Jam Service</th>
		<th>No Telp Dealer</th>
		<th>No Telp Service</th>
		<th>Pelayanan</th>
        <th>Status</th>
		<th>Action</th>
            </tr><?php
            foreach ($cabang_data as $cabang)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><img src="image/user/<?php echo $cabang->foto ?>" style="width: 100px;"></td>
			<td><?php echo $cabang->nama_cabang ?></td>
			<td><?php echo $cabang->alamat ?></td>
			<td><?php echo $cabang->jam_dealer ?></td>
			<td><?php echo $cabang->jam_service ?></td>
			<td><?php echo $cabang->no_telp_dealer ?></td>
			<td><?php echo $cabang->no_telp_service ?></td>
			<td><?php echo $cabang->pelayanan ?></td>
            <td><?php echo $retVal = ($cabang->status == '1') ? '<i style="color:green" class="fa fa-check"></i>' : '<i style="color:red" class="fa fa-ban"></i>'; ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('cabang/update/'.$cabang->id_cabang),'<span class="label label-info">Ubah</span>'); 
				echo ' | '; 
				echo anchor(site_url('cabang/delete/'.$cabang->id_cabang),'<span class="label label-danger">Hapus</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    