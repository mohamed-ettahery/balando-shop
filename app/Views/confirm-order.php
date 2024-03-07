<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
	<!-- Shoping Cart -->
    <div class="confirm-order-content">
        <div class="content" style="margin: 90px;">
            <div class="container">
                <h2 class="text-center text-secondary">Order Information</h2>
                <p class="text-center mb-5" style="color: #7c7c7c;">enter your information and fill these inputs with your realy information to confirm your order</p>
                <form action="<?=site_url('Cart/confirmOrder')?>" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Your name</label>
                            <input type="text" placeholder="name" name="clientName" value="<?=old('clientName')?>" id="name" required class="form-control"/>
                        </div>
                        <div class="col-md-6">
                            <label>Phone</label>
                            <input type="tel" placeholder="phone" name="phone" value="<?=old('phone')?>" id="phone" required class="form-control"/>
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" placeholder="email" name="email" value="<?=old('email')?>" id="email" required class="form-control"/>
                        </div>
                        <div class="col-md-6">
                            <label>Address</label>
                            <input type="text" placeholder="address" name="address" value="<?=old('address')?>" id="address" required class="form-control"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Confirm my order <i class="fa fa-check"></i></button>
                </form>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>