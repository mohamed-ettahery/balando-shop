<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('content') ?>
<div class="container">
    <h3 class="mb-3">Add new category</h3>
    <form action="<?=site_url('admin/Categories/insert')?>" style="width: 100vh;"  method="POST">
        <div class="col-md-12 form-group">
            <label for="nom">Name</label>
            <input type="text" name="name" id="name" value="<?=old('name')?>" required class="form-control form-control-lg">
        </div>
        <div class="col-md-12 form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" required class="form-control form-control-lg"><?=old('description')?></textarea>
        </div>
        <div class="col-12">
            <input type="submit" value="Add" name="add" class="btn btn-primary btn-lg px-5 mt-3">
        </div>
    </form>
</div>
<?= $this->endSection() ?>