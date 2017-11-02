        <h2 style="margin-top:0px">Detail_pesanan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Pesanan <?php echo form_error('id_pesanan') ?></label>
            <input type="text" class="form-control" name="id_pesanan" id="id_pesanan" placeholder="Id Pesanan" value="<?php echo $id_pesanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Menu <?php echo form_error('id_menu') ?></label>
            <select name="id_menu" id="id_menu" class="form-control" placeholder="Id Jenis" >
                <?php foreach ($data_menu as $key) { ?>
                    <option value="<?= $key->id?>" <?php if($key->id == $id) echo "selected"; ?>><?= $key->nama ;?></option>
                <?php } ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="int">Jumlah <?php echo form_error('jumlah') ?></label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" min="1"/>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detail_pesanan') ?>" class="btn btn-default">Cancel</a>
	</form>