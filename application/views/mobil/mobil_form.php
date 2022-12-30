<link href="<?php echo base_url(); ?>assets/dropzone/dist/dropzone.css" type="text/css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/dropzone/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/tag-input/bootstrap-tagsinput.css">

<form action="<?php echo $action; ?>" enctype='multipart/form-data' method="post">
    <div class="form-group">
        <label for="varchar">Judul<?php echo form_error('judul') ?></label>
        <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Harga </label>
        <input type="number" class="form-control" name="harga" id="harga" placeholder="harga" value="<?php echo $harga; ?>" required/>
    </div>
    <div class="form-group">
        <label for="varchar">Unit</label>
        <input type="number" class="form-control" name="stok_awal" id="stok_awal" placeholder="Unit" value="<?php echo $stok_awal; ?>" required/>
    </div>
    <div class="form-group">
        <label>Tampilkan di Beranda</label>
        <select class="form-control" name="tampil_depan" required>
            <option value="">--Pilih--</option>
            <option value="0" <?php echo $retVal = ($status == '0') ? 'selected' : '' ; ?> >Tidak</option>
            <option value="1" <?php echo $retVal = ($status == '1') ? 'selected' : '' ; ?> >Ya</option>
        </select>
    </div>
    <div class="form-group">
        <label>Status Aktif</label>
        <select class="form-control" name="status" required>
            <option value="">--Pilih--</option>
            <option value="0" <?php echo $retVal = ($status == '0') ? 'selected' : '' ; ?> >Tidak</option>
            <option value="1" <?php echo $retVal = ($status == '1') ? 'selected' : '' ; ?> >Ya</option>
        </select>
    </div>
    <div class="form-group">
        <label>Series</label>
        <select class="form-control select2" name="id_series" required>
            <option value="<?php echo $id_series ?>"><?php echo get_data('series','id_series',$id_series,'series'); ?></option>
            <?php foreach ($this->db->get('series')->result() as $rw): ?>
                <option value="<?php echo $rw->id_series ?>"><?php echo $rw->series ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-group">
        <label>Type</label>
        <select class="form-control select2" name="id_type" required>
            <option value="<?php echo $id_type ?>"><?php echo get_data('type','id_type',$id_type,'type'); ?></option>
            <?php foreach ($this->db->get('type')->result() as $rw): ?>
                <option value="<?php echo $rw->id_type ?>"><?php echo $rw->type ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-group">
        <label>Warna</label>
        <select  name="id_warna[]" class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" required>
            <?php foreach ($this->db->get('warna')->result() as $rw): 
                if (strpos($id_warna, $rw->id_warna) !== false) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
            ?>
                <option value="<?php echo $rw->id_warna ?>" <?php echo $selected ?>><?php echo $rw->warna ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Kecepatan</label>
        <input type="text" name="kecepatan" class="form-control" value="<?php echo $kecepatan ?>" required>
    </div>
    <div class="form-group">
        <label>Transisi</label>
        <input type="text" name="transisi" class="form-control" value="<?php echo $transisi ?>" required>
    </div>
    <div class="form-group">
        <label>Bahan Bakar</label>
        <input type="text" name="bahan_bakar" class="form-control" value="<?php echo $bahan_bakar ?>" required>
    </div>
    <div class="form-group">
        <label>Kapasitas Bahan Bakar</label>
        <input type="text" name="kapasitas_bahan_bakar" class="form-control" value="<?php echo $kapasitas_bahan_bakar ?>" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" rows="3" name="deskripsi" id="editor" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
    </div>
    <div class="form-group">
        <label>Fitur Lainnya </label><span style="color: red;">*) Pisahkan dengan koma.</span><br>
        <input type="text" name="fitur_lain" value="<?php echo $fitur_lain ?>" data-role="tagsinput" class="form-control">
    </div>
    <div class="form-group">
        <label>Upload Brosur</label> <span style="color: red;">*) File hanya boleh PDF.</span> <br>
        <input type="file" name="brosur" class="form-control">
        <?php if ($brosur != ''): ?>
            <b>*) Brosur Sebelumnya : </b><br>
            <input type="hidden" name="brosur_old" value="<?php echo $brosur; ?>">
            <a href="image/file/<?php echo $brosur ?>" target="_blank">Download Brosur</a>
        <?php endif ?>
    </div>
    <div class="form-group">
        <label>Gambar Mobil</label>
        <?php if ($this->uri->segment(2) == 'update'): ?>

        <p style="color: red">*) Gambar pertama ini sebagai cover</p>
        <!-- <input class="form-control" type="file" name="files[]" required="" />
        <input class="form-control" type="file" name="files[]"/>
        <input class="form-control" type="file" name="files[]"/>
        <input class="form-control" type="file" name="files[]"/>
        <input class="form-control" type="file" name="files[]"/>
        <input class="form-control" type="file" name="files[]"/> -->
        <table class="table" id="list">
            <tr>
                <td>
                    <input class="form-control" type="file" name="files[]" />
                </td>
                <td>
                    <button class="btn btn-sm btn-primary" id=  "tambah">Tambah</button>
                </td>
            </tr>
        </table>
        <?php $no_baris = 1; ?>

        <?php
        $img = $this->db->get_where('gambar_mobil', array('id_mobil'=>$id_mobil)); 
        if ($img->num_rows() > 0) {
            ?>
            <b>*) Foto Sebelumnya : </b><br>
            <div class="row">
                <?php foreach ($img->result() as $rw): ?>
                <div class="col-md-2">
                    <img src="image/mobil/<?php echo $rw->gambar ?>" style="width: 100px;"><br>
                    <?php if ($rw->cover == '1'): ?>
                            
                        <span class="label label-success">Cover</span>

                    <?php else: ?>

                        <a href="app/jadikan_cover/<?php echo  $rw->id_mobil.'/'.$rw->id_gambar ?>" class="label label-info">jadikan Cover</a>

                    <?php endif ?>
                </div>
                <?php endforeach ?>
            </div>
            <?php
        }
         ?>

        <?php else: ?>

        <p style="color: red">*) Gambar pertama ini sebagai cover</p>
        <table class="table" id="list">
            <tr>
                <td>
                    <input class="form-control" type="file" name="files[]" required="" />
                </td>
                <td>
                    <button class="btn btn-sm btn-primary" id=  "tambah">Tambah</button>
                </td>
            </tr>
        </table>
        <?php $no_baris = 1; ?>

        <?php endif ?>
        
        
    </div>
    <input type="hidden" name="id_mobil" value="<?php echo $id_mobil; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('mobil') ?>" class="btn btn-default">Cancel</a>
</form>

<script type="text/javascript" src="assets/plugins/tag-input/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript">
    function rm_row(id) {
      $("#rm_"+id).remove();
    }
    $(document).ready(function() {
        var no = <?php echo $no_baris ?>;
        $("#tambah").click(function(e) {
            e.preventDefault();
            $("#list").append('<tr id="rm_'+no+'"><td><input class="form-control" type="file" name="files[]" required=""/></td><td><button onclick="rm_row('+no+')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td></tr>');
            no++;
        });
    });
</script>
