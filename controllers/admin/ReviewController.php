<?php

class ReviewController
{
    private $comment;
    private $user;
    private $product;
    public function __construct()
    {
        $this->comment = new Review();
        $this->user = new User();
        $this->product = new Product();
    }

    public function index(){
        $title = "Danh sách Bình Luận";
        $view = "reviews/index";
        $comments = $this->comment->getAll();
        
        return require_once PATH_VIEW_ADMIN_MAIN;
    }
    public function show(){
        $title = "Danh sách Bình Luận";
        $view = "reviews/index";
        $comment = $this->comment->getAll();
        
        return require_once PATH_VIEW_ADMIN_MAIN;
    }
    public function delete(){
        try {
            if (empty($_SESSION['user_admin'])) {
                $_SESSION['error'][] = 'Bạn không có quyền xóa bình luận.';
                header('Location: ' . BASE_URL_ADMIN . '&act=review-index'); 
                exit;
            }
    
            $reviewId = $_GET['id'] ?? null;
    
            if (!$reviewId) {
                $_SESSION['error'][] = 'Không tìm thấy bình luận cần xóa.';
                header('Location: ' . BASE_URL_ADMIN . '&act=review-index');
                exit;
            }
            $this->comment->delete('id = :id', ['id' => $reviewId]);
            $_SESSION['success'] = true;
            $_SESSION['msg'] = 'Thao Tác Thành công';
        
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
        }

        header('location: ' . BASE_URL_ADMIN . '&act=review-index');
        exit();
    }
    
}
