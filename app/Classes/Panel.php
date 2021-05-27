<?php

class Panel extends Main
{

    public function index()
    {
       if (!isset($_SESSION['name']))
            header("Location:". ROOT_PATH);
        else
            $this->loadView('panel',['title' => 'پنل مدیریت']);
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location:". ROOT_PATH.'login/index');
    }


}
