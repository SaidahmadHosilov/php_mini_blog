<?php

class Pagination
{
    public static function setPagination($statement, $limit = 2)
    {
        $db = Db::getConnection();
        include( ROOT . "/components/pagination/function.php"); // set up pagination

        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

        // $limit = 2; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        // $statement = "blogs order by id asc"; //you have to pass your query over here

		$res=$db->query("{$statement} LIMIT {$startpoint} , {$limit}");
		$res->setFetchMode(PDO::FETCH_ASSOC);
        return $res->fetchAll();
    }

    public static function setPaginationForPosts($limit = 2)
    {
        $db = Db::getConnection();
        include( ROOT . "/components/pagination/function.php"); // set up pagination

        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

        // $limit = 2; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        // $statement = "blogs order by id asc"; //you have to pass your query over here

        $sql = "SELECT * FROM posts 
                WHERE is_recent = 1 
                ORDER BY created_at DESC 
                LIMIT :startpoint, :limit";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':startpoint', $startpoint, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        $posts = array();
        $i = 0;

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {   
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

    public static function setPaginationForCtgPosts( $ctg_id, $limit = 2)
    {
        $db = Db::getConnection();
        include( ROOT . "/components/pagination/function.php"); // set up pagination

        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

        // $limit = 2; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        // $statement = "blogs order by id asc"; //you have to pass your query over here

        $sql = "SELECT posts.id as post_id, posts.title, posts.text, posts.main_text, 
                       posts.image as post_image, 
                       posts.is_recent, posts.is_popular, posts.created_at, posts.user_id
                FROM posts 
                INNER JOIN post_category 
                ON posts.id = post_category.post_id 
                AND post_category.ctg_id = :ctg_id LIMIT :startpoint, :limit";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':ctg_id', $ctg_id, PDO::PARAM_INT);
        $stmt->bindParam(':startpoint', $startpoint, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        $posts = array();
        $i = 0;

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {   
            $post_id = $row['post_id'];
            $categories = $db->prepare("SELECT post_category.ctg_id, post_category.ctg_name
                                        FROM post_category 
                                        WHERE post_id = :post_id");
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
            $posts[$i]['image'] = $row['post_image'];
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
}