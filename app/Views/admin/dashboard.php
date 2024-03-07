<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('content') ?>
<div class="dashboard-content">
    <div class="container">
        <!-- boxes stats -->
        <div class="row">
            <div class="col-md-3">
                <div class="box">
                   <i class="fas fa-shopping-basket"></i>
                    <h6 class="text-secondary">Orders</h6>
                    <h6><?=$countOrders?></h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box">
                    <i class="fa fa-hourglass-start"></i>
                    <h6 class="text-secondary">Pending Orders</h6>
                    <h6><?=$pendingOrders?></h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box">
                    <i class="fas fa-boxes"></i>
                    <h6 class="text-secondary">Products</h6>
                    <h6><?=$countProducts?></h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box">
                    <i class="fa fa-sitemap"></i>
                    <h6 class="text-secondary">Categories</h6>
                    <h6><?=$countCategories?></h6>
                </div>
            </div>
        </div>
        <!-- last orders -->
        <div class="last-orders mt-5 pt-4">
            <h4 class="text-secondary">Last orders</h4>
            <div class="box-table table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Status</th>
                        <th></th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order):?>
                        <tr>
                            <td class="pt-3"><?=$order->id?></td>
                            <td class="pt-3"><?=$order->clientName?></td>
                            <td class="pt-3"><?=$order->phone?></td>
                            <td class="pt-3"><?=$order->email?></td>
                            <td class="pt-3"><?=$order->order_date?></td>
                            <td class="pt-3">
                                <?php
                                switch($order->status)
                                {
                                    case "pending"  : ?> <span class="badge rounded-pill bg-secondary"><?=$order->status?></span> <?php break;
                                    case "canceled" : ?> <span class="badge rounded-pill bg-danger"><?=$order->status?></span> <?php break;
                                    case "confirmed": ?> <span class="badge rounded-pill bg-success"><?=$order->status?></span> <?php break;
                                }
                                ?>
                            </td>
                            <td>
                            <?php if($order->status == "pending"):?>
                                <a href='<?=site_url("admin/Orders/confirm/{$order->id}")?>' class="mb-1 btn  btn-outline-success"><i class="fas fa-check"></i></a>
                                <a href='<?=site_url("admin/Orders/cancel/{$order->id}")?>' class="mb-1  btn btn-outline-danger"><i class="fas fa-times"></i></a>
                            <?php endif; ?>
                                <a href='<?=site_url("admin/Orders/vieworder/{$order->id}")?>' class="mb-1  btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href='<?=site_url("admin/Orders/delete/{$order->id}")?>' class="mb-1  btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>