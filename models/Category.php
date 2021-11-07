<?php

class Category
{
    public static function getCtgById($ctg_id)
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM categories WHERE id = {$ctg_id}");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        return $result->fetch();
    }
}