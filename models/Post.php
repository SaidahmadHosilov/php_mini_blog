<?php

class Post
{
    public static function ajaxUpdate($comment, $user_id)
    {
        $db = Db::getConnection();

        $sql = "UPDATE comments SET text = :text WHERE id = :comment_id";

        $statement = $db->prepare($sql);
        $statement->bindParam(':text', $comment, PDO::PARAM_STR);
        $statement->bindParam(':comment_id', $user_id, PDO::PARAM_INT);
        $statement->execute();

        return true;
    }

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

        foreach ($tags as $tag_id) :
            $result->bindParam(':id', $tag_id['tag_id'], PDO::PARAM_INT);
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

        $posts = array();
        $i = 0;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $post_id = $row['id'];
            $categories = $db->prepare("SELECT * FROM post_category WHERE post_id = :post_id");
            $categories->bindParam(':post_id', $post_id, PDO::PARAM_INT);
            $categories->execute();
            $categoriesList = $categories->fetchAll(PDO::FETCH_ASSOC);

            $user_id = $row['user_id'];
            $users = $db->prepare("SELECT * FROM users WHERE id = :user_id");
            $users->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $users->execute();
            $usersList = $users->fetchAll(PDO::FETCH_ASSOC);

            $posts[$i]['id'] = $post_id;
            $posts[$i]['title'] = $row['title'];
            $posts[$i]['text'] = $row['text'];
            $posts[$i]['main_text'] = $row['main_text'];
            $posts[$i]['image'] = $row['image'];
            $posts[$i]['is_recent'] = $row['is_recent'];
            $posts[$i]['is_popular'] = $row['is_popular'];
            $posts[$i]['created_at'] = $row['created_at'];
            $posts[$i]['user_id'] = $user_id;
            $posts[$i]['ctg_name'] = $categoriesList;
            $posts[$i]['users'] = $usersList[0];
            $i++;
        }

        return $posts;
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

        if ($photo['image'] != 'no-post.png' && $photo['image'] != 'no-image.png') {
            unlink('upload/profile_image/' . $photo['image']);
        }

        $sql = "DELETE FROM posts WHERE id = $post_id";
        $result = $db->query($sql);

        return true;
    }

    public static function updatePostData($post_id, $title, $text, $main_text, $image, $ctg_name, $tag_name)
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
        $mainContent = ($mainText);
        $zero = 0;

        $sql = "INSERT INTO posts (title, text, main_text, image, is_recent, is_popular, created_at, user_id)
        VALUES (:title, :text, :mainText, :image, :is_recent, :is_popular, :date, :userId)";
        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':mainText', $mainContent, PDO::PARAM_STR);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        $result->bindParam(':is_recent', $zero, PDO::PARAM_INT);
        $result->bindParam(':is_popular', $zero, PDO::PARAM_INT);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        $result->execute();

        $lastPost = $db->prepare("SELECT id FROM posts ORDER BY created_at DESC LIMIT 1");
        $lastPost->execute();
        $post_id = $lastPost->fetch(PDO::FETCH_ASSOC)['id'];

        $stmt = $db->prepare("INSERT INTO post_tags(tag_id, post_id)
                              VALUES(:tag_id, :post_id)");

        foreach ($tagName as $tag) {
            $stmt->bindParam(':tag_id', $tag, PDO::PARAM_INT);
            $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
            $stmt->execute();
        }

        $stmt2 = $db->prepare("INSERT INTO post_category(ctg_id, ctg_name, post_id)
                              VALUES(:ctg_id, :ctg_name, :post_id)");

        foreach ($ctgName as $ctg) {

            $getCtgName = $db->prepare("SELECT name FROM categories WHERE id = :id");
            $getCtgName->bindParam(':id', $ctg, PDO::PARAM_INT);
            $getCtgName->execute();
            $category_name = $getCtgName->fetch(PDO::FETCH_ASSOC)['name'];

            $stmt2->bindParam(':ctg_id', $ctg, PDO::PARAM_INT);
            $stmt2->bindParam(':ctg_name', $category_name, PDO::PARAM_STR);
            $stmt2->bindParam(':post_id', $post_id, PDO::PARAM_INT);
            $stmt2->execute();
        }

        return true;
    }

    public static function checkTitle($title)
    {
        if (strlen($title) < 4) {
            return false;
        }
        return true;
    }

    public static function checkText($text)
    {
        if ($text == '') {
            return false;
        }
        return true;
    }

    public static function checkMainText($text)
    {
        if ($text == '') {
            return false;
        }
        return true;
    }

    public static function checkCtgName($ctgName)
    {
        if (is_string($ctgName)) {
            return false;
        }
        return true;
    }

    public static function checkTagName($tagName)
    {
        if (is_string($tagName)) {
            return false;
        }
        return true;
    }

    public static function getRecentPosts($limit)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM posts WHERE is_recent = 1 ORDER BY created_at DESC LIMIT :limit";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        $posts = array();
        $i = 0;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $post_id = $row['id'];
            $categories = $db->prepare("SELECT * FROM post_category WHERE post_id = :post_id");
            $categories->bindParam(':post_id', $post_id, PDO::PARAM_INT);
            $categories->execute();
            $categoriesList = $categories->fetchAll(PDO::FETCH_ASSOC);

            $user_id = $row['user_id'];
            $users = $db->prepare("SELECT * FROM users WHERE id = :user_id");
            $users->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $users->execute();
            $usersList = $users->fetchAll(PDO::FETCH_ASSOC);

            $posts[$i]['id'] = $post_id;
            $posts[$i]['title'] = $row['title'];
            $posts[$i]['text'] = $row['text'];
            $posts[$i]['main_text'] = $row['main_text'];
            $posts[$i]['image'] = $row['image'];
            $posts[$i]['is_recent'] = $row['is_recent'];
            $posts[$i]['is_popular'] = $row['is_popular'];
            $posts[$i]['created_at'] = $row['created_at'];
            $posts[$i]['user_id'] = $user_id;
            $posts[$i]['ctg_name'] = $categoriesList;
            $posts[$i]['users'] = $usersList;
            $i++;
        }

        return $posts;
    }

    public static function getCurrentPost($id)
    {
        $db = Db::getConnection();

        $sql = "SELECT posts.*, users.name as username, users.email, users.image as user_image,
                users.bio, users.role, post_category.ctg_id, post_category.ctg_name  
                FROM posts 
                INNER JOIN post_category
                ON posts.id = post_category.post_id 
                AND posts.id = :id
                INNER JOIN users 
                ON posts.user_id = users.id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
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

        $stmt = $db->prepare("SELECT count(*) as count FROM post_category WHERE ctg_id = :ctg_id");
        $i = 0;
        foreach ($categories as $ctg) {
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

        return $result->fetchAll();
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

    public static function deleteComment($id, $post_id)
    {
        $db = Db::getConnection();

        $query = $db->prepare("SELECT parent_id FROM comments WHERE id = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
        $parent_id = $query->fetch(PDO::FETCH_ASSOC);

        if ($parent_id != null) {
            $sql = "DELETE FROM comments WHERE id = $id";
            $db->query($sql);
            return true;
        }

        $stmt = "DELETE FROM comments WHERE id = $id OR parent_id = $id AND post_id = $post_id";
        $db->query($stmt);
        return true;
    }
}
