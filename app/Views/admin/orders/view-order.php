<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('content') ?>
<div class="container">
 <a href="<?=site_url('admin/Orders')?>" class="btn btn-outline-success mb-4"><i class="fas fa-arrow-left"></i> return</a>
 <h6>View Order</h6>
  <div class="order-box">
    <div class="container">
      <h2 class="text-center mb-4">N° Order <?=$order->id?> (<span class="badge rounded-pill bg-secondary"><?=$order->status?></span>)</h2>
      <div class="row">
        <div class="col-6">
          <div class="box-xlient-info">
            <strong>Client Name </strong><span><?=$order->clientName?></span><br/>
            <strong>Address </strong><span><?=$order->address?></span><br/>
            <strong>Phone </strong><span><?=$order->phone?></span><br/>
            <strong>Email </strong><span><?=$order->email?></span><br/>
          </div>
        </div>
        <div class="col-6 text-center">
          <strong>Order Date</strong>
           <p><?=$order->order_date?></p>
          <strong>Dilevry Date</strong>
           <p><?=$order->delivery_date?></p>
        </div>
      </div>
      <h6>Products</h6>
      <div class="box-table table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Size</th>
              <th scope="col">Qty</th>
            </tr>
          </thead>
          <tbody>
            <?php $total = 0 ?>
            <?php foreach($items as $item): ?>
              <?php $total = $total+($item->price*$item->proQty); ?>
              <tr>
                <td><img class="rounded-circle" style="width:60px" src='<?=base_url("images/products/$item->image")?>'/></td>
                <td class="pt-3"><?=$item->name?></td>
                <td class="pt-3"><?="$".$item->price?></td>
                <td class="pt-3"><?=$item->proSize?></td>
                <td class="pt-3"><?=$item->proQty?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <h5 class="text-end">Total <span>$<?=$total?></span></h5>
    </div>
  </div>
</div>
<?= $this->endSection() ?>