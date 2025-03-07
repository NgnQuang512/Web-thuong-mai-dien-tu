<?php

class BillDetail extends BaseModel
{
    protected $table = 'bill_detail';


    // Phương thức thêm hóa đơn vào cơ sở dữ liệu
    public function addBill($user_name, $user_address, $user_phone, $total, $user_id) {
        // Set các giá trị cố định
        $bill_status = 1;  // Trạng thái hóa đơn (1: Chưa thanh toán)
        $payment_type = 0; // Hình thức thanh toán (0: Thanh toán khi nhận hàng)

        // Câu lệnh SQL để thêm hóa đơn vào bảng `bill`
        $sql = "INSERT INTO bill (create_at, bill_status, payment_type, user_id, user_name, user_address, user_phone, total)
                VALUES (CURRENT_TIMESTAMP, :bill_status, :payment_type, :user_id, :user_name, :user_address, :user_phone, :total)";

        // Chuẩn bị câu lệnh SQL
        $stmt = $this->pdo->prepare($sql);

        // Thực thi câu lệnh với các tham số đã chuẩn bị
        if ($stmt->execute([
            'bill_status' => $bill_status,
            'payment_type' => $payment_type,
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_address' => $user_address,
            'user_phone' => $user_phone,
            'total' => $total
        ])) {
            // Trả về ID của hóa đơn vừa tạo
            return $this->pdo->lastInsertId();
        }
        
        return false;
    }
    // Phương thức thêm các chi tiết hóa đơn vào bảng bill_detail
    public function addBillDetail($billId, $productId, $productPrice, $productName, $productImg, $variant_id, $quantity) {
        $sql = "INSERT INTO bill_detail (bill_id, product_id, product_price, product_name, product_img, variant_id, quantity)
                VALUES (:bill_id, :product_id, :product_price, :product_name, :product_img, :variant_id, :quantity)";
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'bill_id' => $billId,
            'product_id' => $productId,
            'product_price' => $productPrice,
            'product_name' => $productName,
            'product_img' => $productImg,
            'variant_id' => $variant_id,
            'quantity' => $quantity
        ]);
    }
    // Lấy dữ liệu cho bill_detail
    public function getBillDetailsByBillId($bill_id) {
        $sql = "SELECT * FROM bill_detail WHERE bill_id = :bill_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['bill_id' => $bill_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBillDetails($billId)
{
    $sql = "SELECT 
            bd.id as bill_detail_id,
            bd.bill_id as bill_id,
            bd.product_id as product_id,
            bd.product_price as product_price,
            bd.product_name as product_name,
            bd.product_img as product_img,
            bd.variant_id as variant_id,
            bd.quantity as quantity,
            sz.size_value as size_value, 
            cl.color_value as color_value
        FROM bill_detail AS bd
        INNER JOIN variant AS v ON v.id = bd.variant_id  
        LEFT JOIN size AS sz ON sz.id = v.size_id
        LEFT JOIN color AS cl ON cl.id = v.color_id
        WHERE bd.bill_id = :bill_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':bill_id', $billId);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
