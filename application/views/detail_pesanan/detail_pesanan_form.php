<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Detail_pesanan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Pesanan <?php echo form_error('id_pesanan') ?></label>
            <input type="text" class="form-control" name="id_pesanan" id="id_pesanan" placeholder="Id Pesanan" value="<?php echo $id_pesanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Menu <?php echo form_error('id_menu') ?></label>
            <input type="text" class="form-control" name="id_menu" id="id_menu" placeholder="Id Menu" value="<?php echo $id_menu; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jumlah <?php echo form_error('jumlah') ?></label>
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Total <?php echo form_error('total') ?></label>
            <input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detail_pesanan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>