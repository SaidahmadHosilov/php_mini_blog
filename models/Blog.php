<?php

class Blog
{
    public static function getBlogs()
    {
        $db = Db::getConnection();

        $allBlogs = array();

        $result = $db->query("SELECT * FROM blogs");

        $i = 0;

        while( $row = $result->fetch() )
        {
            $allBlogs[$i]['id'] = $row['id'];
            $allBlogs[$i]['title'] = $row['title'];
            $allBlogs[$i]['image'] = $row['image'];
            $allBlogs[$i]['text'] = $row['text'];
            $allBlogs[$i]['time'] = $row['time'];
            $i++;
        }

        return $allBlogs;
    }
}