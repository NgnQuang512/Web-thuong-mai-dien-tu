<?php
class CartController
{
    private $cart;
    private $variant;

    public function __construct()
    {
        $this->cart = new Cart();
        $this->variant = new Variant();
    }

    public function addProductToCart()
    {

        $productId = $_POST['product_id'] ?? null;
        $quantity = $_POST['quantity'] ?? 1;
        $variantId = $_POST['variant_id'] ?? null;
        $userId = $_SESSION['user_client']['id'] ?? $_SESSION['user_admin']['id'] ?? null;
        $successes = [];

        if (!$userId) {
            $_SESSION['error'][] = 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.';
            header("Location: " . BASE_URL . "?act=show-form-login");
            exit();
        }

        if (!$productId || !$variantId) {
            $_SESSION['error'][] = 'Thêm sản phẩm không thành công, sản phẩm không tồn tại.';
            header("Location: " . BASE_URL . "?act=goToCart");
            exit();
        }

        $variant = $this->variant->getById($variantId);
        if (!$variant) {
            $_SESSION['error'][] = 'Biến thể sản phẩm không hợp lệ.';
            header("Location: " . BASE_URL . "?act=goToCart");
            exit();
        }

        if ($variant['variant_quantity'] < $quantity) {
            $_SESSION['error'][] = 'Số lượng sản phẩm trong kho không đủ.';
            header("Location: " . BASE_URL . "?act=goToCart");
            exit();
        }

        $existingItem = $this->cart->getByProductId($productId, $userId, $variantId);

        if ($existingItem) {
            $newQuantity = $existingItem['quantity'] + $quantity;
            if ($newQuantity > $variant['variant_quantity']) {
                $_SESSION['error'][] = 'Số lượng sản phẩm trong giỏ đã đạt giới hạn tồn kho.';
                header("Location: " . BASE_URL . "?act=goToCart");
                exit();
            }
            $this->cart->updateQuantity($userId, $newQuantity, $variantId);
            $successes[] = 'Số lượng sản phẩm trong giỏ đã được cập nhật.';
        } else {
            $this->cart->addToCart($productId, $userId, $quantity, $variantId);
            $successes[] = 'Sản phẩm đã được thêm vào giỏ hàng.';
        }

        if (!empty($successes)) {
            $_SESSION['success'] = $successes;
        }
        header("Location: " . BASE_URL . "?act=goToCart");
        exit();
    }


    public function updateCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $products = $_POST['products'] ?? [];
            $userId = $_SESSION['user_client']['id'] ?? $_SESSION['user_admin']['id'] ?? null;

            if (!$userId) {
                $_SESSION['error'][] = 'Bạn cần đăng nhập để thực hiện thao tác này.';
                header("Location: " . BASE_URL . "?act=show-form-login");
                exit();
            }

            if (empty($products)) {
                $_SESSION['error'][] = 'Không có sản phẩm nào để cập nhật.';
                header('Location: ' . BASE_URL . '?act=goToCart');
                exit();
            }

            $errors = [];
            $successes = [];

            foreach ($products as $key => $product) {
                $variantId = $product['variant_id'] ?? null;
                $quantity = $product['quantity'] ?? null;
                
                if ($variantId && $quantity && is_numeric($quantity) && $quantity > 0) {
                    $cartItem = $this->cart->getByVariantId($variantId, $userId);
                    if ($cartItem) {
                        $variant = $this->variant->getById($variantId);
                        if ($variant['variant_quantity'] < $quantity) {
                            $errors[] = "Số lượng sản phẩm trong kho không đủ.";
                        } else {
                            $this->cart->updateQuantity($userId, $quantity, $variantId);
                            $successes[] = "Sản phẩm (ID biến thể {$variantId}) đã được cập nhật.";
                        }
                    } else {
                        $errors[] = "Biến thể sản phẩm (ID biến thể {$variantId}) không tồn tại trong giỏ hàng.";
                    }
                } else {
                    $errors[] = "Thông tin biến thể sản phẩm không hợp lệ (ID biến thể {$variantId}).";
                }
            }

            if (!empty($successes)) {
                $_SESSION['success'] = $successes;
            }
            if (!empty($errors)) {
                $_SESSION['error'] = $errors;
            }

            header('Location: ' . BASE_URL . '?act=goToCart');
            exit();
        }
    }
    public function removeProductFromCart()
    {
        $userId = $_GET['user_id'];
        $productId = $_GET['product_id'];
        $variantId = $_GET['variant_id'];
        $result = $this->cart->removeProduct($userId, $productId, $variantId);
        $errors = [];
        if ($result) {
            header('Location: ' . BASE_URL . '?act=goToCart');
            exit;
        } else {
            $errors[] = "Không thể xóa sản phẩm khỏi giỏ hàng.";
        }

        if (!empty($errors)) {
            $_SESSION['error'] = $errors;
        }
    }
}
