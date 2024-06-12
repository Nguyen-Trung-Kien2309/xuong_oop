<?php 
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
// - Các hàm đều là hàm có trả về
class ProductModel 
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách sản phẩm 
    public function getAllProduct(){
        try {
            $sql = 'SELECT tb_sanpham.*, tb_danhmuc.ten_danh_muc FROM tb_sanpham
                    JOIN tb_danhmuc ON tb_sanpham.id_danh_muc = tb_danhmuc.id ORDER BY tb_sanpham.id DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // trả về mảng kết hợp
        } catch (Exception $e) {
            echo "Lỗi: ". $e->getMessage();
        }
    }

    public function addProduct($ten_san_pham, $gia, $gia_khuyen_mai, $so_luong, $ngay_nhap, $id_danh_muc, $trang_thai, $link_anh) {
        try {
            $sql = 'INSERT INTO tb_sanpham (ten_san_pham, gia, gia_khuyen_mai, so_luong, ngay_nhap, id_danh_muc, trang_thai, link_anh)
                    VALUES (:ten_san_pham, :gia, :gia_khuyen_mai, :so_luong, :ngay_nhap, :id_danh_muc, :trang_thai, :link_anh)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia' => $gia,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':id_danh_muc' => $id_danh_muc,
                ':trang_thai' => $trang_thai,
                ':link_anh' => $link_anh,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: ". $e->getMessage();
        }
    }

    public function getSanPham($id){
        try {
            $sql = 'SELECT tb_sanpham.*, tb_danhmuc.ten_danh_muc FROM tb_sanpham
                    JOIN tb_danhmuc ON tb_sanpham.id_danh_muc = tb_danhmuc.id WHERE tb_sanpham.id =' . $id;
                    // var_dump($sql);die();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(); // trả về mảng
        } catch (Exception $e) {
            echo "Lỗi: ". $e->getMessage();
        }
    }

    public function updateProduct($id, $ten_san_pham, $gia, $gia_khuyen_mai, $so_luong, $ngay_nhap, $id_danh_muc, $trang_thai, $link_anh) {
        try {
            $sql = 'UPDATE tb_sanpham 
            SET ten_san_pham=:ten_san_pham, 
                gia=:gia,
                gia_khuyen_mai=:gia_khuyen_mai,
                so_luong=:so_luong,
                ngay_nhap=:ngay_nhap,
                id_danh_muc=:id_danh_muc,
                trang_thai=:trang_thai,
                link_anh=:link_anh
            WHERE id = :id ';
            
            // var_dump($id);die();

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia' => $gia,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':id_danh_muc' => $id_danh_muc,
                ':trang_thai' => $trang_thai,
                ':link_anh' => $link_anh,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: ". $e->getMessage();
        }
    }

    public function deleteProduct($id){
        try {
            $sql = 'DELETE FROM tb_sanpham WHERE id=:id';
                    // var_dump($sql);die();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
            return true; // trả về true
        } catch (Exception $e) {
            echo "Lỗi: ". $e->getMessage();
        }
    }
}
