<?php

class BillClientController
{
    private $bill;
    private $cart;
    private $billDetail;
    private $variant;
    protected $table;
    public function __construct()
    {
        $this->bill = new Bill();
        $this->billDetail = new BillDetail();
        $this->cart = new Cart();
        $this->variant = new Variant();
    }
    public function billList()
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
        $view = "user/billList";
        $client_id = $_SESSION['user_client']['id'] ?? $_SESSION['user_admin']['id']  ?? null;
        $data = $this->bill->getByUserID($client_id);
        require_once PATH_VIEW_CLIENT . 'main.php';
    }
    public function billDetail()
    {
        $id = $_GET['id'];
        $billData = $this->bill->getByID($id);
        $client_id = $_SESSION['user_client']['id'];
        $cartItems = $this->billDetail->getBillDetails($id);
        $view = "user/billDetail";
        require_once PATH_VIEW_CLIENT . "main.php";
    }
    public function addBill()
    {   
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            // Lấy thông tin từ form và kiểm tra tính hợp lệ
            $user_name = isset($_POST['user_name']) ? trim($_POST['user_name']) : '';
            $user_email = isset($_POST['user_email']) ? trim($_POST['user_email']) : '';
            $user_address = isset($_POST['user_address']) ? trim($_POST['user_address']) : '';
            $user_phone = isset($_POST['user_phone']) ? trim($_POST['user_phone']) : '';
            $total = isset($_POST['total']) ? floatval($_POST['total']) : 0;
            $user_id = $userId = $_SESSION['user_client']['id'] ?? $_SESSION['user_admin']['id'] ?? null;;

            // Kiểm tra các trường hợp bắt buộc
            if (empty($user_name)) {
                $_SESSION['error'][] = 'Tên người nhận không được để trống.';
            }
            if (empty($user_email)) {
                $_SESSION['error'][] = 'Email người nhận không được để trống.';
            }
            if (empty($user_address)) {
                $_SESSION['error'][] = 'Địa chỉ nhận hàng không được để trống.';
            }
            if (empty($user_phone) || !preg_match('/^\d{9,10}$/', $user_phone)) {
                $_SESSION['error'][] = 'Số điện thoại không hợp lệ. Vui lòng nhập lại.';
            }
            if ($total <= 0) {
                $_SESSION['error'][] = 'Tổng tiền không hợp lệ.';
            }
            // Lấy thông tin giỏ hàng của người dùng
            $cartItems = $this->cart->getCart($user_id);

            // Kiểm tra nếu giỏ hàng rỗng
            if (empty($cartItems)) {
                $_SESSION['error'][] = 'Giỏ hàng của bạn hiện tại không có sản phẩm.';
            }


            if (!empty($_SESSION['error'])) {
                header('Location: ' . BASE_URL . '?act=goToPayment');
                exit();
            } else {
                if (isset($_POST['payCOD'])) {
                    // Thêm hóa đơn vào bảng bill
                    $bill_status = 1;
                    $payment_type = 1;
                    $billId = $this->bill->addBill($bill_status, $payment_type, $user_name, $user_email, $user_address, $user_phone, $total, $user_id);
                    // Thêm chi tiết hóa đơn vào bảng `bill_detail`
                    foreach ($cartItems as $item) {
                        $this->billDetail->addBillDetail($billId, $item['pd_id'], $item['pd_sale_price'], $item['pd_name'], $item['pd_image'], $item['variant_id'], $item['c_quantity']);
                        $result = $this->variant->decreaseVariantQuantity($item['variant_id'], $item['c_quantity']);
                        if (!$result) {
                            $_SESSION['error'][] = "Không thể giảm số lượng cho biến thể ID:{$item['variant_id']}.";
                        }
                    }
                    // Xóa giỏ hàng sau khi đặt hàng thành công (optional)
                    $this->cart->clearCart($user_id);
                    // Chuyển hướng về trang khác (ví dụ: trang cảm ơn hoặc đơn hàng của người dùng)
                    header('Location: ' . BASE_URL . '?act=goToBill');
                    exit();
                } else if (isset($_POST['redirect'])) {
                    if ($total < 100000000) {
                        if (!isset($_SESSION['user_data_online'])) {
                            $_SESSION['user_data_online'] = [
                                'user_name' => $user_name,
                                'user_email' => $user_email,
                                'user_address' => $user_address,
                                'user_phone' => $user_phone,
                                'total' => $total,
                                'user_id' => $user_id
                            ];
                        }
                        if (!isset($_SESSION['cartItems'])) {
                            $_SESSION['cartItems'] = $cartItems;
                        }
                        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                        date_default_timezone_set('Asia/Ho_Chi_Minh');

                        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                        $vnp_Returnurl = "http://localhost/nhom10-project1/";
                        $vnp_TmnCode = "YKG1RSMJ"; //Mã website tại VNPAY 
                        $vnp_HashSecret = "MZU3CJKU91CZDTKYO1FRN9BS7EK6VHH0"; //Chuỗi bí mật

                        $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này 
                        $vnp_OrderInfo = "Noi dung thanh toan";
                        $vnp_OrderType = "billpayment";
                        $vnp_Amount = $_POST['total'] * 100;
                        $vnp_Locale = "vn";
                        $vnp_BankCode = "NCB";
                        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                        // Dữ liệu bill



                        //Add Params of 2.0.1 Version
                        // $vnp_ExpireDate = $_POST['txtexpire'];
                        //Billing
                        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
                        // $vnp_Bill_Email = $_POST['txt_billing_email'];
                        // $fullName = trim($_POST['txt_billing_fullname']);
                        // if (isset($fullName) && trim($fullName) != '') {
                        //     $name = explode(' ', $fullName);
                        //     $vnp_Bill_FirstName = array_shift($name);
                        //     $vnp_Bill_LastName = array_pop($name);
                        // }
                        // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
                        // $vnp_Bill_City = $_POST['txt_bill_city'];
                        // $vnp_Bill_Country = $_POST['txt_bill_country'];
                        // $vnp_Bill_State = $_POST['txt_bill_state'];
                        // // Invoice
                        // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
                        // $vnp_Inv_Email = $_POST['txt_inv_email'];
                        // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
                        // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
                        // $vnp_Inv_Company = $_POST['txt_inv_company'];
                        // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
                        // $vnp_Inv_Type = $_POST['cbo_inv_type'];
                        // $bill_status, $payment_type, $user_name, $user_email, $user_address, $user_phone, $total, $user_id
                        $inputData = array(
                            "vnp_Version" => "2.1.0",
                            "vnp_TmnCode" => $vnp_TmnCode,
                            "vnp_Amount" => $vnp_Amount,
                            "vnp_Command" => "pay",
                            "vnp_CreateDate" => date('YmdHis'),
                            "vnp_CurrCode" => "VND",
                            "vnp_IpAddr" => $vnp_IpAddr,
                            "vnp_Locale" => $vnp_Locale,
                            "vnp_OrderInfo" => $vnp_OrderInfo,
                            "vnp_OrderType" => $vnp_OrderType,
                            "vnp_ReturnUrl" => $vnp_Returnurl,
                            "vnp_TxnRef" => $vnp_TxnRef,
                            // "vnp_ExpireDate" => $vnp_ExpireDate,
                            // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
                            // "vnp_Bill_Email" => $vnp_Bill_Email,
                            // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
                            // "vnp_Bill_LastName" => $vnp_Bill_LastName,
                            // "vnp_Bill_Address" => $vnp_Bill_Address,
                            // "vnp_Bill_City" => $vnp_Bill_City,
                            // "vnp_Bill_Country" => $vnp_Bill_Country,
                            // "vnp_Inv_Phone" => $vnp_Inv_Phone,
                            // "vnp_Inv_Email" => $vnp_Inv_Email,
                            // "vnp_Inv_Customer" => $vnp_Inv_Customer,
                            // "vnp_Inv_Address" => $vnp_Inv_Address,
                            // "vnp_Inv_Company" => $vnp_Inv_Company,
                            // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
                            // "vnp_Inv_Type" => $vnp_Inv_Type
                        );

                        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                            $inputData['vnp_BankCode'] = $vnp_BankCode;
                        }
                        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                        // }

                        //var_dump($inputData);
                        ksort($inputData);
                        $query = "";
                        $i = 0;
                        $hashdata = "";
                        foreach ($inputData as $key => $value) {
                            if ($i == 1) {
                                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                            } else {
                                $hashdata .= urlencode($key) . "=" . urlencode($value);
                                $i = 1;
                            }
                            $query .= urlencode($key) . "=" . urlencode($value) . '&';
                        }

                        $vnp_Url = $vnp_Url . "?" . $query;
                        if (isset($vnp_HashSecret)) {
                            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                        }
                        $returnData = array(
                            'code' => '00',
                            'message' => 'success',
                            'data' => $vnp_Url
                        );
                        if (isset($_POST['redirect'])) {
                            header('Location: ' . $vnp_Url);
                            die();
                        } else {
                            return header("Location:?act=goToPayment");
                        }
                    } else {
                        $_SESSION['error'][] = "Số tiền thanh toán online không được vượt mức 100.000.000đ vui lòng chọn phương thức thanh toán khác";
                        header('Location: ' . BASE_URL . '?act=goToPayment');
                        exit();
                    }

                    // vui lòng tham khảo thêm tại code demo
                }
            }
        } else {
            return header("Location:" . BASE_URL);
        }
    }
    public function deleteClientBill()
    {
        $bill_id = $_GET['id'] ?? null;
        $userId = $_SESSION['user_client']['id'] ?? $_SESSION['user_admin']['id'] ?? null;
        // kiểm tra id người dùng
        if (!$userId) {
            $_SESSION['error'][] = 'Không xác định được người dùng. Vui lòng đăng nhập lại.';
            header("Location: " . BASE_URL . "?act=goToBill");
            exit;
        }
        // lấy thông tin hóa đơn
        $bill = $this->bill->getBillStatusAndOwner($bill_id);
        // kiểm tra trạng thái hóa đơn và quyền sở hữu
        if (!$bill || $userId != $bill['user_id']) {
            $_SESSION['error'][] = 'Hóa đơn không thể xóa. Chỉ xóa được hóa đơn chưa thanh toán thuộc quyền sở hữu của bạn.';
            header("Location: " . BASE_URL . "?act=goToBill");
            exit;
        } elseif ($bill['bill_status'] != 1) {
            $_SESSION['error'][] = 'Hóa đơn không thể xóa. Chỉ xóa được hóa đơn chưa được xử lí';
            header("Location: " . BASE_URL . "?act=goToBill");
            exit;
        }
        $billDetails = $this->billDetail->getBillDetailsByBillId($bill_id);
        // hoàn trả số lượng
        foreach ($billDetails as $detail) {
            $this->variant->increaseVariantQuantity($detail['variant_id'], $detail['quantity']);
        }
        // xóa
        $result = $this->bill->delete("id = :id", ['id' => $bill_id]);
        if ($result > 0) {
            $_SESSION['error'][] = 'Hóa đơn đã được hủy thành công.';
        } else {
            $_SESSION['error'][] = 'Đã có lỗi.';
        }
        header("Location: " . BASE_URL . "?act=goToBill");
        exit();
    }
}
