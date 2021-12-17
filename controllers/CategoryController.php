<?php

class CategoryController
{
    public function actionIndex($ctg_id)
    {
        $limit = 1;
        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
        $statement = "SELECT categories.id as ctg_id, categories.name, posts.*, 
        users.name as user_name, users.image as user_image  
        FROM posts INNER JOIN categories ON posts.ctg_id = categories.id 
        INNER JOIN users ON users.id = posts.user_id
        WHERE categories.id = $ctg_id";
        $ctgName = Category::getCtgById($ctg_id);
 
        $statementCount = "posts INNER JOIN categories ON posts.ctg_id = categories.id 
        INNER JOIN users ON users.id = posts.user_id WHERE categories.id = $ctg_id";
        $ctgPosts = Pagination::setPagination($statement, $limit, $page);
        
        $category = Category::getCtgById($ctg_id) ?? 'No category here';

        require_once( ROOT . '/views/site/category.php' );

        return true;
    }
}