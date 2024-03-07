<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('content') ?>
<div class="container">
 <h6>Genders</h6>
 <div class="box-table">
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Entitled</th>
            <th></th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($genders as $gender):?>
            <tr>
                <th scope="row"><?=$gender->id?></th>
                <td><?=$gender->entitled?></td>
                <td></td>
                <td style="text-align: end;">
                    <a href='<?=site_url("admin/Genders/edit/{$gender->id}")?>' class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    <a href='<?=site_url("admin/Genders/delete/{$gender->id}")?>' class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
 </div>
 <a href="<?=site_url('admin/Genders/add')?>" class="btn btn-primary mt-4"><i class="fas fa-plus"></i> Add new Gender</a>
</div>
<?= $this->endSection() ?>