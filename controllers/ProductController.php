<?php 
// có class chứa các function thực thi xử lý logic 
// Hầu như là hàm không trả về
class ProductController
{
    public $modelProduct;
    public function __construct()
    {
        $this->modelProduct = new ProductModel();
    }
    public function Home(){
        // echo "<h1>Đây là trang chủ của tôi</h1>";
        $title = "Đây là trang chủ nhé hahaa";
        $thoiTiet = "Hôm nay trời có vẻ là mưa";
        require_once './views/trangchu.php';

    }
    
    public function listProduct(){
        // Xử lý logic để trả về danh sách sản phẩm
        $listProduct = $this->modelProduct->getAllProduct();
        // print_r($listProduct);die();
        require_once './views/danhsachsanpham.php';
    }

    // Hiển thị giao diện trang thêm
    public function formAddProduct () {
        require_once './views/formAddProduct.php';
    }

    // Xử lý thêm sản phẩm
    public function createProduct() {
        // Kiểm tra người dùng có ấn gửi hay không
        // var_dump($_FILES);die();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            

            // Lấy ra dữ liệu từ form
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia = $_POST['gia'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $so_luong = $_POST['so_luong'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $id_danh_muc = $_POST['id_danh_muc'];
            $trang_thai = $_POST['trang_thai'];


            // Đặt tên cho file khi lưu 
            $file_save = uploadFile($_FILES['link_anh'], './uploads/imgproduct/');
            if ($file_save) {
                 // var_dump($gia_khuyen_mai);
                if ($this->modelProduct->addProduct($ten_san_pham, $gia, $gia_khuyen_mai, $so_luong, $ngay_nhap, $id_danh_muc, $trang_thai, $file_save)) {
                    header('Location: ./?act=danh-sach-san-pham');
                } else {
                    echo "Lỗi khi thêm sản phẩm";
                }
            }
           
        } else {
            header('Location: ./?act=form-them-san-pham');
        }
    }

    public function formUpdateProduct(){
        $id = $_GET['id']; 
        // var_dump($id);die();
        // Truy vấn dữ liệu sản phẩm cần sửa để đưa vào form 
        $product = $this->modelProduct->getSanPham($id);
        // var_dump($product);die();

        require_once './views/formUpdateProduct.php';
    }

    public function updateProduct(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu từ form
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia = $_POST['gia'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $so_luong = $_POST['so_luong'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $id_danh_muc = $_POST['id_danh_muc'];
            $trang_thai = $_POST['trang_thai'];

            $old_file = $_POST['old_file'];
            $id = $_POST['id'];
            $file_update = $_FILES['link_anh'];

            // Xử lý logic cho phần sửa ảnh
            if (isset($file_update) && $file_update['error'] == UPLOAD_ERR_OK) {
                // upload ảnh mới lên 
                $new_file = uploadFile($file_update, './uploads/');
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
            }else{
                $new_file = $old_file;
            }
                 // var_dump($gia_khuyen_mai);
                if ($this->modelProduct->updateProduct($id, $ten_san_pham, $gia, $gia_khuyen_mai, $so_luong, $ngay_nhap, $id_danh_muc, $trang_thai, $new_file)) {
                    header('Location: ./?act=danh-sach-san-pham');
                } else {
                    echo "Lỗi khi thêm sản phẩm";
                }
           
        } else {
            header('Location: ./?act=danh-sach-san-pham');
        }
    }

    public function deleteProduct(){
        $id = $_GET['id'];
        $product = $this->modelProduct->getSanPham($id);
        if ($product) {
            if ($product['link_anh']) {
                deleteFile($product['link_anh']);
            }
            if ($this->modelProduct->deleteProduct($id)) {
                header('Location: ./?act=danh-sach-san-pham');
            }
        }
    }

}