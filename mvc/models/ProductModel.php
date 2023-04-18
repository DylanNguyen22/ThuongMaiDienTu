<?php
class ProductModel extends DB
{

    // public function Tong($n, $m){
    //     return $n + $m;
    // }

    public function getAllProduct()
    {
        $qr = "SELECT * FROM sanpham, danhmucsanpham, thuonghieu WHERE danhmucsanpham.maloai = sanpham.maloai AND thuonghieu.MaTH = sanpham.math AND sanpham.trangthaisp = 1";
        return mysqli_query($this->con, $qr);
    }

    public function getEveryProduct()
    {
        $qr = "SELECT * FROM sanpham, danhmucsanpham, thuonghieu WHERE danhmucsanpham.maloai = sanpham.maloai AND thuonghieu.MaTH = sanpham.math";
        return mysqli_query($this->con, $qr);
    }

    public function getAllTypeOfProduct()
    {
        $qr = "SELECT * FROM danhmucsanpham";
        return mysqli_query($this->con, $qr);
    }

    public function getAllBrand()
    {
        $qr = "SELECT * FROM thuonghieu";
        return mysqli_query($this->con, $qr);
    }

    public function getProductDetail($productId)
    {
        $qr = "SELECT * FROM sanpham, danhmucsanpham, thuonghieu WHERE masp = $productId and sanpham.maloai = danhmucsanpham.Maloai and sanpham.math = thuonghieu.MaTH";
        // return mysqli_query($this->con, $qr);
        return (mysqli_fetch_array(mysqli_query($this->con, $qr)));
    }


    public function hideProduct($data)
    {
        mysqli_query($this->con, "UPDATE `sanpham` SET `trangthaisp`='0' WHERE masp = $data");
    }

    public function showProduct($data)
    {
        mysqli_query($this->con, "UPDATE `sanpham` SET `trangthaisp`='1' WHERE masp = $data");
    }

    public function editproductinfo()
    {
        $masp = $_POST['masp'];
        $tensp = $_POST['tensp'];
        $giaban = $_POST['giaban'];
        $chitiet = $_POST['chitiet'];
        $soluong = $_POST['soluong'];
        $maloai = mysqli_fetch_array(mysqli_query($this->con, "SELECT maloai FROM sanpham WHERE masp = $masp"))[0];
        $math = mysqli_fetch_array(mysqli_query($this->con, "SELECT math FROM sanpham WHERE masp = $masp"))[0];

        mysqli_query($this->con, "UPDATE `sanpham` SET `tensp`='$tensp',`giaban`='$giaban',`chitiet`='$chitiet',`soluong`='$soluong',`maloai`='$maloai',`math`='$math' WHERE masp = $masp");
    }

    public function addProduct()
    {
        $tensp = $_POST['tensp'];
        $giaban = $_POST['giaban'];
        $chitiet = $_POST['chitiet'];
        $soluong = $_POST['soluong'];
        $thuonghieu = $_POST['thuonghieu'];
        $loai = $_POST['loaisp'];
        $math = mysqli_fetch_array(mysqli_query($this->con, "SELECT MaTH FROM thuonghieu WHERE TenTH = '$thuonghieu'"))[0];
        $maloai = mysqli_fetch_array(mysqli_query($this->con, "SELECT Maloai FROM danhmucsanpham WHERE Tenloai = '$loai'"))[0];
        if ($_FILES["anhsp"]['error'] != 0) {
            echo "Dữ liệu upload bị lỗi";
            die;
        }
        $target_dir = "public/product_imgs/";
        $target_file = $target_dir . basename($_FILES["anhsp"]["name"]);

        $allowUpload = true;

        //Lấy phần mở rộng của file (jpg, png, ...)
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        // Cỡ lớn nhất được upload (bytes)
        $maxfilesize = 800000;

        ////Những loại file được phép upload
        $allowtypes = array('jpg', 'png', 'jpeg', 'gif');


        if (isset($_POST["submit"])) {
            //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
            $check = getimagesize($_FILES["anhsp"]["tmp_name"]);
            if ($check !== false) {
                echo "Đây là file ảnh - " . $check["mime"] . ".";
                $allowUpload = true;
            } else {
                echo "Không phải file ảnh.";
                $allowUpload = false;
            }
        }

        // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
        // Bạn có thể phát triển code để lưu thành một tên file khác
        if (file_exists($target_file)) {
            echo "Tên file đã tồn tại trên server, không được ghi đè";
            $allowUpload = false;
        }
        // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
        if ($_FILES["anhsp"]["size"] > $maxfilesize) {
            echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
            $allowUpload = false;
        }


        // Kiểm tra kiểu file
        if (!in_array($imageFileType, $allowtypes)) {
            echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
            $allowUpload = false;
        }


        if ($allowUpload) {
            // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
            if (move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file)) {
                echo "File " . basename($_FILES["anhsp"]["name"]) .
                    " Đã upload thành công.";
                    $anhsp = $_FILES["anhsp"]["name"];
                    mysqli_query($this->con, "INSERT INTO `sanpham`(`tensp`, `giaban`, `chitiet`, `hinhanh`, `soluong`, `maloai`, `math`, `trangthaisp`, `noibat`) VALUES ('$tensp',$giaban,'$chitiet','$anhsp',$soluong,$maloai,$math,1,1)"); // vẫn chưa lưu được
                echo "File lưu tại " . $target_file;

            } else {
                echo "Có lỗi xảy ra khi upload file.";
            }
        } else {
            echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
        }
    }
    public function searchProduct() {
        $keyword = $_POST['key_word'];
        
        return mysqli_query($this->con, "SELECT * FROM sanpham, danhmucsanpham, thuonghieu WHERE danhmucsanpham.maloai = sanpham.maloai AND thuonghieu.MaTH = sanpham.math AND MATCH(tensp) AGAINST('$keyword')");
    }


    //test k
    public function getByTypeProduct($typeID)
    {
        $qr = "SELECT * FROM sanpham, danhmucsanpham, thuonghieu WHERE sanpham.maloai = $typeID and sanpham.maloai = danhmucsanpham.Maloai and sanpham.math = thuonghieu.MaTH";
        return mysqli_query($this->con, $qr);
        // return (mysqli_fetch_array(mysqli_query($this->con, $qr)));
    }
}
?>