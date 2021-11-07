<?php

class CommentController
{
    public function actionEdit($comment_id, $post_id)
    {
        $comment = Comment::getCommentById($comment_id);

        if(isset($_POST['submit'])){
            $text = $_POST['comment'] ?? '';

            if(Comment::updateComment($comment_id, $text)){
                header("Location: /post/details/$post_id");
            }
        }

        require_once( ROOT . '/views/comment/edit.php' );

        return true;
    }
}