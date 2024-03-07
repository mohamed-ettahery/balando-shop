<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('content') ?>
<div class="container">
    <h3 class="mb-3">Add new Product</h3>
    <form action="<?=site_url('admin/Products/insert')?>"  method="POST" enctype="multipart/form-data">
        <div class="col-md-12 form-group">
            <div class="row">
                <div class="col-md-6">
                  <label for="nom">Name</label>
                  <input type="text" name="name" id="name" value="<?=old('name')?>" required class="form-control form-control-lg">
                </div>
                <div class="col-md-6">
                  <label for="nom">Price</label>
                  <input type="number" name="price" id="price" value="<?=old('price')?>" required class="form-control form-control-lg">
                </div>
            </div>
        </div>
        <div class="col-md-12 form-group">
            <div class="row">
                <div class="col-md-6">
                  <label for="category">Category</label>
                  <select class="form-select form-control" name="id_cat" id="category">
                     <?php foreach($cats as $cat): ?>
                        <option value="<?=$cat->id?>"><?=$cat->name?></option>
                     <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="gender">Gender</label>
                  <select class="form-select form-control" name="id_gender" id="gender">
                     <?php foreach($genders as $gender): ?>
                        <option value="<?=$gender->id?>"><?=$gender->entitled?></option>
                     <?php endforeach; ?>
                  </select>
                </div>
            </div>
        </div>
        <div class="col-md-12 form-group">
            <div class="row">
                <div class="col-md-6">
                  <label for="description">Description</label>
                  <textarea name="description" id="description" required class="form-control form-control-lg"><?=old('description')?></textarea>
                </div>
                <div class="col-md-6">
                  <label for="rating">Rating</label>
                  <select class="form-select form-control" name="rating" id="rating">
                     <option value="1">★</option>
                     <option value="2">★★</option>
                     <option value="3">★★★</option>
                     <option value="4">★★★★</option>
                     <option value="5">★★★★★</option>
                  </select>
                </div>
            </div>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-md-6">
                <label for="add-image">Image</label>
                <input type="file" name="image" id="add-image" required class="form-control" accept="image/png, image/jpeg, image/jpg"/>
            </div>
            <div class="col-md-6">
                <img  style="width: 60%;height: 240px;" class="view_add_img"/>
            </div>
          </div>
        </div>
        <div class="col-12">
            <input type="submit" value="Add" name="add" class="btn btn-primary btn-lg px-5 mt-3">
        </div>
    </form>
</div>
<?= $this->endSection() ?>