<?php

class Comment
{
    public static function getCommentById($id)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM comments WHERE id = $id");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }

    public static function updateComment($id, $text)
    {
        $db = Db::getConnection();
        $sql = "UPDATE comments SET text = '$text' WHERE id = $id";
        $result = $db->query($sql);

        return $result;
    }
}