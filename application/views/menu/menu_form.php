
        <h2 style="margin-top:0px">Menu <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Jenis <?php echo form_error('id_jenis') ?></label>
            <select name="id_jenis" id="id_jenis" class="form-control" placeholder="Id Jenis" >
                <?php foreach ($data_jenis as $key) { ?>
                    <option value="<?= $key->id?>" <?php if($key->id == $id) echo "selected"; ?>><?= $key->jenis;?></option>
                <?php } ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Img <?php echo form_error('img') ?></label>
            <input type="text" class="form-control" name="img" id="img" placeholder="Img" value="<?php echo $img; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Harga <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('menu') ?>" class="btn btn-default">Cancel</a>
	</form>