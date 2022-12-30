
<html lang="en">
    <head>
        <title>Laporan Penjualan</title>
    </head>
<body onload="window.print();" >
    <!-- <center style="margin-top:-75px;">  
             <font style="font-size:25px; ">PT. </font> </br>     
             <font style="font-size:10px; margin-top:-600px;">JL H Adam Malik, Handil Jaya No. 81 , Jambi, Indonesia </font><br>
             <font style="font-size:10px; ">HP : 082398567789</font> 
    </center> -->
<center>LAPORAN PENJUALAN </center>
<br>
        <table border="1" width="100%" style="border: 1px solid black;
  border-collapse: collapse;"> 
        <tr style="font-size: 10px;">
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
        <tr style="font-size: 10px;">
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



</body>
</html>