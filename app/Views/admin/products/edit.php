<?= $this->extend('admin/layouts/master') ?>
<?= $this->section('content') ?>
<div class="container">
    <h3 class="mb-3">Edit Product</h3>
    <form action='<?=site_url("admin/Products/update/$product->id")?>' method="POST" enctype="multipart/form-data">
        <div class="col-md-12 form-group mb-3">
            <div class="row">
                <div class="col-md-6">
                  <label for="nom">Name</label>
                  <input type="text" name="name" id="name" value="<?=old('name',$product->name)?>" required class="form-control form-control-lg">
                </div>
                <div class="col-md-6">
                  <label for="nom">Price</label>
                  <input type="number" name="price" id="price" value="<?=old('price',$product->price)?>" required class="form-control form-control-lg">
                </div>
            </div>
        </div>
        <div class="col-md-12 form-group mb-3">
            <div class="row">
                <div class="col-md-6">
                  <label for="category">Category</label>
                  <select class="form-select form-control" name="id_cat" id="category">
                     <?php foreach($cats as $cat): ?>
                        <option value="<?=$cat->id?>" <?php if($product->id_cat==$cat->id) echo "selected"; ?>><?=$cat->name?></option>
                     <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="gender">Gender</label>
                  <select class="form-select form-control" name="id_gender" id="gender">
                     <?php foreach($genders as $gender): ?>
                        <option value="<?=$gender->id?>" <?php if($product->id_gender==$gender->id) echo "selected"; ?>><?=$gender->entitled?></option>
                     <?php endforeach; ?>
                  </select>
                </div>
            </div>
        </div>
        <div class="col-md-12 form-group mb-3">
            <div class="row">
                <div class="col-md-6">
                  <label for="description">Description</label>
                  <textarea name="description" id="description" required class="form-control form-control-lg"><?=old('description',$product->description)?></textarea>
                </div>
                <div class="col-md-6">
                  <label for="rating">Rating</label>
                  <select class="form-select form-control" name="rating" id="rating">
                     <option value="1" <?php if($product->rating==1) echo "selected";?>>★</option>
                     <option value="2" <?php if($product->rating==2) echo "selected";?>>★★</option>
                     <option value="3" <?php if($product->rating==3) echo "selected";?>>★★★</option>
                     <option value="4" <?php if($product->rating==4) echo "selected";?>>★★★★</option>
                     <option value="5" <?php if($product->rating==5) echo "selected";?>>★★★★★</option>
                  </select>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
          <div class="row">
            <div class="col-md-6">
                <label for="image">New Image</label>
                <input type="file" name="image" id="edit-image" class="form-control" accept="image/png, image/jpeg, image/jpg"/>
                <input type="hidden" value="<?=$product->image?>" name="hidden_image_name"/>
            </div>
            <div class="col-md-6">
                <img src='<?=base_url("images/products/$product->image")?>' style="width: 60%;height: 240px;" class="view_edit_img"/>
            </div>
          </div>
        </div>
        <div class="col-12">
            <input type="submit" value="Edit" name="edit" class="btn btn-primary btn-lg px-5 mt-3">
        </div>
    </form>
</div>
<?= $this->endSection() ?>