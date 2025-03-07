<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="<?= BASE_ASSETS_ADMIN ?>css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Đăng Nhập</h3>
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
                                    <form action="<?= BASE_URL ?>?act=login" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="email" type="text"
                                                placeholder="name@example.com" />
                                            <label for="email">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" type="password"
                                                placeholder="Password" />
                                            <label for="password">Password</label>
                                        </div>
                                        <!-- <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox"
                                                value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember
                                                Password</label>
                                        </div> -->
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="#">Quên mật khẩu</a>
                                            <button class="btn btn-primary">Đăng nhập</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="<?= BASE_URL ?>?act=show-form-register">Bạn chưa có tài khoản? Đăng Ký.</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="<?= BASE_ASSETS_ADMIN ?>js/scripts.js"></script>
</body>

</html>