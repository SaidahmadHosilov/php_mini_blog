<?php

class Post
{
    public static function getPostTags($post_id)
    {
        $db = Db::getConnection();
        $tagNames = [];

        $sql = "SELECT tag_id FROM post_tags WHERE post_id = :post_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = $db->prepare("SELECT * FROM tags WHERE id = :id");
        foreach($tags as $tag_id):
            $result->bindParam(':id', $tag_id, PDO::PARAM_INT);
            $result->execute();
            array_push($tagNames, $result->fetch(PDO::FETCH_ASSOC));
        endforeach;

        
        return $tagNames;
    }

    public static function getPostsByLimit($limit)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM posts LIMIT :limit";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPapularPosts()
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM posts WHERE is_popular = 1 LIMIT 6";
        $result = $db->prepare($sql);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function insertShortComment($comment, $post_id, $user_session, $user_id)
    {
        $db = Db::getConnection();
        $date = date('Y-m-d H:i:s', time());

        $sql = "INSERT INTO 
                    comments(parent_id, text, time, user_id, post_id)
                VALUES
                    (:pr_id, :text, :time, :user_id, :post_id)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':pr_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':text', $comment, PDO::PARAM_STR);
        $stmt->bindParam(':time', $date, PDO::PARAM_STR);
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_session, PDO::PARAM_INT);
        $stmt->execute();

        $result = $db->prepare("SELECT * FROM comments ORDER BY time DESC LIMIT 1");
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC)['id'];
    }

    public static function searchAjax($title)
    {
        $title = (string)($title);
        $db = Db::getConnection();
        $sql = "SELECT * FROM posts WHERE title LIKE '%$title%'";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();        
    }

    public static function deletePost($post_id)
    {
        $db = Db::getConnection();
        $photo = ($db->query("SELECT image FROM posts WHERE id = $post_id"));
        $photo->setFetchMode(PDO::FETCH_ASSOC);
        $photo = $photo->fetch();

        if($photo['image'] != 'no-post.png' && $photo['image'] != 'no-image.png'){
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

    public static function insertDataPost($title, $text, $mainText, $image, $date, $tagName, $ctgId, $userId)
    {
        $db = Db::getConnection();
        $mainContent = base64_encode($mainText);
        $zero = 0;

        $stmt = $db->prepare("SELECT name FROM categories WHERE id = :ctgId");
        $stmt->bindParam(':ctgId', $ctgId, PDO::PARAM_INT);
        $stmt->execute();
        $ctgName = $stmt->fetch(PDO::FETCH_ASSOC)['name'];

        $sql = "INSERT INTO posts (title, text, main_text, image, is_recent, created_at, ctg_name, ctg_id, user_id)
        VALUES (:title, :text, :mainText, :image, :is_recent, :date, :ctgName, :ctgId, :userId)"; 
        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':mainText', $mainContent, PDO::PARAM_STR);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        $result->bindParam(':is_recent', $zero, PDO::PARAM_INT);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':ctgName', $ctgName, PDO::PARAM_STR);
        $result->bindParam(':ctgId', $ctgId, PDO::PARAM_INT);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        $result->execute();

        $lastPost = $db->prepare("SELECT id FROM posts ORDER BY created_at DESC LIMIT 1");
        $lastPost->execute();
        $post_id = $lastPost->fetch(PDO::FETCH_ASSOC);

        $stmt = $db->prepare("INSERT INTO post_tags(tag_id, post_id)
                              VALUES(:tag_id, :post_id)");

        foreach($tagName as $tag){
            $stmt->bindParam(':tag_id', $tag, PDO::PARAM_INT);
            $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
            $stmt->execute();
        }

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
        if( is_string($tagName) ) {
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
        $categories = $result->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $db->prepare("SELECT count(*) as count FROM posts WHERE ctg_id = :ctg_id");
        $i = 0;
        foreach($categories as $ctg){
            $stmt->bindParam(':ctg_id', $ctg['id'], PDO::PARAM_INT);
            $stmt->execute();
            $categories[$i]['ctg_count'] = $stmt->fetch(PDO::FETCH_ASSOC);
            $i++;
        }

        return $categories;
    }

    public static function getTagsList()
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM tags";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll() ;
    }

    public static function insertDataComment($userId, $time, $comment, $postId)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO comments ( text, time, user_id, post_id ) 
                VALUES ( '$comment', '$time', $userId, $postId )";
        $db->query($sql);
        
        $result = $db->query("select comments.id, comments.parent_id, comments.text, comments.time, comments.post_id,comments.user_id, 
        users.name, users.image from comments inner join users 
        on users.id = comments.user_id where comments.post_id = $postId  order by time desc limit 1");

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function getCurrentComments($postId)
    {
        $db = Db::getConnection();
        $sql = ("select comments.id, comments.text, comments.time, comments.post_id,comments.user_id, 
        users.name, users.image from comments inner join users 
        on users.id = comments.user_id where comments.post_id = :post_id 
        AND parent_id IS NULL ORDER BY time ASC");

        $sql2 = ("select comments.id, comments.parent_id, comments.text, comments.time, comments.post_id,comments.user_id, 
        users.name, users.image from comments inner join users 
        on users.id = comments.user_id where comments.post_id = :post_id 
        AND parent_id IS NOT NULL ORDER BY time ASC");

        $result = $db->prepare($sql);
        $result->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $stmt = $db->prepare($sql2);
        $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        return [$result->fetchAll(), $stmt->fetchAll()];
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