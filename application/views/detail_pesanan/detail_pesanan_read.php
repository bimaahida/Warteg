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
        <h2 style="margin-top:0px">Detail_pesanan Read</h2>
        <table class="table">
	    <tr><td>Id Pesanan</td><td><?php echo $id_pesanan; ?></td></tr>
	    <tr><td>Id Menu</td><td><?php echo $id_menu; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td>Total</td><td><?php echo $total; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detail_pesanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>