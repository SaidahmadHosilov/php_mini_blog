<?php

class Blog
{
    public static function getCurrentBlog($blog_id)
    {
        $db = Db::getConnection();
        
        $sql = "SELECT blogs.id, blogs.title, blogs.image, blogs.text, blogs.time, blogs.ctg_id,
        categories.name
        FROM blogs INNER JOIN categories 
        ON blogs.ctg_id = categories.id WHERE blogs.id = $blog_id";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        return $result->fetch();
    }

    public static function getBlogsByLimit($limit)
    {
        $db = Db::getConnection();

        $blogs = array();

        $result = $db->query("SELECT blogs.id, blogs.title, blogs.image, blogs.text, blogs.time, 
        blogs.ctg_id, categories.name FROM blogs 
        INNER JOIN categories ON blogs.ctg_id = categories.id LIMIT $limit");

        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();

    }

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