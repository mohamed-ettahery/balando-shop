<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('content') ?>
<div class="container">
    <h3 class="mb-4">Edit gender</h3>
    <form action='<?=site_url("admin/Genders/update/$gender->id")?>' style="width: 100vh;"  method="POST">
        <div class="col-md-12 form-group">
            <label for="entitled">Entitled</label>
            <input type="text" name="entitled" id="entitled" value="<?=old('entitled',$gender->entitled)?>" required class="form-control form-control-lg">
        </div>
        <div class="col-12">
            <input type="submit" value="Edit" name="add" class="btn btn-primary btn-lg px-5 mt-3">
        </div>
    </form>
</div>
<?= $this->endSection() ?>