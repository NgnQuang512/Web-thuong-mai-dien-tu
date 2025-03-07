<?php

class HomeController
{
    private $home;
    private $card;
    private $slider;
    private $bill;
    private $billDetail;
    private $user;
    public function __construct()
    {
        $this->home = new Home();
        $this->card = new Cart();
        $this->slider = new Slider();
        $this->bill = new Bill();
        $this->billDetail = new BillDetail();
        $this->user = new User();
    }
    public function index()
    {
        $view = "user/home";
        $sliders = $this->slider->getActiveSlider();
        $data = $this->home->renderProductsAndTypes();
        $categories = $this->home->renderCategory();
        require_once PATH_VIEW_CLIENT . 'main.php';
    }
    public function goToCart()
    {
        $view = 'user/cart';
        $userId = $_SESSION['user_client']['id'] ?? $_SESSION['user_admin']['id'] ?? null;
        $cartItems = $this->card->getCart($userId);
        // debug($cartItems);die;
        require_once PATH_VIEW_CLIENT_MAIN;
    }
    public function goToBill()
    {
        $view = 'user/billList';
        $userId = $_SESSION['user_client']['id'] ?? $_SESSION['user_admin']['id'] ?? null;
        $cartItems = $this->card->getCart($userId);
        // debug($cartItems);die;
        require_once PATH_VIEW_CLIENT_MAIN;
    }
    public function goToBillDetail()
    {
        $view = 'user/billDetail';
        $userId = $_SESSION['user_client']['id'] ?? $_SESSION['user_admin']['id'] ?? null;
        $cartItems = $this->card->getCart($userId);
        // debug($cartItems);die;
        require_once PATH_VIEW_CLIENT_MAIN;
    }
    public function goToCate()
    {
        $view = "user/productType";
        $sliders= $this->slider->getActiveSlider();
        $idCate = $_GET['idCate'];
        $sliders = $this->slider->getActiveSlider();
        $data = $this->home->getProductsAndTypes($idCate);
        $categories = $this->home->renderCategory();
        require_once PATH_VIEW_CLIENT . 'main.php';
    }
    public function goToBrand()
    {
        $view = "user/productType";
        $idCate = $_GET['idCate'];
        $sliders = $this->slider->getActiveSlider();
        $idBrand = $_GET['idBrand'];
        $data = $this->home->getByBrand($idBrand, $idCate);
        $categories = $this->home->renderCategory();
        require_once PATH_VIEW_CLIENT . 'main.php';
    }
    public function renderSuggest()
    {
        if (isset($_POST['nameProduct'])) {
            $productName = $_POST['nameProduct'];
            $result = $this->home->findProduct($productName);
            if (!empty($result)) {
                foreach ($result as $result) {
                    echo "<div class='hover:opacity-50 cursor-pointer' data-id='" . $result['id'] . "'>" . $result['name'] . "</div><br/>";
                }
            } else {
                echo "<div>Không tìm thấy sản phẩm có tên:" . $productName . "</div>";
            }
        }
    }
    public function startSearching()
    {
        $view = "user/searchProduct";
        $categories = $this->home->renderCategory();
        $productName = $_POST['nameProduct'];
        $products = $this->home->findProduct($productName);
        require_once PATH_VIEW_CLIENT . 'main.php';
    }
    public function goToPayment()
    {
        $userId = $_SESSION['user_client']['id'] ?? $_SESSION['user_admin']['id'] ?? null;
        $view = "user/payment";
        $user = $this->user->getByID($userId);
        $cartItems = $this->card->getCart($userId);
        if (!empty($cartItems)) {
            require_once PATH_VIEW_CLIENT . "main.php";
        } else {
            $_SESSION['error'][] = "Giỏ hàng của bạn đang trống không thể sang trang thanh toán";
            return header("Location:?act=goToCart");
        }
    }
    public function billDetail()
    {
        $statusLabels = [
            1 => 'Chờ xử lí',
            2 => 'Đã xử lí',
            3 => 'Đang giao hàng',
            4 => 'Đã thanh toán',
            5 => 'Hủy đơn'
        ];
        $paymentLabels = [
            1 => 'COD',
            2 => 'Online'
        ];
        $id = $_GET['id'];
        $billData = $this->bill->getByID($id);
        $userId = $_SESSION['user_client']['id'] ?? $_SESSION['user_admin']['id'] ?? null;
        $cartItems = $this->billDetail->getBillDetails($id);
        $view = "user/billDetail";
        require_once PATH_VIEW_CLIENT . "main.php";
    }
}
