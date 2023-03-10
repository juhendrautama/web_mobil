
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="varchar">Full Name <?php echo form_error('nama_lengkap') ?></label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="" />
            <div>
                *) Kosongkan, jika tidak dirubah
            </div>
            <input type="hidden" name="password_old" value="<?php echo $password ?>">
        </div>
        <div class="form-group">
            <label for="varchar">Level <?php echo form_error('level') ?></label>
            <!-- <input type="text" class="form-control" name="level" id="level" placeholder="Level" value="<?php echo $level; ?>" /> -->
            <select name="level" class="form-control">
                <option value="<?php echo $level ?>"><?php echo $level ?></option>
                <option value="admin">admin</option>
                <option value="operator">operator</option>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('foto') ?></label>
            <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
            <input type="hidden" name="foto_old" value="<?php echo $foto ?>">
            <div>
                <?php if ($foto != ''): ?>
                    <b>*) Foto Sebelumnya : </b><br>
                    <img src="image/user/<?php echo $foto ?>" style="width: 100px;">
                <?php endif ?>
            </div>
        </div>
        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('a_user') ?>" class="btn btn-default">Cancel</a>
    </form>
   