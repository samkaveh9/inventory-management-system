<?php

require_once __DIR__ . '/../app/Connection.php';

class Products extends Connection
{

    public function all()
    {
        $sql = "SELECT repositories.name, products.* FROM product_repository
                INNER JOIN repositories ON product_repository.repository_id = repositories.id
                INNER JOIN products ON product_repository.product_id = products.id
                WHERE product_repository.product_id =
            (SELECT `id` FROM products WHERE products.id = product_repository.product_id)";
        $result = $this->db->prepare($sql);

        $result->execute();
        if ($result->rowCount() >= 1)
            return $result->fetchAll(PDO::FETCH_OBJ);
        else
            return false;
    }


    public function store($title, $content)
    {
        $sql = "INSERT INTO `products` SET `title`=?, `content`=?, `created_at`=now()";
        $result = $this->db->prepare($sql);
        $result->bindValue(1, $title);
        $result->bindValue(2, $content);
        $execute = $result->execute();
        if ($execute) {
            $query = "INSERT INTO `product_repository` (`product_id`,`repository_id`) VALUES( (SELECT MAX( id ) FROM `products`), (:repository_id) )";
            $queryResult = $this->db->prepare($query);
            $queryResult->bindParam(':repository_id', $_POST['repository']);
            if ($queryResult->execute())
                return true;
        } else
            return false;
    }


    public function edit($id)
    {
        $sql = "SELECT * FROM `products` WHERE `id`=?";
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
       $sql = "UPDATE `products` SET `title`=:title, `content`=:content WHERE `id`=:id";
       $result = $this->db->prepare($sql);
       $result->bindParam(':title',$_POST['title']);     
       $result->bindParam(':content',$_POST['content']);     
       $result->bindParam(':id',$id);     
       if ($result->execute()) 
            return true;
        else
            return false;    
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `products` WHERE `id`=?";
        $result = $this->db->prepare($sql);  
        $result->bindValue(1,$id);     
        $result->execute();
        if($result->rowCount() >= 1)
            return $result;
        else
            return false;
    }  

    public function report()
    {
        if (isset($_POST['btn'])) {
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
                $sql = "SELECT repositories.name, products.* FROM product_repository
                INNER JOIN repositories ON product_repository.repository_id = repositories.id
                INNER JOIN products ON product_repository.product_id = products.id
                WHERE product_repository.product_id =
                (SELECT `id` FROM products WHERE products.id = 
                product_repository.product_id AND `created_at` >= ? AND `created_at` <= ?)";
                
                $result = $this->db->prepare($sql);
                $result->bindValue(1, $start_date);
                $result->bindValue(2, $end_date);
                $result->execute();
                if ($result->rowCount() >= 1)
                    return $result->fetchAll(PDO::FETCH_OBJ);
                else
                    return false;
            }
        }
    }

    public function statistics()
    {
        $sql = "SELECT repositories.name, COUNT(repositories.id) AS count FROM product_repository 
        INNER JOIN repositories ON product_repository.repository_id = repositories.id 
        INNER JOIN products ON product_repository.product_id = products.id GROUP BY name ";
        $result = $this->db->prepare($sql);

        $result->execute();
        if ($result->rowCount() >= 1)
            return $result->fetchAll(PDO::FETCH_OBJ);
        else
            return false;
    }
}
