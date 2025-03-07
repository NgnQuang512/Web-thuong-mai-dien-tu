<?php

class Variant extends BaseModel
{
    protected $table = 'variant';

    public function getAll()
    {
        $sql = "SELECT  vr.id as v_id,
                        vr.product_id as vr_product_id,
                        vr.color_id as vr_color_id,
                        vr.size_id as vr_size_id,
                        vr.variant_price as vr_variant_price,
                        vr.variant_quantity as vr_variant_quantity,
                        sz.id as sz_id,
                        sz.size_value as sz_size_value,
                        cl.id as cl_id,
                        cl.color_value as cl_color_value
                FROM variant AS vr
                INNER JOIN size AS sz ON sz.id = vr.size_id
                INNER JOIN color AS cl ON cl.id = vr.color_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductId($id)
    {
        $sql = "SELECT  vr.id as v_id,
                        vr.product_id as vr_product_id,
                        vr.color_id as vr_color_id,
                        vr.size_id as vr_size_id,
                        vr.variant_price as vr_variant_price,
                        vr.variant_price_sale as vr_variant_price_sale,
                        vr.variant_quantity as vr_variant_quantity,
                        sz.id as sz_id,
                        sz.size_value as sz_size_value,
                        cl.id as cl_id,
                        cl.color_value as cl_color_value
                FROM variant AS vr
                INNER JOIN size AS sz ON sz.id = vr.size_id
                INNER JOIN color AS cl ON cl.id = vr.color_id
                WHERE vr.product_id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($variantId)
    {
        $sql = "SELECT * FROM variant WHERE id = :variant_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':variant_id', $variantId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getSize()
    {
        $sql = "SELECT  * FROM size";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getColor()
    {
        $sql = "SELECT * FROM color";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllSizes($id)
    {
        $sql = "SELECT DISTINCT vr.id as vr_id, sz.id AS size_id, sz.size_value as sz_size_value, vr.variant_price_sale as vr_variant_price_sale
                FROM variant AS vr
                INNER JOIN size AS sz ON sz.id = vr.size_id
                WHERE vr.product_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $sizes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $uniqueSizes = [];
        foreach ($sizes as $size) {
            $uniqueSizes[$size['size_id']] = $size;
        }

        return array_values($uniqueSizes);
    }

    public function getAllColors($id)
    {
        $sql = "SELECT DISTINCT vr.id as vr_id, cl.id as color_id, cl.color_value as cl_color_value,vr.size_id as size_id, vr.variant_price_sale as vr_variant_price_sale
                FROM variant AS vr
                INNER JOIN color AS cl ON cl.id = vr.color_id
                WHERE vr.product_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $colors = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $uniqueColor = [];
        foreach ($colors as $color) {
            $uniqueColor[$color['color_id']] = $color;
        }

        return array_values($uniqueColor);
    }
    public function decreaseVariantQuantity($variantId, $quantity)
    {
        $sql = "UPDATE variant SET variant_quantity = variant_quantity - :quantity WHERE id= :variantId AND variant_quantity >= :quantity";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['variantId' => $variantId, 'quantity' => $quantity]);
        return $stmt->rowCount() > 0;
    }
    public function increaseVariantQuantity($variantId, $quantity)
    {
        $sql = "UPDATE variant SET variant_quantity = variant_quantity + :quantity WHERE id = :variantId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['variantId' => $variantId, 'quantity' => $quantity]);
        return $stmt->rowCount() > 0;
    }
}
