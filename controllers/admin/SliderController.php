<?php

class SliderController
{
    private $slider;
    private $product;
    public function __construct()
    {
        $this->slider = new Slider();
        $this->product = new Product();
    }
    public function index()
    {
        $view = 'sliders/index';
        $title = 'Danh Sách Slider';
        $data = $this->slider->getAll();
        
        require_once PATH_VIEW_ADMIN_MAIN;
    }
    public function edit()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id"', 99);
            }
            $id = $_GET['id'];
            $slider = $this->slider->getByID($id);
            if (empty($slider)) {
                throw new Exception("slider có ID = $id KHÔNG TỒN TẠI!");
            }
            $view = 'sliders/edit';
            $title = "Cập nhật slider có ID = $id";
            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&act=sliders-index');
            exit();
        }
    }
    public function create()
    {
        $view = 'sliders/create';
        $title = 'Tạo mới Slider';
        $data = $this->slider->getAll();
        
        require_once PATH_VIEW_ADMIN_MAIN;
    }
    public function update() 
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception('Phương thức phải là POST');
            }

            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id"', 99);
            }

            $id = $_GET['id'];
            $slider = $this->slider->getByID($id);

            if (empty($slider)) {
                throw new Exception("Slider có ID = $id không tồn tại");
            }

            $data = $_POST + $_FILES;
            $_SESSION['error'] = [];

            // Kiểm tra dữ liệu nhập vào
            if (empty($data['product_id'])) {
                // $_SESSION['error']['product_id'] = 'Phải chọn sản phẩm mới';
                $data['product_id']=$slider['p_id'];
            }

            if (empty($data['content']) || strlen($data['content']) < 10) {
                $_SESSION['error']['content'] = 'Trường "content" bắt buộc và độ dài phải hơn 20 kí tự';
            }

            // Kiểm tra ảnh
            if ($data['img_slider']['size'] > 0) {
                if ($data['img_slider']['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error']['img_slider_size'] = 'Ảnh slider có dung lượng tối đa 2MB';
                }

                $fileType = $data['img_slider']['type'];
                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif','image/webp'];
                if (!in_array($fileType, $allowedTypes)) {
                    $_SESSION['error']['img_slider_type'] = 'Xin lỗi, chỉ chấp nhận các loại file JPG, JPEG, PNG, GIF.';
                }
            }
            if ($data['img_slider']['size'] > 0) {
                $data['img_slider'] = upload_file('sliders', $data['img_slider']);
            } else {
                // $_SESSION['error']['img_slider_null'] = 'Phải chọn ảnh mới';
                $data['img_slider'] = $slider['s_img_slider'];
            }            
            if (!empty($_SESSION['error'])) {
                $_SESSION['data'] = $data;
                header('location: ' . BASE_URL_ADMIN . '&act=sliders-edit&id='.$id);
                throw new Exception('Dữ Liệu Lỗi');
            }


            $data['created_at'] = date('Y-m-d h:i:s');

            $rowcount = $this->slider->update($data, 'id = :id', ['id' => $id]);

            if ($rowcount > 0) {
                if ($_FILES['img_slider']['size'] == 0 || $_FILES['img_slider']['size'] > 0 && !empty($slider['img_slider']) && file_exists(PATH_ASSETS_UPLOADS . $slider['img_slider'])) {
                    unlink(PATH_ASSETS_UPLOADS . $slider['img_slider']);
                }
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thao Tác Thành Công';
                header('location: ' . BASE_URL_ADMIN . '&act=sliders-index');
            } else {
                throw new Exception('Thao Tác Không Thành Công');
                header('location: ' . BASE_URL_ADMIN . '&act=sliders-edit&id='.$id);
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            if ($th->getCode() == 99) {
                header('location: ' . BASE_URL_ADMIN . '&act=sliders-index');
                exit();
            }
        }
    }
    public function addSlider() {
        try {
            if($_SERVER['REQUEST_METHOD']!='POST') {
                throw new Exception('Phương thức phải là POST');
            }
            $data=$_POST + $_FILES;
            $_SESSION['error'];
            // Kiểm tra
            if(empty($data['selectedProductId'])) {
                $_SESSION['error']['selectedProductId']='Vui lòng chọn sản phẩm hợp lệ';
            }
            if(empty($data['content']) || strlen(trim($data['content']))<20) {
                $_SESSION['error']['content']='Trường "content" bắt buộc và độ dài phải ít nhất 20 kí tự.';
            }
            if(!empty($data['img_slider']['name'])) {
                if($data['img_slider']['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error']['img_slider_size'] = 'Ảnh không được vượt quá 2MB.';
                }
                $fileType = $data['img_slider']['type'];
                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif','image/webp'];
                if(!in_array($fileType,$allowedTypes)) {
                    $_SESSION['error']['img_slider_type'] = 'Chỉ chấp nhận các loại file: JPG, JPEG, PNG, GIF, WEBP.';
                } else {
                    $imgSliderPath = upload_file('sliders', $data['img_slider']);
                }
            } else {
                $_SESSION['error']['img_slider_null'] = 'Vui lòng chọn ảnh slider.';
            }
            if(!empty($_SESSION['error'])) {
                $_SESSION['data']=$data;
                header('location:'. BASE_URL_ADMIN . '&act=sliders-create');
            }
            $insertData = [
                'product_id'=>$data['selectedProductId'],
                'content'=>trim($data['content']),
                'img_slider'=>$imgSliderPath,
            ];
            $insertID = $this->slider->insert($insertData);
            if($insertID>0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thêm slider thành công';
                header('location:'. BASE_URL_ADMIN . '&act=sliders-index');
            } else {
                throw new Exception('Không thể thêm slider.Thử lại');
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
            header('location:'. BASE_URL_ADMIN . '&act=sliders-create');
        }
    }
    public function deleteSlider() {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu Tham Số id', 99);
            }
            $id=$_GET['id'];
            $slider = $this->slider->find('*', 'id = :id', ['id' => $id]);
            if (empty($slider)) {
                throw new Exception("Slider có Id = $id Không Tồn Tại");
            }
            $rowcount = $this->slider->delete('id = :id', ['id' => $id]);
            if ($rowcount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thao Tác Thành công';
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }
        header('location:'. BASE_URL_ADMIN . '&act=sliders-index');
        exit();
    }
    public function statusSlider() {
        try {
            $count = $this->slider->getCountStatus();
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu Tham Số id', 99);
            }
            $id=$_GET['id'];
            $slider = $this->slider->find('*', 'id = :id', ['id' => $id]);
            if($slider['status']==0) {
                $status=1;
            } else {
                $status=0;
            }
            if($status==1) {
                if($count['active_sliders']>=5) {
                    throw new Exception('Chỉ được hiển thị tối đa 5 slide');
                    exit();
                }
            }
            $data=[
                'status'=>$status,
            ];
            if (empty($slider)) {
                throw new Exception("Slider có Id = $id Không Tồn Tại");
            }
            $rowcount = $this->slider->update($data,'id = :id', ['id' => $id]);
            if ($rowcount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thao Tác Thành công';
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }
        header('location:'. BASE_URL_ADMIN . '&act=sliders-index');
        exit();
    }
}
