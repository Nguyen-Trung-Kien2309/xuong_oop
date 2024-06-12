<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
</head>
<body>
    <h1>Sửa thông tin sản phẩm <?php echo $product['ten_san_pham'] ?></h1>
    <form action="./?act=sua-san-pham" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
        <label for="">Tên sản phẩm:</label>
        <input type="text" name="ten_san_pham" value="<?php echo $product['ten_san_pham'] ?>" placeholder="Nhập tên sản phẩm">
        <br/>
        <label for="">Giá:</label>
        <input type="number" name="gia" value="<?php echo $product['gia'] ?>" placeholder="Nhập giá sản phẩm" min='0'>
        <br/>
        <label for="">Giá khuyến mãi:</label>
        <input type="number" name="gia_khuyen_mai" value="<?php echo $product['gia_khuyen_mai'] ?>" placeholder="Nhập giá khuyến mãi" min='0'>
        <br/>
        <label for="">Số lượng:</label>
        <input type="number" name="so_luong" value="<?php echo $product['so_luong'] ?>" placeholder="Nhập giá sản phẩm" min='0'>
        <br/>
        <label for="">Ngày nhập:</label>
        <input type="date" name="ngay_nhap" value="<?php echo $product['ngay_nhap'] ?>">
        <br/>
        <label for="">Danh mục:</label>
        <select name="id_danh_muc">
            <option <?php echo $product['id_danh_muc'] == 1 ? 'Selected': ''; ?> value="1">Điện thoại</option>
            <option <?php echo $product['id_danh_muc'] == 2 ? 'Selected': ''; ?> value="2">Laptop</option>
            <option <?php echo $product['id_danh_muc'] == 3 ? 'Selected': ''; ?> value="3">Máy tính bảng</option>
        </select>
        <br/>
        <input type="hidden" name="old_file" value="<?php echo $product['link_anh'] ?>">

        <label for="">Hình ảnh:</label>
        <input type="file" name="link_anh"  placeholder="Chọn hình ảnh">
        <br/>
        <label for="">Trạng thái:</label>
        <select name="trang_thai">
            <option <?php echo $product['trang_thai'] == 'Còn hàng' ? 'Selected': ''; ?> value="Còn hàng">Còn hàng</option>
            <option <?php echo $product['trang_thai'] == 'Hết hàng' ? 'Selected': ''; ?> value="Hết hàng">Hết hàng</option>
        </select>
        <br/>
        <button type="submit">Sửa sản phẩm</button>
    </form>
</body>
</html>