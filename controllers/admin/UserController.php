<?php

class UserController
{
    private $user;
    private $role;
    public function __construct()
    {
        $this->user = new User();
        $this->role = new Role();
    }
    public function index()
    {
        $view = 'users/index';
        $title = 'Danh Sách user';
        $data = $this->user->getAll();
        $dataClient = $this->user->getAllClient();

        require_once PATH_VIEW_ADMIN_MAIN;
    }
    public function create()
    {
        $view = 'users/create';
        $title = 'Thêm Mới user';

        $role = $this->role->find('*','id = :id', ['id' => 2]);
        require_once PATH_VIEW_ADMIN_MAIN;
    }
    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception('Phương Thức Phải Là POST');
            }
            $data = $_POST + $_FILES;

            $_SESSION['error'] = [];

            // Validate dữ liệu
            if (empty($data['name']) || strlen($data['name']) > 250) {
                $_SESSION['error']['name'] = 'Trường name bắt buộc và độ dài không quá 50 ký tự.';
            }

            if (
                empty($data['email'])
                || strlen($data['email']) > 100

                || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)

                || !empty($this->user->find('*', 'email = :email', ['email' => $data['email']]))
            ) {
                $_SESSION['error']['email'] = 'Trường email bắt buộc, độ dài không quá 100 ký tự và không được trùng';
            }

            if (empty($data['password']) || strlen($data['password']) < 6 ) {
                $_SESSION['error']['password'] = 'Trường password bắt buộc, độ dài trong khoảng từ 6 trở lên';
            }
            if (empty($data['phone'])) {
                $_SESSION['error']['phone'] = 'Trường phone không được bỏ trống';
            } elseif (!preg_match('/^0\d{9}$/', $data['phone'])) {
                $_SESSION['error']['phone'] = 'Sai định dạng số điện thoại';
            }

            if ($data['avatar']['size'] > 0) {

                if ($data['avatar']['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error']['avatar_size'] = 'Trường avatar có dung lượng tối đa 2MB';
                }

                $fileType = $data['avatar']['type'];
                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                if (!in_array($fileType, $allowedTypes)) {
                    $_SESSION['error']['avatar_type'] = 'Xin lỗi, chỉ chấp nhận các loại file JPG, JPEG, PNG, GIF.';
                }
            }

            $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
            if (!empty($_SESSION['error'])) {
                $_SESSION['data'] = $data;
                throw new Exception('Dữ Liệu Lỗi');
            }

            if ($data['avatar']['size'] > 0) {
                $data['avatar'] = upload_file('users', $data['avatar']);
            } else {
                $data['avatar'] = null;
            }
            $user_data = [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => $hashedPassword,
                'role_id' => $data['role_id'],
                'address' => $data['address'],
                'avatar' => $data['avatar']
            ];
            $rowcount = $this->user->insert($user_data);

            if ($rowcount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thao Tác Thành Công';
            } else {
                throw new Exception('Thao Tác Không Thành Công');
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }
        header('location: ' . BASE_URL_ADMIN . '&act=users-create');
        exit();
    }

    public function edit()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id"', 99);
            }
            $id = $_GET['id'];

            $user = $this->user->getByID($id);

            if (empty($user)) {
                throw new Exception("user có ID = $id KHÔNG TỒN TẠI!");
            }

            $view = 'users/edit';
            $title = "Cập nhật user có ID = $id";

            $role = $this->role->find('*','id = :id', ['id' => 2]);
            
            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&act=users-index');
            exit();
        }
    }
    public function update()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception('Phương Thức Phải Là POST');
            }
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số id', 99);
            }
            $id = $_GET['id'];

            $user = $this->user->find('*', 'id = :id', ['id' => $id]);

            if (empty($user)) {
                throw new Exception("user có Id = $id Không Tồn Tại");
            }
            $data = $_POST + $_FILES;

            $_SESSION['error'] = [];

            // Validate dữ liệu
            if (empty($data['name']) || strlen($data['name']) > 250) {
                $_SESSION['error']['name'] = 'Trường name bắt buộc và độ dài không quá 50 ký tự.';
            }

            if (
                empty($data['email'])
                || strlen($data['email']) > 100

                || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)

                || !empty($this->user->find('*', 'email = :email AND id !=:id', ['email' => $data['email'], 'id' => $id]))
            ) {
                $_SESSION['error']['email'] = 'Trường email bắt buộc, độ dài không quá 100 ký tự và không được trùng';
            }

            if (empty($data['password']) || strlen($data['password']) < 6 ) {
                $_SESSION['error']['password'] = 'Trường password bắt buộc, độ dài trong khoảng từ 6 trở lên';
            }
            if (empty($data['phone'])) {
                $_SESSION['error']['phone'] = 'Trường phone không được bỏ trống';
            } elseif (!preg_match('/^0\d{9}$/', $data['phone'])) {
                $_SESSION['error']['phone'] = 'Sai định dạng số điện thoại';
            }
            if (empty($data['role_id'])) {
                $_SESSION['error']['role_id'] = 'Bạn Chưa Chọn Danh Mục Sản Phẩm';
            } elseif (!in_array($data['role_id'], [1, 2])) {
                $_SESSION['error']['role_id'] = 'Trường role phải là admin hoặc client';
            }
            if ($data['avatar']['size'] > 0) {
                if ($data['avatar']['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error']['avatar_size'] = 'Trường avatar có dung lượng tối đa 2MB';
                }

                $fileType = $data['avatar']['type'];
                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                if (!in_array($fileType, $allowedTypes)) {
                    $_SESSION['error']['avatar_type'] = 'Xin lỗi, chỉ chấp nhận các loại file JPG, JPEG, PNG, GIF.';
                }
            }
            if (!empty($_SESSION['error'])) {
                $_SESSION['data'] = $data;
                throw new Exception('Dữ Liệu Lỗi');
            }
            if ($data['avatar']['size'] > 0) {
                $data['avatar'] = upload_file('users', $data['avatar']);
            } else {
                $data['avatar'] = $user['avatar'];
            }
            $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
            $user_data = [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => $hashedPassword,
                'role_id' => $data['role_id'],
                'address' => $data['address'],
                'avatar' => $data['avatar'],
                'updated_at' => date('Y-m-d h:i:s')
            ];

            $rowcount = $this->user->update($user_data, 'id = :id', ['id' => $id]);

            if ($rowcount > 0) {
                if ($_FILES['avatar']['size'] > 0 && !empty($user['avatar']) && file_exists(PATH_ASSETS_UPLOADS . $user['avatar'])) {
                    unlink(PATH_ASSETS_UPLOADS . $user['avatar']);
                }
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thao Tác Thành Công';
            } else {
                throw new Exception('Thao Tác Không Thành Công');
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            if ($th->getCode() == 99) {
                header('location: ' . BASE_URL_ADMIN . '&act=users-index');
                exit();
            }
        }
        header('location: ' . BASE_URL_ADMIN . '&act=users-edit&id=' . $id);
        exit();
    }
    public function show()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu Tham Số id', 99);
            }
            $id = $_GET['id'];

            $user = $this->user->find('*', 'id = :id', ['id' => $id]);

            if (empty($user)) {
                throw new Exception("user có Id = $id Không Tồn Tại");
            }

            $view = 'users/show';
            $title = 'Chi Tiết user có Id = ' . $id;

            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }
    }
    public function delete()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu Tham Số id', 99);
            }
            $id = $_GET['id'];

            $user = $this->user->find('*', 'id = :id', ['id' => $id]);

            if (empty($user)) {
                throw new Exception("user có Id = $id Không Tồn Tại");
            }

            $rowcount = $this->user->delete('id = :id', ['id' => $id]);

            if ($rowcount > 0) {
                if (!empty($user['avatar']) && file_exists(PATH_ASSETS_UPLOADS . $user['avatar'])) {
                    unlink(PATH_ASSETS_UPLOADS . $user['avatar']);
                }

                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thao Tác Thành công';
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('location: ' . BASE_URL_ADMIN . '&act=users-index');
        exit();
    }
}
