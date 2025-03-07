<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?= BASE_ASSETS_ADMIN ?>css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= BASE_ASSETS_JS ?>Ajax.js"></script> 
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?= BASE_URL_ADMIN ?>">Quản Trị Admin</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Cài đặt</a></li>
                    <li><a class="dropdown-item" href="<?= BASE_URL ?>">Sang trang Web</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" onclick="return confirm('Bạn có chắc muốn đăng xuất không?')"
                            href="<?= BASE_URL_ADMIN ?>&act=logout">Đăng xuất</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="<?= BASE_URL_ADMIN ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Thống kê
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Người Dùng
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= BASE_URL_ADMIN ?>&act=users-index">Danh Sách</a>
                                <a class="nav-link" href="<?= BASE_URL_ADMIN ?>&act=users-create">Tạo Mới </a>
                            </nav>
                        </div>
                        <!-- PRODUCT-->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Sản Phẩm
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseProducts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= BASE_URL_ADMIN ?>&act=products-index">Danh Sách</a>
                                <a class="nav-link" href="<?= BASE_URL_ADMIN ?>&act=products-create">Tạo Mới</a>
                            </nav>
                        </div>

                    <!-- Categories -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                                Danh Mục Sản phẩm
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseCategories" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= BASE_URL_ADMIN ?>&act=categories-index">Danh Sách</a>
                                    <a class="nav-link" href="<?= BASE_URL_ADMIN ?>&act=categories-create">Tạo Mới</a>
                                </nav>
                            </div>
                           
                            <div class="sb-sidenav-menu-heading">Addons</div>
                    <!-- Slider -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSliders" aria-expanded="false" aria-controls="collapseCategories">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                                Sliders
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseSliders" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= BASE_URL_ADMIN ?>&act=sliders-index">Danh Sách</a>
                                    <a class="nav-link" href="<?= BASE_URL_ADMIN ?>&act=sliders-create">Tạo Mới</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="<?= BASE_URL_ADMIN ?>&act=bills-index">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Bill
                            </a>
                            <a class="nav-link" href="<?= BASE_URL_ADMIN ?>&act=review-index">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Đánh Giá SP
                            </a>
                        
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <!-- Content -->
                <?php if (isset($view)) {
                    require_once PATH_VIEW_ADMIN . $view . '.php';
                } ?>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="<?= BASE_ASSETS_ADMIN ?>js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="<?= BASE_ASSETS_ADMIN ?>js/datatables-simple-demo.js"></script>
    <?php if(isset($script)){
        require_once PATH_ASSETS_JS . $script . '.php';
    } ?>
    <?php if(isset($script2)){
        require_once PATH_ASSETS_JS . $script2 . '.php';
    } ?>
</body>

</html>