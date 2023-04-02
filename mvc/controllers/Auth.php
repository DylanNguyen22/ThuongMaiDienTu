<?php
class Auth extends Controller
{

    // Must have SayHi()
    function sign_in()
    {
        $this->view("sign_in");
    }

    function sign_up()
    {
        $this->view("sign_up");
    }

    /**
     * Handles the sign up process by retrieving user input from $_POST and validating it.
     * If the input is valid, it creates a new user account and redirects to the login page.
     * If the input is invalid, it displays an error message and stays on the sign up page.
     *
     * @return void
     */
    public function sign_up_handle()
    {
        // echo "<pre>";
        // print_r($_POST);

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $repass = $_POST['repass'];

        $name = explode(" ", $fullname);
        $x = count($name);
        $l_name = $name[$x-1];
        array_pop($name);
        $a = implode(" ", $name);
        echo $a;
        die();


        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (strlen($pass) >= 8 || strlen($pass) <= 16) {
                if (strlen($repass) >= 8 || strlen($repass) <= 16) {
                    if ($pass === $repass) {
                        mysqli_query($this->con, "INSERT INTO `taikhoan`(`matk`, `tentk`, `matkhau`, `ho`, `ten`, `sodt`, `gioitinh`, `diachi`, `loaitaikhoan`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]')");
                    } else {
                        $msg['repass'] = "Mật khẩu xác nhận không khớp";
                        $this->view("sign_up", $msg);
                    }
                } else {
                    $msg['repass'] = "Mật khẩu phải có dộ dài từ 8 đến 16 ký tự";
                    $this->view("sign_up", $msg);
                }
            } else {
                $msg['pass'] = "Mật khẩu phải có dộ dài từ 8 đến 16 ký tự";
                $this->view("sign_up", '$msg');
            }
        } else {
            $msg['email'] = "Email không đúng định dạng";
            $this->view("sign_up", $msg);
        }
    }
}
?>