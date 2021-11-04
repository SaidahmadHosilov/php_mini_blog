<?php

class CategoryController
{
    public function actionIndex()
    {
        require_once( ROOT . '/views/site/category.php' );

        return true;
    }
}