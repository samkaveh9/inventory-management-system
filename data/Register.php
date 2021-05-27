<?php
require_once __DIR__ .'/../app/Connection.php';

class Register extends Connection
{

    public function login($email, $password)
    {
        $result = $this->db->prepare("SELECT * FROM `users` WHERE `email`=? AND `password`=? ;");
        $result->bindValue(1,$email);
        $result->bindValue(2,$password);
        $result->execute();
        if ($result->rowCount() >= 1)
            return true;
        else
            return false;
    }

}