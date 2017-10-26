<div class="spec ">
    <h3>List Surve</h3>
    <div class="ser-t">
        <b></b>
        <span><i></i></span>
        <b class="line"></b>
    </div>
</div>
<div class=" con-w3l wthree-of">
<?php foreach ($data_surve as $key) { ?>
    <div class="col-md-3 pro-1">
        <div class="col-m">								
            <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                <img src="<?= $key->img?>" class="img-responsive" alt="">
            </a>
            <div class="mid-1">
                <div class="women">
                    <h6><a href="single.html"><?= $key->nama?></a></h6>							
                </div>
                <div class="mid-2">
                    <p ><em class="item_price"><?= $key->harga?></em></p>
                    <div class="block">
                        <div class="starbox small ghosting"> </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="add">
                <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="images/of.png">Add to Cart</button>
                </div>
                
            </div>
        </div>
    </div>
<?php } ?>
</div>