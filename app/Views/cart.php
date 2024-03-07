<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
	<!-- Shoping Cart -->
    <div class="cart-content">
        <div class="content" style="margin: 40px;">
            <div class="container">
                <h2 class="text-secondary mb-4">Your cart</h2>
                <div class="row">
                    <div class="col-md-9 pt-4">
                        <?php if(!empty($items)): ?>
                            <div class="box-table table-responsive">
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Size</th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                    <?php foreach($items as $item):?>
                                        <?php $total = $total + ($item->price*$item->qty) ?>
                                        <tr>
                                            <td><img class="rounded-circle" style="width:60px" src='<?=base_url("images/products/$item->image")?>'/></td>
                                            <td class="pt-4"><?=$item->name?></td>
                                            <td class="pt-4"><?=$item->catName?></td>
                                            <td class="pt-4"><?="$".$item->price?></td>
                                            <td class="pt-4"><?=$item->qty?></td>
                                            <td class="pt-4"><?=$item->size?></td>
                                            <td class="pt-3"><a href='<?=site_url("Cart/delete/$item->id")?>' class="btn"><i class="fas fa-times text-danger"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p class="text-center text-secondary">Your Cart is empty !</p>
                        <?php endif; ?>

            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product" style="margin-top: 170px !important;">

                <?php foreach($relates as $relate): ?>
                    <div class="p-2 pb-3">
                        <div class="product-wap card rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src='<?=base_url("images/products/$relate->image")?>'>
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2" href='<?=site_url("Shop/details/$relate->id");?>'><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href='<?=site_url("Shop/details/$relate->id");?>'><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href='<?=site_url("Shop/details/$relate->id");?>' class="h3 text-decoration-none"><?=$relate->name?></a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>M/L/X/XL</li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <?php $c=0; ?>
                                        <?php for($i=0;$i<$relate->rating;$i++): ?>
                                            <?php $c++; ?>
                                            <i class="text-warning fa fa-star"></i>
                                        <?php endfor; ?>
                                        <?php for($i=$c;$i<5;$i++): ?>
                                            <i class="text-muted fa fa-star"></i>
                                        <?php endfor; ?>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$<?=$relate->price?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

                    </div>
                    <div class="col-md-3">
                        <?php if(!empty($items)): ?>
                            <div class="order-summary">
                                <h3>Order Summary</h3>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Order Total</td>
                                            <td><strong>$<?=$total?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Fees</td>
                                            <td><strong>$0</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Delivery</td>
                                            <td><strong>$0</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total</strong></td>
                                            <td><strong style="color: #59ab6e;">$<?=$total?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a class="btn btn-success" href="<?=site_url('Cart/purchase')?>" style="width: 100%;">purchase</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>