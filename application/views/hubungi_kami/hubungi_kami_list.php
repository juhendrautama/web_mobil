
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php //echo anchor(site_url('hubungi_kami/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('hubungi_kami/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('hubungi_kami'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama</th>
		<th>Email</th>
		<th>Judul</th>
		<th>Action</th>
            </tr><?php
            foreach ($hubungi_kami_data as $hubungi_kami)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $hubungi_kami->nama ?></td>
			<td><?php echo $hubungi_kami->email ?></td>
			<td><?php echo $hubungi_kami->judul ?></td>
			<td style="text-align:center" width="200px">
				<?php 
                echo anchor(site_url('hubungi_kami/read/'.$hubungi_kami->id_hubungi),'<span class="label label-warning">Lihat</span>'); 
                echo ' | '; 
				echo anchor(site_url('hubungi_kami/update/'.$hubungi_kami->id_hubungi),'<span class="label label-info">Ubah</span>'); 
				echo ' | '; 
				echo anchor(site_url('hubungi_kami/delete/'.$hubungi_kami->id_hubungi),'<span class="label label-danger">Hapus</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    