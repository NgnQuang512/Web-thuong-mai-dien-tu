<?php

class CategoriesController
{
    private $categories;

    public function __construct()
    {
        $this->categories = new Categories(); // Khởi tạo model categories
    }

    // Danh sách danh mục
    public function index()
    {
        $view = 'categories/index';
        $title = 'Danh Sách Danh Mục';
        $data = $this->categories->select(); // Lấy danh sách danh mục từ cơ sở dữ liệu

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Hiển thị form thêm danh mục mới
    public function create()
    {
        $view = 'categories/create';
        $title = 'Thêm Mới Danh Mục';

        $categories = $this->categories->select();
        $listcate = array_column($categories, 'name', 'id');
        require_once PATH_VIEW_ADMIN_MAIN;
    }

    // Lưu danh mục mới
    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Phương Thức Phải Là POST');
            }

            $data = $_POST;
            $_SESSION['error'] = [];

            // Kiểm tra dữ liệu đầu vào
            if (empty($data['name']) || strlen($data['name']) > 250) {
                $_SESSION['error']['name'] = 'Tên danh mục không được để trống và không quá 250 ký tự.';
            }

            // Nếu có lỗi, lưu dữ liệu vào session để hiển thị lại trên form
            if (!empty($_SESSION['error'])) {
                $_SESSION['data'] = $data;
                throw new Exception('Dữ liệu không hợp lệ');
            }

            // Lưu dữ liệu vào database
            $rowcount = $this->categories->insert($data);

            if ($rowcount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Danh mục đã được thêm thành công';
            } else {
                throw new Exception('Thêm danh mục không thành công');
            }
        } catch (Exception $e) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $e->getMessage();
        }

        header('location: ' . BASE_URL_ADMIN . '&act=categories-create');
        exit();
    }

    // Hiển thị form chỉnh sửa danh mục
    public function edit()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id"', 99);
            }

            $id = $_GET['id'];
            $category = $this->categories->find('*','id = :id',['id'=>$id]);

            if (empty($category)) {
                throw new Exception("Danh mục với ID = $id không tồn tại");
            }

            $view = 'categories/edit';
            $title = "Chỉnh sửa Danh Mục có ID = $id";

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (Exception $e) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $e->getMessage();
            header('Location: ' . BASE_URL_ADMIN . '&act=categories-index');
            exit();
        }
    }

    // Cập nhật thông tin danh mục
    public function update()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Phương Thức Phải Là POST');
            }

            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số id', 99);
            }
            $id = $_GET['id'];

            $categories = $this->categories->find('*', 'id = :id', ['id' => $id]);

            if (empty($categories)) {
                throw new Exception("Danh mục với ID = $id không tồn tại");
            }

            $data = $_POST;
            $_SESSION['error'] = [];

            // Kiểm tra dữ liệu đầu vào
            if (empty($data['name']) || strlen($data['name']) > 250) {
                $_SESSION['error']['name'] = 'Tên danh mục không được để trống và không quá 250 ký tự.';
            }

            // Nếu có lỗi, lưu dữ liệu vào session để hiển thị lại trên form
            if (!empty($_SESSION['error'])) {
                $_SESSION['data'] = $data;
                throw new Exception('Dữ liệu không hợp lệ');
            }


            // Cập nhật danh mục vào cơ sở dữ liệu
            $rowcount = $this->categories->update($data, 'id = :id', ['id' => $id]);

            if ($rowcount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Cập nhật danh mục thành công';
            } else {
                throw new Exception('Cập nhật danh mục không thành công');
            }
        } catch (Exception $e) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $e->getMessage();

            if ($e->getCode() == 99) {
                header('location: ' . BASE_URL_ADMIN . '&act=categories-index');
                exit();
            }
        }

        header('location: ' . BASE_URL_ADMIN . '&act=categories-edit&id=' . $id);
        exit();
    }

    // Xem chi tiết danh mục
    public function show()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số id', 99);
            }
            $id = $_GET['id'];
            $categories = $this->categories->find('*', 'id = :id', ['id' => $id]);

            if (empty($categories)) {
                throw new Exception("Danh mục với ID = $id không tồn tại");
            }

            $view = 'categories/show';
            $title = 'Chi Tiết Danh Mục';

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (Exception $e) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $e->getMessage();
        }
    }

    // // Xóa danh mục
    // public function delete()
    // {
    //     try {
    //         if (!isset($_GET['id'])) {
    //             throw new Exception('Thiếu tham số id', 99);
    //         }

    //         $id = $_GET['id'];
    //         $categories = $this->categories->find('*', 'id = :id', ['id' => $id]);

    //         if (empty($categories)) {
    //             throw new Exception("Danh mục với ID = $id không tồn tại");
    //         }

    //         $rowcount = $this->categories->delete('id = :id', ['id' => $id]);

    //         if ($rowcount > 0) {
    //             $_SESSION['success'] = true;
    //             $_SESSION['msg'] = 'Danh mục đã được xóa thành công';
    //         }
    //     } catch (Exception $e) {
    //         $_SESSION['success'] = false;
    //         $_SESSION['msg'] = $e->getMessage();
    //     }

    //     header('location: ' . BASE_URL_ADMIN . '&act=categories-index');
    //     exit();
    // }
}