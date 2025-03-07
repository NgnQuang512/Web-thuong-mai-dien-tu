<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin</title>
    <link href="<?= BASE_ASSETS_ADMIN ?>css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION['success'])) {
                                        $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

                                        echo "<div class='alert $class'> {$_SESSION['msg']} </div>";

                                        unset($_SESSION['success']);
                                        unset($_SESSION['msg']);
                                    }
                                    ?>
                                    <?php if (!empty($_SESSION['error'])): ?>
                                        <div class="alert alert-danger">
                                            <ul>
                                                <?php foreach ($_SESSION['error'] as $err):  ?>
                                                    <li><?= $err ?></li>    
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <?php unset($_SESSION['error']) ?>
                                    <?php endif; ?>
                                    <form action="<?= BASE_URL ?>?act=register" method="POSt">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="name" type="text" placeholder="Enter your Full Name" value="<?= $_SESSION['data']['name'] ?? null ?>" />
                                                    <label for="name">Full Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" name="phone" type="number" placeholder="Enter your Phone" value="<?= $_SESSION['data']['phone'] ?? null ?>"/>
                                                    <label for="phone">Phone</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="email" type="email" placeholder="name@example.com" value="<?= $_SESSION['data']['email'] ?? null ?>"/>
                                            <label for="email">Email address</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="password" type="password" placeholder="Create a password" />
                                                    <label for="password">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="confirm_password" type="password" placeholder="Confirm password" />
                                                    <label for="confirm-password">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <button class="btn btn-primary w-100">Đăng ký</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="<?= BASE_URL ?>?act=show-form-login">Bạn đã có Tài Khoản? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= BASE_ASSETS_ADMIN ?>js/scripts.js"></script>
</body>

</html>
