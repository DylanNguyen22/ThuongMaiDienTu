<?php
class Auth extends Controller
{

    // Must have SayHi()
    function sign_in()
    {
        $this->view("sign_in");
    }

    function sign_in_handle() {
        $str = '25f9e794323b453885f5181f1b624d0b';
        $email = $_POST['email'];

        $auth = $this->model("AuthModel");
        $result = $auth->handleSignIn($email);
        

        if($result[0] == 'yes'){
            $pass = md5($_POST['pass']);
            $str = $result[1]['matkhau'];

            if($pass == $result[1]['matkhau']){
                $_SESSION['user'] = $result[1]['matk'];
                if($result[1][8] == 1){
                    $_SESSION['role'] = 'admin';
                    header('location: ../admin/mainpage');
                }
                elseif($result[1][8] == 2){
                    
                    $_SESSION['role'] = 'client';
                    header('location: ../');
                }
                
            }else{
                echo "sai mk";
            }
        }else{
            echo 'tk khong ton tai';
        }
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
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $repass = $_POST['repass'];

        $name = explode(" ", $fullname);
        $x = count($name);
        $l_name = $name[$x-1];
        array_pop($name);
        $f_name = implode(" ", $name);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (strlen($pass) >= 8 || strlen($pass) <= 16) {
                if (strlen($repass) >= 8 || strlen($repass) <= 16) {
                    if ($pass === $repass) {

                        $data = [
                            $email,
                            md5($pass),
                            $f_name,
                            $l_name
                        ];

                        $auth = $this->model("AuthModel");
                        $result = $auth->handleSignUp($data);
                        if($result == "success"){
                            header('location: ../auth/sign_in');
                        }else{
                            echo $result;
                        }
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

    public function sign_out() {
        unset($_SESSION['user']);
        unset($_SESSION['role']);
        header('Location: /thuongmaidientu');
    }
}
