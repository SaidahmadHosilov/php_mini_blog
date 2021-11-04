<?php

class SiteController
{
    public function actionIndex()
    {
        $blogs = Blog::getBlogs();
        $recentPosts = Post::getRecentPosts(9);

        require_once( ROOT . '/views/site/index.php' );

        return true;
    }
}