<?php
class ProductController
{
    private $product;
    private $variant;
    public function __construct()
    {
        $this->product = new Product();
        $this->variant = new Variant();
    }
    public function index()
    {
        $title = "Danh sách sản phẩm";
        $view = "products/index";
        $products = $this->product->getAll();
        return require_once PATH_VIEW_ADMIN_MAIN;
    }
    public function showProduct()
    {
        $title = "Sản phẩm chi tiết";
        $view = "products/show";
        $product = $this->product->getById($_GET['id']);
        return require_once PATH_VIEW_ADMIN_MAIN;
    }
    public function goToEdit()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id"', 99);
            }
            $view = 'products/edit';
            $title = "Cập nhật sản phẩm";
            $script = 'textarea';
            $script2 = 'updateVarian';
            $id = $_GET['id'];
            $brands = $this->product->getBrands();
            $categories = $this->product->getCategories();
            $product = $this->product->getByID($id);
            $variantGetProduct = $this->variant->getProductId($id);
            $variant_size = $this->variant->getSize();
            $variant_color = $this->variant->getColor();

            if (empty($product)) {
                throw new Exception("product có ID = $id KHÔNG TỒN TẠI!");
            }

            return require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&act=products-index');
            exit();
        }
    }
    public function startUpdate()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception('Phương Thức Phải Là POST');
            }
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số id', 99);
            }
            $id = $_GET['id'];

            $product = $this->product->find('*', 'id = :id', ['id' => $id]);

            if (empty($product)) {
                throw new Exception("product có Id = $id Không Tồn Tại");
            }
            $data = $_POST + $_FILES;
            // debug($data);die;
            // debug($data['data_variant']);die;
            $_SESSION['error'] = [];
            if ($data['price'] < $data['sale_price']) {
                $_SESSION['error']['logic_price'] = "Giá ban đầu phải lớn hơn giá đã giảm";
            }
            if (!empty($_SESSION['error'])) {
                $_SESSION['data'] = $data;
                throw new Exception('Dữ Liệu Lỗi');
            }
            if ($data['image']['size'] > 0) {
                $data['image'] = upload_file('img', $data['image']);
            } else {
                $data['image'] = $product['image'];
            }


            $data['updated_at'] = date('Y-m-d h:i:s');
            $data['discount'] = 100 - ceil(($data['sale_price'] / $data['price']) * 100);
            $productData = [
                'name' =>$data['name'],
                'price' =>$data['price'],
                'sale_price' =>$data['sale_price'],
                'category_id' =>$data['category_id'],
                'brand_id' =>$data['brand_id'],
                'discount' =>$data['discount'],
                'image' =>$data['image'],
                'description' =>$data['description'],
                'content' =>$data['content'],
                'updated_at' => $data['updated_at']
            ];
            $this->product->update($productData, 'id = :id', ['id' => $id]);

            if (!empty($data['data_variant'])) {
                $existingVariants = $this->variant->getProductId($id); 
                $handledVariants = []; 
            
                foreach ($data['data_variant'] as $variant) {
                    $found = false;
            
                    foreach ($existingVariants as $existingVariant) {
                        if ($existingVariant['vr_size_id'] == $variant['size_id'] &&
                            $existingVariant['vr_color_id'] == $variant['color_id']) {
                           
                            $this->variant->update([
                                'size_id' => $variant['size_id'],
                                'color_id' => $variant['color_id'],
                                'variant_quantity' => $variant['quantity'],
                                'variant_price' => $variant['price-varian'],
                                'variant_price_sale' => $variant['price-sale-varian']
                            ], 'id = :id', ['id' => $existingVariant['v_id']]);
            
                            $handledVariants[] = $existingVariant['v_id'];
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) {
                        $this->variant->insert([
                            'product_id' => $id,
                            'size_id' => $variant['size_id'],
                            'color_id' => $variant['color_id'],
                            'variant_quantity' => $variant['quantity'],
                            'variant_price' => $variant['price-varian'],
                            'variant_price_sale' => $variant['price-sale-varian']
                        ]);
                    }
                }

                foreach ($existingVariants as $existingVariant) {
                    if (!in_array($existingVariant['v_id'], $handledVariants)) {
                        $this->variant->delete('id = :id', ['id' => $existingVariant['v_id']]);
                    }
                }
            }
            
            $_SESSION['success'] = true;
            $_SESSION['msg'] = 'Cập nhật sản phẩm thành công';
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            if ($th->getCode() == 99) {
                header('location: ' . BASE_URL_ADMIN . '&act=products-index');
                exit();
            }
        }
        header('location: ' . BASE_URL_ADMIN . '&act=products-edit&id=' . $id);
        exit();
    }
    public function goToCreate()
    {
        $title = "Thêm mới sản phẩm";
        $view = "products/create";
        $script = 'textarea';
        $script2 = 'createVarian';
        $brands = $this->product->getBrands();
        $categories = $this->product->getCategories();
        $variant_size = $this->variant->getSize();
        $variant_color = $this->variant->getColor();
        return require_once PATH_VIEW_ADMIN_MAIN;
    }
    public function startCreate()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception('Phương Thức Phải Là POST');
            }
            $data = $_POST + $_FILES;
            // debug($data);die;
            $_SESSION['error'] = [];

            // Validate dữ liệu
            if (empty($data['name'])) {
                $_SESSION['error']['name'] = 'Trường name bắt buộc';
            }

            if (
                empty($data['price'])
            ) {
                $_SESSION['error']['price'] = 'Trường giá bắt buộc';
            }

            if (empty($data['sale_price'])) {
                $_SESSION['error']['sale_price'] = 'Trường giá sau khi giảm bắt buộc';
            }
            if ($data['price'] < $data['sale_price']) {
                $_SESSION['error']['logic_price'] = "Giá ban đầu phải lớn hơn giá đã giảm";
            }
            if (empty($data['description'])) {
                $_SESSION['error']['description'] = 'Trường mô tả sản phẩm không được bỏ trống';
            }
            if (empty($data['content'])) {
                $_SESSION['error']['content'] = 'Trường giới thiệu sản phẩm không được bỏ trống';
            }
            if (empty($data['image']['size'])) {
                $_SESSION['error']['image_size'] = 'Trường image không được bỏ trống';
            }else if ($data['image']['size'] > 2 * 1024 * 1024) {
                $_SESSION['error']['image_size'] = 'Trường image có dung lượng tối đa 2MB';
            }
            if (empty($data['data_variant'])) {
                $_SESSION['error'][] = 'Bạn phải thêm ít nhất một biến thể sản phẩm';
            } else {
                foreach ($data['data_variant'] as $index => $variant) {
                    if (empty($variant['size_id'])) {
                        $_SESSION['error'][] = 'Dung lượng cho biến thể ' . ($index + 1) . ' không được để trống';
                    }
                    if (empty($variant['color_id'])) {
                        $_SESSION['error'][] = 'Màu sắc cho biến thể ' . ($index + 1) . ' không được để trống';
                    }
                    if (empty($variant['quantity']) || !is_numeric($variant['quantity']) || $variant['quantity'] <= 0) {
                        $_SESSION['error'][] = 'Số lượng phải là số dương cho biến thể ' . ($index + 1);
                    }
                    if (empty($variant['price-varian']) || !is_numeric($variant['price-varian']) || $variant['price-varian'] <= 0) {
                        $_SESSION['error'][] = 'Giá cho biến thể ' . ($index + 1) . ' phải là số dương';
                    }
                    if (empty($variant['price-sale-varian']) || !is_numeric($variant['price-sale-varian']) || $variant['price-sale-varian'] <= 0) {
                        $_SESSION['error'][] = 'Giá Sale cho biến thể ' . ($index + 1) . ' phải là số dương';
                    }
                }
            }
            if (!empty($_SESSION['error'])) {
                $_SESSION['data'] = $data;
                $_SESSION['data_variant'] = $data['data_variant'];

                throw new Exception('Dữ Liệu Lỗi');
            }

            if ($data['image']['size'] > 0) {
                $data['image'] = upload_file('img', $data['image']);
            } else {
                $data['image'] = null;
            }
            $data['discount'] = ceil($data['price'] / $data['sale_price'] * 100) - 100;

            $productData = [
                'name' =>$data['name'],
                'price' =>$data['price'],
                'sale_price' =>$data['sale_price'],
                'category_id' =>$data['category_id'],
                'brand_id' =>$data['brand_id'],
                'discount' =>$data['discount'],
                'image' =>$data['image'],
                'description' =>$data['description'],
                'content' =>$data['content'],
            ];
            
            $productId = $this->product->insert($productData);
            
            if (!empty($data['data_variant']) && $productId) {
                foreach ($data['data_variant'] as $variant) {
                    $variantData = [
                        'product_id' => $productId,
                        'size_id' => $variant['size_id'],
                        'color_id' => $variant['color_id'],
                        'variant_quantity' => $variant['quantity'],
                        'variant_price' => $variant['price-varian'],
                        'variant_price_sale' => $variant['price-sale-varian']
                    ];
                    $this->variant->insert($variantData);
                }
            }
            
            $_SESSION['success'] = true;
            $_SESSION['msg'] = 'Thao Tác Thành Công';
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }
        header('location: ' . BASE_URL_ADMIN . '&act=products-create');
        exit();
    }
    public function delete()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu Tham Số id', 99);
            }
            $id = $_GET['id'];

            $product = $this->product->find('*', 'id = :id', ['id' => $id]);

            if (empty($product)) {
                throw new Exception("product có Id = $id Không Tồn Tại");
            }
            $rowcount2 = $this->variant->delete('product_id = :product_id', ['product_id' => $id]);
            $rowcount = $this->product->delete('id = :id', ['id' => $id]);

            if ($rowcount > 0 && $rowcount2 > 0) {
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thao Tác Thành công';
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('location: ' . BASE_URL_ADMIN . '&act=products-index');
        exit();
    }
}
