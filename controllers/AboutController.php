<?php

class AboutController
{
    public function actionIndex()
    {
        $team = User::getTeamUsers();

        require_once( ROOT . '/views/site/about.php' );

        return true;
    }
}