<?php

require_once __DIR__."/../Main.php";

class Login extends Main
{

    private $error;

    public function index()
    {
        $users = $this->loadModel('register');
        
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $_SESSION['name'] = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if($users->login($email, $password)){
            header('Location:'.ROOT_PATH.'panel');
            }else
                $this->error = "نام کاربری یا کلمه عبور صحیح نمیباشد"; 
        }
        $this->loadView('login',['title' => 'ورود','error' => $this->error]);
    }

}
