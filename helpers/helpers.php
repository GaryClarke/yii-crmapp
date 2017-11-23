<?php

if (!function_exists('request'))
{
    function request()
    {
        return Yii::$app->request;
    }
}


if (!function_exists('app'))
{
    function app()
    {
        return Yii::$app;
    }
}


if (!function_exists('db'))
{
    function db()
    {
        return Yii::$app->db;
    }
}





