<h2 style="margin-top:0px">Aturan <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="int">Parameter 1 <?php echo form_error('parameter_1') ?></label>
        <input type="text" class="form-control" name="parameter_1" id="parameter_1" placeholder="Parameter 1" value="<?php echo $parameter_1; ?>" />
    </div>
    <div class="form-group">
        <label for="int">Parameter 2 <?php echo form_error('parameter_2') ?></label>
        <input type="text" class="form-control" name="parameter_2" id="parameter_2" placeholder="Parameter 2" value="<?php echo $parameter_2; ?>" />
    </div>
    <div class="form-group">
        <label for="int">Hasil <?php echo form_error('hasil') ?></label>
        <input type="text" class="form-control" name="hasil" id="hasil" placeholder="Hasil" value="<?php echo $hasil; ?>" />
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('aturan') ?>" class="btn btn-default">Cancel</a>
</form>