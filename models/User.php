<?php

namespace app\models;


use app\database\Database;
use PDO;


class User
{
    public function getUserByEmail($email){

            $stmt = Database::connect()->prepare('SELECT * FROM _user WHERE email = :email');
            $stmt->bindParam(":email",$email);
            $stmt->execute();
            $user = $stmt->fetch();
            $stmt = null;
            return $user;

    }

    public function checkUserByEmail($email): bool
    {
        $stmt = Database::connect()->prepare('SELECT * FROM _user WHERE email = :email');
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        if( $stmt->fetch() ) {
            return true;
        }else{
            return false;
        }
    }

    public function getUserById($id){

        $stmt = Database::connect()->prepare('SELECT * FROM _user WHERE user_id = :user_id');
        $stmt->bindParam(":user_id",$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function addUser($data): bool
    {

        $stmt = Database::connect()->prepare(
            'INSERT INTO _user (firstname, lastname, email, user_password) VALUES 
                                    (:firstname, :lastname, :email, :user_password )'
        );

        $stmt->bindParam(":firstname",      $data['firstname']);
        $stmt->bindParam(":lastname",       $data['lastname']);
        $stmt->bindParam(":email",          $data['email']);
        $stmt->bindParam(":user_password",  $data['password']);
        return $stmt->execute();

    }

}