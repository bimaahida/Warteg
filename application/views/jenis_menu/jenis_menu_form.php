<h2 style="margin-top:0px">Jenis_menu <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">
<div class="form-group">
    <label for="varchar">Jenis <?php echo form_error('jenis') ?></label>
    <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" />
</div>
<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
<a href="<?php echo site_url('jenis_menu') ?>" class="btn btn-default">Cancel</a>
</form>