<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('content') ?>
<div class="container">
 <h6>Products</h6>
 <div class="box-table">
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Gender</th>
            <th></th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product):?>
            <tr>
                <td>
                    <img  class="rounded-circle " src='<?=base_url("images/products/$product->image")?>' style="width:60px"/>
                </td>
                <td><?=$product->name?></td>
                <td>$<?=$product->price?></td>
                <td><?=$product->catName?></td>
                <td><?=$product->genderName?></td>
                <td>
                    <a href='<?=site_url("admin/Products/edit/{$product->id}")?>' class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <a href='<?=site_url("admin/Products/delete/{$product->id}")?>' class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        <?= $pager->links() ?>
    </div>
 </div>
 <a href="<?=site_url('admin/Products/add')?>" class="btn btn-primary mt-4"><i class="fas fa-plus"></i> Add new Product</a>
</div>
<?= $this->endSection() ?>