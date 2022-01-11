<?php

class Category
{
    public static function getCategoriesList($post_id)
    {
        $db = Db::getConnection();
        $result = $db->prepare("SELECT * 
                                FROM post_category 
                                WHERE post_id = :post_id");
        $result->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $result->execute();
        
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getCtgById($ctg_id)
    {
        $db = Db::getConnection();
        $result = $db->prepare("SELECT post_category.* 
                                FROM posts 
                                INNER JOIN post_category
                                ON posts.id = post_category.post_id
                                WHERE post_category.ctg_id = :ctg_id");
        $result->bindParam(':ctg_id', $ctg_id, PDO::PARAM_INT);
        $result->execute();
        
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getOneCategory($ctg_id)
    {
        $db = Db::getConnection();
        $result = $db->prepare("SELECT * 
                                FROM categories 
                                WHERE id = :ctg_id");
        $result->bindParam(':ctg_id', $ctg_id, PDO::PARAM_INT);
        $result->execute();
        
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}