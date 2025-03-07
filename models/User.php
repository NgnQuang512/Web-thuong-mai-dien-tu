<?php

class User extends BaseModel{
    protected $table = 'users';

    public function getAll()
    {
        $sql = "
            SELECT 
                u.id                u_id,
                u.name              u_name,
                u.email             u_email,
                u.password          u_password,
                u.avatar            u_avatar,
                u.address           u_address,
                u.phone             u_phone,
                u.role_id           u_role_id,
                u.created_at        u_created_at,
                r.id                r_id,
                r.name              r_name
            FROM users u
            JOIN role r ON r.id = u.role_id
            WHERE u.role_id = :role_id
            ORDER BY u.id DESC
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':role_id', 2, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    public function getAllClient()
    {
        $sql = "
            SELECT 
                u.id                u_id,
                u.name              u_name,
                u.email             u_email,
                u.password          u_password,
                u.avatar            u_avatar,
                u.address           u_address,
                u.phone             u_phone,
                u.role_id           u_role_id,
                u.created_at        u_created_at,
                r.id                r_id,
                r.name              r_name
            FROM users u
            JOIN role r ON r.id = u.role_id
            WHERE u.role_id = :role_id
            ORDER BY u.id DESC
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':role_id', 1, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    public function getByID($id)
    {
        $sql = "
             SELECT 
                u.id                u_id,
                u.name              u_name,
                u.email             u_email,
                u.password          u_password,
                u.avatar            u_avatar,
                u.address           u_address,
                u.phone             u_phone,
                u.role_id           u_role_id,
                r.id                r_id,
                r.name              r_name
            FROM users u
            JOIN role r ON r.id = u.role_id
            WHERE u.id = :id;
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }
}

