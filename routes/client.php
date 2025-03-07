<?php


$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new HomeController)->index(),
    "goToCate" => (new HomeController)->goToCate(),
    "goToBrand" => (new HomeController)->goToBrand(),
    "search" => (new HomeController)->renderSuggest(),
    "startSearching" => (new HomeController)->startSearching(),
    // CART
    "goToCart" => (new HomeController)->goToCart(),
    "goToPayment" => (new HomeController)->goToPayment(),

    //Authen
    'show-form-login'       => (new AuthenController)->showFormLogin(),
    'login'                 => (new AuthenController)->login(),
    'logout'                => (new AuthenController)->logout(),

    'show-form-register' => (new AuthenController)->showFormRegister(),
    'register' => (new AuthenController)->register(),

    // HOME CLIENT
    "productDetail" => (new ProductDetailController)->goToProductDetail(),
    "deleteReview" => (new ProductDetailController)->deleteComment(),
    "info-user" => (new InfoUserController)->gotoInfoUser(),
    "update-info-user" => (new InfoUserController)->updateInfoUser(),
    // BILL CLIENT
    'goToBill' => (new BillClientController)->billList(),
    'bills-detail' => (new HomeController)->billDetail(),
    'bills-delete' => (new BillClientController)->deleteClientBill(),
    'cancel-bill' => (new BillClientController)->deleteClientBill(),
    // CART 
    "goToCart" => (new HomeController)->goToCart(),
    'add-to-cart' => (new CartController)->addProductToCart(),
    'update-cart' => (new CartController)->updateCart(),
    "remove-item-from-cart" => (new CartController)->removeProductFromCart(),
    'addToBill' => (new BillClientController)->addBill()
};
