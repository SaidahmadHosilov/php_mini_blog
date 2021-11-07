<?php

class Pagination
{
    public static function setPagination($statement, $limit = 2)
    {
        $db = Db::getConnection();
        include( ROOT . "/components/pagination/function.php"); // set up pagination

        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

        // $limit = 2; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        // $statement = "blogs order by id asc"; //you have to pass your query over here

		$res=$db->query("{$statement} LIMIT {$startpoint} , {$limit}");
		$res->setFetchMode(PDO::FETCH_ASSOC);
        return $res->fetchAll();
    }
}