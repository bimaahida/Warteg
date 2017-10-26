
        <h2 style="margin-top:0px">Jenis_parameter <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Parameter <?php echo form_error('parameter') ?></label>
            <input type="text" class="form-control" name="parameter" id="parameter" placeholder="Parameter" value="<?php echo $parameter; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenis_parameter') ?>" class="btn btn-default">Cancel</a>
	</form>