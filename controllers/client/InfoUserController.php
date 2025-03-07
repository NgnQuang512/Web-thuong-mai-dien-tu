<?php

class InfoUserController
{
    private $user;
    public function __construct()
    {
        $this->user = new user();
    }
    public function gotoInfoUser()
    {
        $view = 'user/infoUser';
        $userId = $_SESSION['user_client']['id'] ?? $_SESSION['user_admin']['id'] ?? null;
        $user = $this->user->getByID($userId);
        // debug($user);die;
        require_once PATH_VIEW_CLIENT_MAIN;
    }
    public function updateInfoUser()
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
// debug($data);die;
            // Validate dữ liệu
            if (empty($data['name']) || strlen($data['name']) > 250) {
                $_SESSION['error']['name'] = 'Trường name bắt buộc và độ dài không quá 250 ký tự.';
            }

            if (
                empty($data['email'])
                || strlen($data['email']) > 100

                || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)

                || !empty($this->user->find('*', 'email = :email AND id !=:id', ['email' => $data['email'], 'id' => $id]))
            ) {
                $_SESSION['error']['email'] = 'Trường email bắt buộc, độ dài không quá 100 ký tự và không được trùng';
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
            if (!empty($_SESSION['error'])) {
                $_SESSION['data'] = $data;
                throw new Exception('Dữ Liệu Lỗi');
            }
            if ($data['avatar']['size'] > 0) {
                $data['avatar'] = upload_file('users', $data['avatar']);
            } else {
                $data['avatar'] = $user['avatar'];
            }
            $user_data = [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'avatar' => $data['avatar'],
                'updated_at' => date('Y-m-d h:i:s')
            ];

            $rowcount = $this->user->update($user_data, 'id = :id', ['id' => $id]);

            if ($rowcount > 0) {
                if ($_FILES['avatar']['size'] > 0 && !empty($user['avatar']) && file_exists(PATH_ASSETS_UPLOADS . $user['avatar'])) {
                    unlink(PATH_ASSETS_UPLOADS . $user['avatar']);
                }
                $_SESSION['success'] = 'Thao Tác Thành Công';
            } else {
                throw new Exception('Thao Tác Không Thành Công');
            }
        } catch (\Throwable $th) {

            if ($th->getCode() == 99) {
                header('location: ' . BASE_URL. '&act=update-info-user&id=' . $id);
                exit();
            }
        }
        header('location: ' . BASE_URL. '?act=info-user&id=' . $id);
        exit();
    }
}
