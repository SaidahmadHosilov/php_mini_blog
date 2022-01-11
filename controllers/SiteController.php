<?php

class SiteController
{
    public function actionIndex()
    {
        $db = Db::getConnection();

        $papularPosts = Post::getPapularPosts();
        // $recentPosts = Post::getRecentPosts(9);
        $posts = Post::getPostsByLimit(4);

        $limit = 3;
        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

        $statementCount = "posts 
                           WHERE is_recent = 1 
                           ORDER BY created_at DESC";
        
        $recentPosts = Pagination::setPaginationForPosts($limit, $page);

        require_once( ROOT . '/views/site/index.php' );

        return true;
    }
}