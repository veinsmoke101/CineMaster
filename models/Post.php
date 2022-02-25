<?php

namespace app\models;

use app\database\Database;
use PDO;

class Post
{
    public function addPost($data): bool
    {

        $stmt = Database::connect()->prepare(
            'INSERT INTO poste ( title, description, category, image, poste_author ) VALUES 
                                    ( :title, :description, :category, :image, :poste_author )'
        );

        $stmt->bindParam(":title",$data['title']);
        $stmt->bindParam(":description",$data['description']);
        $stmt->bindParam(":category",$data['category']);
        $stmt->bindParam(":image",$data['image']);
        $stmt->bindParam(":poste_author",$data['poste_author']);
        return $stmt->execute();
    }

//    public function getAllPosts()
//    {
//        $stmt = Database::connect()->prepare('SELECT * FROM poste;');
//        $stmt->execute();
//        return $stmt->fetchAll(PDO::FETCH_ASSOC);
//    }

    public function getPostAuthor(){
        $stmt = Database::connect()->prepare('SELECT * FROM _user join poste p on _user.user_id = p.poste_author order by p.poste_id DESC;');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatePost($data): bool
    {


        if(isset($data['image'])){
            $query = 'UPDATE poste SET title = :title, category = :category, description = :description, image = :image where poste_id = :poste_id';
        }else{
            $query = 'UPDATE poste SET title = :title, category = :category, description = :description where poste_id = :poste_id ' ;
        }
        $stmt = Database::connect()->prepare($query);
        $stmt->bindValue(":title",      $data['title']);
        $stmt->bindValue(":description",       $data['description']);
        $stmt->bindValue(":category",          $data['category']);
        $stmt->bindValue(":poste_id",          $data['poste_id']);

        if(isset($data['image']))
            $stmt->bindValue(":image",  $data['image']);

        return $stmt->execute();
    }

    public function deletePost($data)
    {
        $stmt = Database::connect()->prepare('DELETE FROM poste where poste_id = :poste_id');
        $stmt->bindValue(":poste_id",$data);
        $stmt->execute();
    }

}