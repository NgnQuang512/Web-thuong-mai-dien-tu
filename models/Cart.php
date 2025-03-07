<?php
class Cart extends BaseModel 
{
    protected $table = "cart";

    public function getByProductId($productId, $userId, $variantId)
    {
        $sql = "SELECT * FROM $this->table 
            WHERE product_id = :productId AND user_id = :userId AND variant_id = :variantId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':variantId', $variantId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }




    public function addToCart($productId, $userId, $quantity, $variantId)
    {
        $sql = "INSERT INTO $this->table (product_id,user_id, quantity, variant_id) VALUES (:product_id,:user_id, :quantity, :variant_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':variant_id', $variantId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function updateQuantity($userId, $quantity, $variantId)
    {
        $sql = "UPDATE $this->table SET quantity = :quantity 
            WHERE user_id = :user_id AND variant_id = :variant_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':variant_id', $variantId, PDO::PARAM_INT);
        $stmt->execute();
    }



    public function getCart($userId)
    {
        $sql = "SELECT pd.name as pd_name,
                   pd.image as pd_image,
                   pd.id as pd_id,
                   pd.price as pd_price,
                   pd.sale_price as pd_sale_price, 
                   u.name AS u_name,
                   u.id as u_id,
                   c.quantity as c_quantity, 
                   v.id as variant_id,  
                   v.size_id as size_id, 
                   v.color_id as color_id,
                   sz.size_value as size_value, 
                   cl.color_value as color_value
            FROM cart AS c
            INNER JOIN users AS u ON u.id = c.user_id
            INNER JOIN products AS pd ON pd.id = c.product_id
            INNER JOIN variant AS v ON v.id = c.variant_id  
            LEFT JOIN size AS sz ON sz.id = v.size_id
            LEFT JOIN color AS cl ON cl.id = v.color_id
            WHERE u.id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




    public function getByVariantId($variantId, $userId)
    {
        $sql = "SELECT * FROM cart WHERE user_id = :user_id AND variant_id = :variant_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':variant_id', $variantId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function clearCart($userId)
    {
        // Xóa tất cả sản phẩm trong giỏ hàng sau khi đặt hàng
        $sql = "DELETE FROM cart WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['user_id' => $userId]);
    }
    public function removeProduct($userId, $productId, $variantId)
{
    $sql = "DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id AND variant_id = :variant_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
    $stmt->bindParam(':variant_id', $variantId, PDO::PARAM_INT);
    return $stmt->execute();
}

}
