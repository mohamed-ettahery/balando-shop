<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/images/logo.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?=base_url('admin/assets/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?=base_url('admin/assets/css/style.css')?>" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>ADMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?=base_url('admin/assets/img/user.jpg')?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">
                          Name
                        </h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="<?=site_url('admin/Dashboard')?>" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="<?=site_url('admin/Categories')?>" class="nav-item nav-link "><i class="fas fa-sitemap"></i>Categories</a>
                    <a href="<?=site_url('admin/Genders')?>" class="nav-item nav-link "><i class="fas fa-venus-mars"></i>Genders</a>
                    <a href="<?=site_url('admin/Products')?>" class="nav-item nav-link "><i class="fas fa-layer-group"></i>Products</a>
                    <a href="<?=site_url('admin/Orders')?>" class="nav-item nav-link "><i class="fas fa-newspaper"></i>Orders</a>
                    <a href="<?=site_url('admin/Login/logout')?>" class="nav-item nav-link"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
        <div class="content">
        <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Recherche">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="<?=base_url('admin/assets/img/user.jpg')?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Admin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="" class="dropdown-item">Changer mot de passe</a>
                            <a href="" class="dropdown-item">Deconnéxion</a>
                        </div>
                    </div>
                </div>
            </nav>
        <!-- Navbar End -->


    <!-- Content Start -->
    <div class="general-content" style="min-height:90%;padding: 35px;">
    <?php
      if(session()->has("success"))
      {
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> <?= session("success"); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      if(session()->has("error"))
      {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> <?= session("error"); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      if(session()->has("errors"))
      {
         foreach(session("errors") as $error)
         {
             ?>
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <strong>Error!</strong> <?= $error ?>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
             <?php
         }
      }
      if(session()->has("warning"))
      {
      ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> <?= session("warning"); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      if(session()->has("info"))
      {
      ?>
      <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>Notice!</strong> <?= session("info"); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php }?>
       <?= $this->renderSection('content') ?>
    </div>
    <!-- Content End -->
       <!-- Footer Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="col-12 col-sm-6 text-center text-sm-start">
                    &copy; <a href="#">Balando-shop</a>, Tous les droits sont réservés. 
                </div>
                <div class="col-12 col-sm-6 text-center text-sm-end">
                </div>
            </div>
        </div>
     </div>
        <!-- Footer End -->
    </div>
    <!-- Content End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('admin/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')?>"></script>

    <!-- Template Javascript -->
    <script src="<?=base_url('admin/assets/js/main.js')?>"></script>
</body>

</html>