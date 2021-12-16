<?php

class SiteController
{
    public function actionIndex()
    {
        $db = Db::getConnection();

        $papularPosts = Post::getPapularPosts();
        $recentPosts = Post::getRecentPosts(9);
        $posts = Post::getPostsByLimit(4);

        $limit = 3;
        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
        $statement = "SELECT posts.* , users.name, users.bio, users.image as user_image
        FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.is_recent = 1 
        ORDER BY posts.id ASC";
        $statementCount = "posts INNER JOIN users ON posts.user_id = users.id 
        WHERE posts.is_recent = 1 ORDER BY posts.id ASC";
        $recentPosts = Pagination::setPagination($statement, $limit, $page);

        require_once( ROOT . '/views/site/index.php' );

        return true;
    }
}