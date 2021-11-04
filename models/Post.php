<?php

class Post
{
    public static function insertDataPost($title, $text, $mainText, $image, $date, $tagName, $ctgName, $userId)
    {
        $db = Db::getConnection();
        $mainContent = base64_encode($mainText);

        $sql = "INSERT INTO posts (title, text, main_text, image, is_recent, created_at, tag_name, ctg_name, user_id)
        VALUES ('$title', '$text', '$mainContent', '$image', 0, '$date', '$tagName', '$ctgName', $userId)"; 
        $db->query($sql);
        // $result = $db->prepare($sql);
        // $result->bindParam(':title', $title, PDO::PARAM_STR);
        // $result->bindParam(':text', $text, PDO::PARAM_STR);
        // $result->bindParam(':main-text', $mainContent, PDO::PARAM_STR);
        // $result->bindParam(':image', $image, PDO::PARAM_STR);
        // $result->bindParam(':created_at', $date, PDO::PARAM_STR); 
        // $result->bindParam(':tag_name', $tagName, PDO::PARAM_STR);
        // $result->bindParam(':ctg_name', $ctgName, PDO::PARAM_STR);
        // $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        // $result->execute();
        return true;
    }
    public static function checkTitle($title)
    {
        if( strlen($title) < 4 ) {
            return false;
        }
        return true;
    }

    public static function checkText($text)
    {
        if( $text == '' ) {
            return false;
        }
        return true;
    }

    public static function checkMainText($text)
    {
        if( $text == '' ) {
            return false;
        }
        return true;
    }

    public static function checkCtgName($ctgName)
    {
        if( $ctgName == 'test' || $ctgName == '' ) {
            return false;
        }
        return true;
    }

    public static function checkTagName($tagName)
    {
        if( $tagName == '' || strlen($_POST['tag_name']) === 0 ) {
            return false;
        }
        return true;
    }

    public static function getRecentPosts($limit)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM posts WHERE is_recent = 1 ORDER BY created_at DESC LIMIT $limit";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $arr = $result->fetchAll();
        $userId = '';
        for($i = 0; $i < count($arr); $i++){
            $userId = intval($arr[$i]['user_id']);
            $state = $db->query("SELECT name, image FROM users WHERE id = $userId");
            $state->setFetchMode(PDO::FETCH_ASSOC);
            $arr1 = $state->fetch();
            $arr[$i]['user_image'] = $arr1['image'];
            $arr[$i]['user_name'] = $arr1['name'];
        }

        return $arr;
    }
}