<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Comment;
use app\models\Post;
use app\models\User;

class PostController extends Controller
{
    private User $user;
    private Post $post;
    private Comment $comment;

    public function __construct()
    {
        $this->user = new User();
        $this->post = new Post();
        $this->comment = new Comment();
    }


    public function post(){
        session_start();
        if(isset($_SESSION['user_id'])){

            if (isset($_POST['add-submit']) || isset($_POST['update-submit']) ){

                if (file_exists($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])){
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $img_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

                    $new_img_name = uniqid("IMG-", true) . '.' . strtolower($img_extension);
                    move_uploaded_file($tmp_name, "post_images/$new_img_name");

                    $data = array(
                        'title' => $_POST['title'],
                        'description' => $_POST['description'],
                        'category' => $_POST['categorie'],
                        'image' => $new_img_name,
                        'poste_author' => $_SESSION['user_id'],
                        'poste_id' => $_POST['poste_id']
                    );
                }else{
                    $data = array(
                        'title' => $_POST['title'],
                        'description' => $_POST['description'],
                        'category' => $_POST['categorie'],
                        'poste_author' => $_SESSION['user_id'],
                        'poste_id' => $_POST['poste_id']
                    );
                }


                if(isset($_POST['add-submit'])){
                    $this->post->addPost($data);

                }else{
                    $this->post->updatePost($data);

                }
                header('Location: /post');


            }elseif (isset($_POST['delete-submit'])){
                $data = $_POST['poste_id'];
                $this->post->deletePost($data);
                header('Location: /post');
            }
//             elseif (isset($_POST['comment'])){
//                 $data = array(
//                     'comment_poste' => $_POST['poste_id'],
//                     'comment_author' => $_SESSION['user_id'],
//                     'description' => $_POST['comment']
//                 );
//                 $this->comment->addComment($data);
// //                header('Location: /post');

//             }

            $comments = $this->comment->getAllComments();
            $current = $this->user->getUserById($_SESSION['user_id']);
            $posts = $this->post->getPostAuthor();
            $post_data = array(
                'posts' => $posts,
                'current' => $current,
                'comments' => $comments
            );
            return $this->render('post',$post_data);
        }

        header('Location: /login');

    }

    public function comment()
    {
        session_start();
        if (isset($_POST['comment'])){
            $data = array(
                'comment_poste' => $_POST['poste_id'],
                'comment_author' => $_SESSION['user_id'],
                'description' => $_POST['comment']
            );
            $this->comment->addComment($data);
            $comments = $this->comment->getCommentById($data['comment_poste']);
            $commentsJSON = json_encode($comments);
            echo $commentsJSON;

        }

    }

}