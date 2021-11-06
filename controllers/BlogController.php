<?php

class BlogController
{
    public function actionView($blog_id)
    {
        $mainBlogs = Blog::getBlogsByLimit(4);
        $categories = Post::getCategoriesList();
        $tags = Post::getTagsList();
        $popularPosts = Post::getPopularPosts(3);
        $currentBlog = Blog::getCurrentBlog($blog_id);

        require_once( ROOT . '/views/blog/details.php' );

        return true;
    }
}