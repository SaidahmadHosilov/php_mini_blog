<?php

class SingleController
{
    public function actionIndex()
    {
        require_once( ROOT . '/views/site/single.php' );

        return true;
    }
}