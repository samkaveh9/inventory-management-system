<?php

class User extends Main
{

    public function index()
    {
        $users = $this->loadModel('Register');
        $this->loadView('panel');
    }

}