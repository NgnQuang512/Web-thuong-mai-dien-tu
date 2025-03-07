    <?php

    class AuthenController
    {
        private $user;

        public function __construct()
        {
            $this->user = new User();
        }

        public function showFormLogin()
        {
            if (isset($_SESSION['user_admin']) || isset($_SESSION['user_client'])) {
                $redirectUrl = isset($_SESSION['user_admin']) ? BASE_URL_ADMIN : BASE_URL;
                echo '<script>
                        alert("Bạn đã đăng nhập rồi.");
                        window.location.href = "' . $redirectUrl . '";
                      </script>';
                exit();
            }
            require_once PATH_VIEW_CLIENT . 'authen/form-login.php';
        }
       
        public function showFormRegister()
        {
            require_once PATH_VIEW_CLIENT . 'authen/register.php';
        }
        public function register()
        {
            try {
                if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                    throw new Exception('Yêu cầu phương thức phải là POST');
                }

                $data = $_POST;
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
    
                if (empty($data['password']) || strlen($data['password']) < 6 || strlen($data['password']) > 30) {
                    $_SESSION['error']['password'] = 'Trường password bắt buộc, độ dài trong khoảng từ 6 đến 30 ký tự.';
                }else if(empty($data['confirm_password']) || $data['confirm_password'] != $data['password']){
                    $_SESSION['error']['password'] = 'Trường Confirm Password không được bỏ trống và phải giống mật khẩu';
                }
                if (empty($data['phone'])) {
                    $_SESSION['error']['phone'] = 'Trường phone không được bỏ trống';
                } elseif (!preg_match('/^0\d{9}$/', $data['phone'])) {
                    $_SESSION['error']['phone'] = 'Sai định dạng số điện thoại';
                }

                if (!empty($_SESSION['error'])) {
                    $_SESSION['data'] = $data;
                    throw new Exception('Dữ Liệu Lỗi');
                }
                $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
                $userData = [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => $hashedPassword,
                    'role_id' => 1
                ];
                $rowcount = $this->user->insert($userData);

                if ($rowcount > 0) {
                    $_SESSION['success'] = true;
                    $_SESSION['msg'] = 'Thao Tác Thành Công';
                } else {
                    throw new Exception('Thao Tác Không Thành Công');
                }

                header('Location: ' . BASE_URL . '?act=show-form-login');
                exit();
            } catch (\Throwable $th) {
                $_SESSION['success'] = false;
                $_SESSION['msg'] = $th->getMessage();

                header('Location: ' . BASE_URL . '?act=show-form-register');
                exit();
            }
        }


        public function login()
        {
            try {
                if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                    throw new Exception('Yêu cầu phương thức phải là POST');
                }

                $email      = $_POST['email'] ?? null;
                $password   = $_POST['password'] ?? null;

                if (empty($email) || empty($password)) {
                    throw new Exception('Email và Password không được để trống!');
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    throw new Exception('Email không hợp lệ!');
                }
                $user = $this->user->find(
                    '*',
                    'email = :email',
                    ['email' => $email]
                );
                
                if (empty($user)) {
                    throw new Exception('Thông tin tài khoản không đúng!');
                }
                
                if (!password_verify($password, $user['password'])) {
                    throw new Exception('Mật khẩu không đúng!');
                }
                
                if ($user['role_id'] == 2) {
                    $_SESSION['user_admin'] = $user;
                    header('Location: ' . BASE_URL_ADMIN);
                    exit();
                } elseif ($user['role_id'] == 1) {
                    $_SESSION['user_client'] = $user;
                    header('Location: ' . BASE_URL);
                    exit();
                } else {
                    throw new Exception('Quyền truy cập không hợp lệ!');
                }
            } catch (\Throwable $th) {
                $_SESSION['success'] = false;
                $_SESSION['msg'] = $th->getMessage();

                header('Location: ' . BASE_URL . '?act=show-form-login');
                exit();
            }
        }

        public function logout()
        {
            session_destroy();
            // hủy session trên máy chủ bao gồm cả session ID.

            header('Location: ' . BASE_URL);
            exit();
        }
    }
