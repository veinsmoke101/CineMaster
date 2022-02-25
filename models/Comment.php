<?php

namespace app\models;

use app\database\Database;
use PDO;

class Comment
{
    public function addComment($data): bool
    {

        $stmt = Database::connect()->prepare(
            'INSERT INTO _comment (comment_author, comment_poste,description)
                                 values (:comment_author, :comment_poste, :description) '
        );

        $stmt->bindValue(":comment_author",$data['comment_author']);
        $stmt->bindValue(":comment_poste",$data['comment_poste']);
        $stmt->bindValue(":description",$data['description']);

        return $stmt->execute();
    }

//    public function getAllPosts()
//    {
//        $stmt = Database::connect()->prepare('SELECT * FROM poste;');
//        $stmt->execute();
//        return $stmt->fetchAll(PDO::FETCH_ASSOC);
//    }

    public function getAllComments(){
        $stmt = Database::connect()->prepare('SELECT * FROM post_comments ;');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}