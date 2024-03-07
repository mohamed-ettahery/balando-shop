<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LOGIN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicon -->
    <!-- <link rel="icon" type="image/x-icon" href="../assets/images/logo.png"> -->
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
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


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
             <form action="<?=site_url('admin/Login/auth')?>" method="POST">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4" style="margin: 20px auto;">
                            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                                <div class="mb-3">
                                  <h3 class="text-center text-primary">LOGIN</h3>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" value="<?=old('email')?>" id="floatingInput" placeholder="name@example.com" required>
                                    <label for="floatingInput">Email</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" name="psw" value="<?=old('psw')?>" id="floatingPassword" placeholder="password" required>
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary py-3 w-100 mb-4">Login</button>
                                <p class="text-danger text-center"><?php if(session()->has("error")) echo session("error");?></p>
                        </div>
                    </div>
             </form>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Template Javascript -->
    <script src="<?=base_url('admin/assets/js/main.js')?>"></script>
</body>

</html>