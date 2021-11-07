<?php

class Post
{
    public static function deletePost($post_id)
    {
        $db = Db::getConnection();
        $photo = ($db->query("SELECT image FROM posts WHERE id = $post_id"));
        $photo->setFetchMode(PDO::FETCH_ASSOC);
        $photo = $photo->fetch();

        if($photo['image'] != 'no-post.png'){
            unlink('upload/profile_image/' . $photo['image']);
        }

        $sql = "DELETE FROM posts WHERE id = $post_id";
        $result = $db->query($sql);
        
        return true;
    }

    public static function updatePostData( $post_id, $title, $text, $main_text, $image, $ctg_name, $tag_name)
    {
        $db = Db::getConnection();

        $sql = "UPDATE posts SET title = '$title', text = '$text', main_text = '$main_text',
        image = '$image', tag_name = '$tag_name', ctg_name = '$ctg_name' WHERE id = $post_id";

        $result = $db->query($sql);
        return $result;
    }
    public static function getPostIdBeforeDeletingComment($comment_id)
    {
        $db = Db::getConnection();
        $sql = "SELECT post_id FROM comments WHERE id = $comment_id";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }

    public static function insertDataPost($title, $text, $mainText, $image, $date, $tagName, $ctgName, $userId)
    {
        $db = Db::getConnection();
        $mainContent = base64_encode($mainText);

        $sql = "INSERT INTO posts (title, text, main_text, image, is_recent, created_at, tag_name, ctg_name, user_id)
        VALUES ('$title', '$text', '$mainContent', '$image', 0, '$date', '$tagName', '$ctgName', $userId)"; 
        $db->query($sql);

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

    public static function getCurrentPost($id)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM posts WHERE id = $id";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $arr = $result->fetch();
        
        $userId = intval($arr['user_id']);

        $state = $db->query("SELECT * FROM users WHERE id = $userId");
        $state->setFetchMode(PDO::FETCH_ASSOC);
        array_push($arr, $state->fetch());

        return $arr;
    }

    public static function getPopularPosts($limit)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM posts WHERE is_popular = 1 LIMIT $limit";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        return $result->fetchAll();
    }

    public static function getCategoriesList()
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM categories";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        return $result->fetchAll();
    }

    public static function getTagsList()
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM tags";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();
    }

    public static function insertDataComment($userId, $time, $comment, $postId)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO comments ( text, time, user_id, post_id ) 
                VALUES ( '$comment', '$time', $userId, $postId )";
        $db->query($sql);
        
        $result = $db->query("select comments.id, comments.text, comments.time, comments.post_id,comments.user_id, 
        users.name, users.image from comments inner join users 
        on users.id = comments.user_id where comments.post_id = $postId order by time desc");

        $i = 0;

        $allComments = array();

        while($row = $result->fetch()){
            $allComments[$i]['id'] = $row['id'];
            $allComments[$i]['text'] = $row['text'];
            $allComments[$i]['time'] = $row['time'];
            $allComments[$i]['post_id'] = $row['post_id'];
            $allComments[$i]['user_id'] = $row['user_id'];
            $allComments[$i]['name'] = $row['name'];
            $allComments[$i]['image'] = $row['image'];
            $i++;
        }

        return $allComments;
    }

    public static function getCurrentComments($postId)
    {
        $db = Db::getConnection();
        $sql = ("select comments.id, comments.text, comments.time, comments.post_id,comments.user_id, 
        users.name, users.image from comments inner join users 
        on users.id = comments.user_id where comments.post_id = $postId ORDER BY time DESC");
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();
    }

    public static function countComments($id)
    {
        $db = Db::getConnection();
        $sql = "SELECT COUNT(*) as total FROM comments WHERE post_id = $id";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();   
    }

    public static function deleteComment($id)
    {
        $db = Db::getConnection();
        $sql = "DELETE FROM comments WHERE id = $id";
        $db->query($sql);

        return true;
    }
}