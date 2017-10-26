<div class="spec ">
    <h3>Surve Menu Makanan</h3>
    <div class="ser-t">
        <b></b>
        <span><i></i></span>
        <b class="line"></b>
    </div>
</div>
<form action="<?php echo $action; ?>" method="post"  role="form" class="form-horizontal">
    <?php $i=0;
    foreach($data as $key => $val){?>
        <div class="form-group">
            <label class="control-label"><?= $key ?></label>
        </div>
        <?php foreach($val as $jenis){ ?>
            <div class="input-group">
            <span class="input-group-addon">
            <input type="radio" name="<?= $key ?>" value="<?= $jenis ?>">
            </span>
            <input type="text" class="form-control" value="<?= $jenis ?>" disabled>
        </div><!-- /input-group -->
        <?php }
     }  ?>
    <button type="submit" class="btn btn-info">
        <span class="glyphicon glyphicon-search"></span> Search
    </button>  
</form>