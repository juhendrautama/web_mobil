
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('testimoni/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('testimoni/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('testimoni'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama</th>
		<th>Pekerjaan</th>
        <th>Deskripsi</th>
		<th>Status</th>
		<th>Action</th>
            </tr><?php
            foreach ($testimoni_data as $testimoni)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td>
                <img src="image/user/<?php echo $testimoni->foto ?>" style="width: 100px;">
            </td>
			<td><?php echo $testimoni->nama ?></td>
			<td><?php echo $testimoni->pekerjaan ?></td>
			<td><?php echo $testimoni->deskripsi ?></td>
            <td><?php echo $retVal = ($testimoni->status == '1') ? '<i style="color:green" class="fa fa-check"></i>' : '<i style="color:red" class="fa fa-ban"></i>' ; ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('testimoni/update/'.$testimoni->id_testimoni),'<span class="label label-info">Ubah</span>'); 
				echo ' | '; 
				echo anchor(site_url('testimoni/delete/'.$testimoni->id_testimoni),'<span class="label label-danger">Hapus</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    