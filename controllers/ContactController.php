<?php

class ContactController
{
    public function actionIndex()
    {
        require_once( ROOT . '/views/site/contact.php' );

        return true;
    }
}