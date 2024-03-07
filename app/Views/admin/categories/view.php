<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('content') ?>
<div class="container">
 <h6>Categories</h6>
 <div class="box-table">
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th></th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cats as $cat):?>
            <tr>
                <th scope="row"><?=$cat->id?></th>
                <td><?=$cat->name?></td>
                <td><?php 
                   if(strlen($cat->description)>30)
                   {
                    $cat->description = substr($cat->description,0,27)."...";
                   }
                   echo $cat->description;
                    ?>
                </td>
                <td>
                    <a href='<?=site_url("admin/Categories/edit/{$cat->id}")?>' class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <a href='<?=site_url("admin/Categories/delete/{$cat->id}")?>' class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
 </div>
 <a href="<?=site_url('admin/Categories/add')?>" class="btn btn-primary mt-4"><i class="fas fa-plus"></i> Add new Category</a>
</div>
<?= $this->endSection() ?>