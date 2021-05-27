<?php
require_once __DIR__ .'/../app/Connection.php';

class Repositories extends Connection
{

    public function all()
    {
        $sql = "SELECT * FROM `repositories`";
        $result = $this->db->prepare($sql);  
        $result->execute();
        if($result->rowCount() >= 1)
            return $result->fetchAll(PDO::FETCH_OBJ);
        else
            return false;
    }  


    public function store($name,$location)
    {
       $sql = "INSERT INTO `repositories` SET `name`=?, `location`=?, `created_at`= now()";
       $result = $this->db->prepare($sql);
       $result->bindValue(1,$name);     
       $result->bindValue(2,$location);     
       if ($result->execute()) 
            return true;
        else
            return false;    
    }

    public function edit($id)
    {
        $sql = "SELECT * FROM `repositories` WHERE `id`=?";
        $result = $this->db->prepare($sql);  
        $result->bindValue(1,$id);     
        $result->execute();
        if($result->rowCount() >= 1)
            return $result->fetch(PDO::FETCH_OBJ);
        else
            return false;
    }

    public function update($id)
    {
       $sql = "UPDATE `repositories` SET `name`=:name, `location`=:location WHERE `id`=:id";
       $result = $this->db->prepare($sql);
       $result->bindParam(':name',$_POST['name']);     
       $result->bindParam(':location',$_POST['location']);     
       $result->bindParam(':id',$id);     
       if ($result->execute()) 
            return true;
        else
            return false;    
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `repositories` WHERE `id`=?";
        $result = $this->db->prepare($sql);  
        $result->bindValue(1,$id);     
        $result->execute();
        if($result->rowCount() >= 1)
            return $result;
        else
            return false;
    }  


}