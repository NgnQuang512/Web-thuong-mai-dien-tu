<?php
class Product extends BaseModel
{
    protected $table = "products";
    public function getAll()
    {
        $sql = "SELECT pd.name, 
                       pd.image, 
                       pd.id, 
                       pd.price, 
                       pd.sale_price, 
                       br.name AS brand_name,
                       cy.name AS category_name,
                       pd.view_count
                FROM brands AS br
                INNER JOIN categories AS cy ON cy.id = br.category_id
                INNER JOIN products AS pd ON pd.brand_id = br.id
                ORDER BY pd.view_count DESC
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductId()
    {
        $sql = "SELECT pd.name, 
                       pd.image, 
                       pd.id, 
                       pd.price, 
                       pd.sale_price, 
                       br.name AS brand_name,
                       cy.name AS category_name,
                       pd.view_count
                FROM brands AS br
                INNER JOIN categories AS cy ON cy.id = br.category_id
                INNER JOIN products AS pd ON pd.brand_id = br.id
                ORDER BY pd.view_count DESC
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id)
    {
        $sql = "SELECT pd.name, 
                       pd.image, 
                       pd.id, 
                       pd.price, 
                       pd.sale_price, 
                       br.name AS brand_name,
                       cy.name AS category_name,
                       pd.brand_id,
                       pd.category_id,
                       pd.view_count,
                       pd.discount,
                       pd.description,
                       pd.content,
                       pd.created_at,
                       pd.updated_at
                FROM brands AS br
                INNER JOIN categories AS cy ON cy.id = br.category_id
                INNER JOIN products AS pd ON pd.brand_id = br.id
                WHERE pd.id = $id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getBrands()
    {
        $sql = "SELECT br.name, 
                       br.id, 
                       cy.name as category_name
                FROM brands AS br
                INNER JOIN categories as cy ON cy.id = br.category_id";
        $stmt =  $this->pdo->prepare($sql);
        $stmt->execute();
        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCategories()
    {
        $sql = "SELECT name,
                       id
              FROM categories";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getLatestProducts()
    {
        $sql = "SELECT pd.name, 
        pd.image, 
        pd.id, 
        pd.price, 
        pd.sale_price, 
        br.name AS brand_name,
        cy.name AS category_name,
        pd.view_count
        FROM brands AS br
        INNER JOIN categories AS cy ON cy.id = br.category_id
        INNER JOIN products AS pd ON pd.brand_id = br.id
        ORDER BY pd.created_at DESC
        LIMIT 10
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function sameProduct($id, $categoryId)
    {
        $sql = "SELECT  
        pd.name, 
        pd.image, 
        pd.price,
        pd.sale_price,
        br.name AS 
        brand_name, 
        pd.brand_id,
        pd.id,
        pd.view_count,
        pd.content,
        pd.category_id,
        pd.discount
        FROM products AS pd
        INNER JOIN brands as br ON br.id = pd.brand_id
        WHERE pd.id != $id AND pd.category_id = $categoryId
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}