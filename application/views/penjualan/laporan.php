<form method="post" action="Laporan">
    <table>
        <tr>
        <td><label>Tanggal</label> </td>
        <td>:</td>
        <?php if (isset($_POST['proses'])){ ?>
        <td><input type="date" class="form-control" name="tgl1" id="tgl1" value="<?php echo $_POST['tgl1'] ?>"></td>
        <td >&nbsp; <b>-</b>&nbsp; </td>
        <td><input type="date" class="form-control" name="tgl2" id="tgl2" value="<?php echo $_POST['tgl2'] ?>"></td>
        <?php }else if (isset($_POST['Grafik'])){ ?>
        <td><input type="date" class="form-control" name="tgl1" id="tgl1" value="<?php echo $_POST['tgl1'] ?>"></td>
        <td >&nbsp; <b>-</b>&nbsp; </td>
        <td><input type="date" class="form-control" name="tgl2" id="tgl2" value="<?php echo $_POST['tgl2'] ?>"></td>
        <?php }else{ ?>
        <td><input type="date" class="form-control" name="tgl1" id="tgl1" value=""></td>
        <td >&nbsp; <b>-</b>&nbsp; </td>
        <td><input type="date" class="form-control" name="tgl2" id="tgl2" value=""></td> 
        <?php } ?>   
        <td> &nbsp;</td>
        <td><input type="submit" class="btn btn-primary btn-sm" name="proses" value="Go Tampil"></td>
        <td> &nbsp;</td>
        <td><input type="submit" class="btn btn-warning btn-sm" name="Grafik"  value="Go Grafik"></td>
        <td> &nbsp;</td>
        <td><input type="submit" class="btn btn-danger btn-sm" name="cetak" value="Go Cetak"></td>
        
        </tr>
    </table>
</form>

<br><br>
<?php if (isset($_POST['proses'])){ ?>
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
        </tr>
        
        <?php $no=1; foreach ($tampil_data_penjualan_lap->result()as $penjualan){?>
        <tr>
			<td width="80px"><?php echo $no; ?></td>
			<td><?php echo $penjualan->kode_transaksi; ?></td>
            <td><?php echo $penjualan->tanggal; ?></td>
			<td>
                <?php
                    $id_konsumen=$penjualan->id_konsumen;
                    $data_konsumen=$this->Penjualan_model->Tampil_data_konsumen($id_konsumen);
                    echo $data_konsumen->nama_konsumen;
                ?>
            </td>
			<td><?php echo $penjualan->tipe_pembayaran; ?></td>
            <td>
            <?php
                    $id_mobil=$penjualan->id_mobil;
                    $data_mobil=$this->Penjualan_model->Tampil_data_mobil($id_mobil);
                    echo $data_mobil->judul;
                ?>
            </td>
			<td>
            Rp. <?php echo number_format($data_mobil->harga) ?>
            </td>
			<td><?php echo $penjualan->created_at; ?></td>
			<td>
            <?php
                    $id_user=$penjualan->user_at;
                    $data_user=$this->Penjualan_model->Tampil_data_user($id_user);
                    echo $data_user->nama_lengkap;
                ?>
            </td>
		</tr>
        <?php $no++; } ?>
        
          
       
        </table>    
</div>  
<?php }else if (isset($_POST['Grafik'])){ ?> 
   

<center><h2>GRAFIK</h2></center>
<div class="container">
		<div class="row mt-4">
			<div class="col-12">
				<canvas id="line" height="100"></canvas>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-8">
				<canvas id="bar"></canvas>
			</div>
			<div class="col-4">
				<canvas id="pie"></canvas>
			</div>
		</div>
	</div>

<!-- // hendra -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

<script> 
const tgl1="<?php echo $_POST['tgl1'] ?>" 
const tgl2="<?php echo $_POST['tgl2'] ?>" 


const myChart = (chartType) => {
    $.ajax({
        url: 'laporan/chart_data',
        method: 'post',
        data : {tgl1: tgl1, tgl2 : tgl2},
        success: data => {
            let chartX = []
			let chartY = []
            var countdata = data.length;
            console.log(data);
            //luping
            data.map( (data, index) => {
                            //load data tanggal
							chartX.push(data.tanggal)
                            //load data jumlah
							chartY.push(data.jumlah)
						})
                        const chartData = {
							labels: chartX,
							datasets: [
								{
									label: 'Jumlah Penjualan',
									data: chartY,
									backgroundColor: ['lightcoral'],
									borderColor: ['lightcoral'],
									borderWidth: 4
								}
							]
						}
                        const ctx = document.getElementById(chartType).getContext('2d')
						const config = {
							type: chartType,
							data: chartData
						}
                        switch(chartType) {
							case 'pie':
								const pieColor = ['salmon','red','green','blue','aliceblue','pink','orange','gold','plum','darkcyan','wheat','silver']
								chartData.datasets[0].backgroundColor = pieColor
								chartData.datasets[0].borderColor = pieColor
								break;
							case 'bar':
								chartData.datasets[0].backgroundColor = ['skyblue']
								chartData.datasets[0].borderColor = ['skyblue']
								break;
							default :
								config.options = {
									scales: {
										y: {
											beginAtZero: true
										}
									}
								}
						}
                        const chart = new Chart(ctx, config)
        }
    })
} 

		//myChart('line')
        //myChart('pie')
        myChart('bar')
</script>    
<!-- // hendra -->

<?php }else{} ?>      

