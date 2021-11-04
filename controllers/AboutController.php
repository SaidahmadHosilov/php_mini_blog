<?php

class AboutController
{
    public function actionIndex()
    {
        require_once( ROOT . '/views/site/about.php' );

        return true;
    }
}