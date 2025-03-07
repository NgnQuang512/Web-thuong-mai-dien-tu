<?php

use function PHPSTORM_META\elementType;

class Bill extends BaseModel
{
    protected $table = 'bill';

    public function getAll()
    {
        $sql = "
            SELECT 
                id,
                create_at,
                bill_status,
                payment_type,
                user_id,
                user_name,
                user_email,
                user_address,
                user_phone,
                total
            FROM bill;
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result ?: [];
    }
    public function getByID($id)
    {
        $sql = "
            SELECT 
                id,
                create_at,
                bill_status,
                payment_type,
                user_name,
                user_email,
                user_address,
                user_phone,
                total
            FROM bill
            WHERE bill.id = :id;
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(['id' => $id]);

        $result = $stmt->fetch();
        return $result ?: null;
    }
    public function getByUserID($id)
    {
        $sql = "
            SELECT 
                id,
                create_at,
                bill_status,
                payment_type,
                user_id,
                user_name,
                user_email,
                user_address,
                user_phone,
                total
            FROM bill
            WHERE bill.user_id = :id;
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(['id' => $id]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Luôn trả về danh sách mảng
        return $result ?: []; // Trả về mảng rỗng nếu không có bản ghi
    }
    public function getPersonalBillAdmin($id)
    {
        $sql = "
        SELECT 
            id,
            create_at,
            bill_status,
            payment_type,
            user_id,
            user_name,
            user_email,
            user_address,
            user_phone,
            total
        FROM 
            bill
        WHERE id = :id;
    ";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(['id' => $id]);

        $result = $stmt->fetch();
        return $result ?: null;
    }
    public function updateBillStatus($id, $billStatus)
    {
        $sql = "
            UPDATE bill 
            SET bill_status = :bill_status 
            WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'id' => $id,
            'bill_status' => $billStatus
        ]);
        return $stmt->rowCount();
    }
    public function addBill($bill_status, $payment_type, $user_name, $user_email, $user_address, $user_phone, $total, $user_id)
    {
        $sql = "INSERT INTO bill (create_at, bill_status, payment_type, user_id, user_name, user_email, user_address, user_phone, total)
                VALUES (CURRENT_TIMESTAMP, :bill_status, :payment_type, :user_id, :user_name, :user_email, :user_address, :user_phone, :total)";
        $stmt = $this->pdo->prepare($sql);

        if ($stmt->execute([
            'bill_status' => $bill_status,
            'payment_type' => $payment_type,
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_address' => $user_address,
            'user_phone' => $user_phone,
            'total' => $total
        ])) {
            return $this->pdo->lastInsertId();
        }
        return false;
    }
    public function getBillStatusAndOwner($bill_id)
    {
        $sql = "
            SELECT bill_status, user_id 
            FROM bill 
            WHERE id = :bill_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['bill_id' => $bill_id]);
        return $stmt->fetch();
    }
}
