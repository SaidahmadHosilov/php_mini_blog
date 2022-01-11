<?php

class CategoryController
{
    public function actionIndex($ctg_id)
    {
        $limit = 3;
        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
 
        $statementCount = "posts 
                    INNER JOIN post_category 
                    ON posts.id = post_category.post_id 
                    AND post_category.ctg_id = $ctg_id";
        
        $ctgPosts = Pagination::setPaginationForCtgPosts( $ctg_id, $limit, $page);

        $category = Category::getOneCategory($ctg_id)[0] ?? 'No category here';

        require_once( ROOT . '/views/site/category.php' );

        return true;
    }
}