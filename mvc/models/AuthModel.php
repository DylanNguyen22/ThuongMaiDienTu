<?php
class AuthModel extends DB
{

    public function handleSignUp($data)
    {
        mysqli_query($this->con, "INSERT INTO taikhoan(tentk, matkhau, ho, ten, sodt, gioitinh, diachi, loaitaikhoan) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '0123456789', 'Nam', 'An Biên, Kiên Giang', '1')");
        if (mysqli_affected_rows($this->con)) {
            return 'success';
        } else {
            return 'false';
        }
    }

    public function handleSignIn($email)
    {
        $query = mysqli_query($this->con, "SELECT * FROM taikhoan WHERE tentk = '$email'");
        $arr = mysqli_fetch_array($query);
        if ($arr) {
            $result = [
                'yes',
                $arr
            ];
            return $result;
        } else {
            return "no";
        }
    }

    public function getUserInfo()
    {
        if (isset($_SESSION['user'])) {
            $tentk = $_SESSION['user'];
            $result = mysqli_fetch_array(mysqli_query($this->con, "SELECT * FROM taikhoan WHERE tentk = '$tentk'"));
            return $result;
        }
    }


}
?>